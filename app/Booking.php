<?php

namespace App;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Car;
use App\Status;
use App\Report;

class Booking extends Model
{
    public function report()
    {
        return $this->hasOne('App\Report');
    }
    
    public function status()
    {
        return $this->hasOne('App\Status');
    }
    
    public function car()
    {
        return $this->belongsTo('App\Car');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function fetchCarBySearch($fetchCars)
    {
        $query = self::query();
        
        $start = date('Y-m-d');
        $end = date('Y-m-d', strtotime($start. "14 day"));
        
        $canReserveCarCount = [];
        $canReserveCars = [];

        for ($i = $start; $i < $end; $i = date('Y-m-d', strtotime($i . '+1 day'))) {
            $count = 0;
            $canReserveCars = [];
            $i = new DateTime($i);
            $i->format('Y-m-d H:i:s');
            
            foreach ($fetchCars as $fetchCar) {
                $isExist = Booking::where('date', $i)->where('car_id', '=', $fetchCar->id)->exists();
                if (!$isExist) { $count++;
                $canReserveCars [] = $fetchCar;
                }
            }
            $i = $i->format('Y-m-d');
            $canReserveCarCount[$i] = $count;
            $eachDaysCanReserveCars[$i] = $canReserveCars;
        }
        return array($canReserveCarCount, $eachDaysCanReserveCars);
    }
    
    public static function makeConditionList(Request $request)
    {
        $conditions = [
            "delivery_area" => $request->delivery_area,
            "warehouse" => $request->warehouse,
            "time" => $request->time,
            "type" => $request->type,
        ];
        return $conditions;
    }
    
    public static function confirmDataSave($request)
    {
        $fetchCarBySearch = Car::fetchCarBySearch($request);
        $eachDaysCanReserveCars = $fetchCarBySearch[1];
        
        $query = self::query();
        
        $canBookingCarList = $eachDaysCanReserveCars["$request->date"];
        $bookedCountList = [];
        foreach ($canBookingCarList as $canBookingCar) {
            $bookedCount = $query->where('car_id',$canBookingCar->id)->count();
            $bookedCountList[$canBookingCar->id] = $bookedCount;
        }
        
        $minBookedCarId = array_keys($bookedCountList, min($bookedCountList));
        if(count($minBookedCarId) == 1) {
            $minBookedCarId = $minBookedCarId[0];
        } else {
            $minBookedCarId = min($minBookedCarId);
        }
        
        $date = new DateTime($request->date);
        $date->format('Y-m-d H:i:s');
   
        $booking = new Booking;
        $booking->user_id = Auth::id();
        $booking->car_id = $minBookedCarId;
        $booking->date = $date;
        $booking->delivery_area = $request->delivery_area;
        $booking->warehouse_name = $request->warehouse;
        $booking->arrival_time = $request->time;

        unset($request['_token']);
        
        $booking->save();
        
        Status::statusSave();
        
    }
    
    public static function schedule()
    {
        $bookings = Booking::whereHas('car', function($q){
        $q->where('admin_id', Auth::id());
        })->get();
        
        return $bookings;
    }

}

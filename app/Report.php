<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Report extends Model
{
    public function booking()
    {
        return $this->hasOne('App\Booking');
    }
    
    public static function reportDataSave($request)
    {
        $report = new Report;
        $report->booking_no = $request->id;
        $report->date = $request->date;
        $report->driver_name = $request->driver_name;
        $report->warehouse_name = $request->warehouse_name;
        $report->container_no = $request->container_no;
        $report->departure_time = $request->departure_time;
        $report->arrival_time = $request->arrival_time;
        $report->mileage = $request->mileage;
        $report->price = $request->price;
        $report->memo = $request->memo;
        
        $report->save();
    }
}

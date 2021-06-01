<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Booking;

class Car extends Model
{
    protected $dates = ['limit'];
    protected $fillable = [
        'deliveryCompany_id',
        'car_number',
        'driver_name',
        'type',
        'delivery_area',
        'image_path',
        'memo',
        'limit'
        ];
    
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
    
    public function Admin()
    {
        return $this->belongsTo('App\Admin');
    }
    
    public static function addCar(Request $request)
    {
        $car = new Car;
        $car->admin_id = Auth::id();
        $car->car_number = $request->car_number;
        $car->driver_name = $request->driver_name;
        $car->type = $request->type;
        $car->delivery_area = $request->delivery_area;
        $car->limit = $request->limit;
        $car->memo = $request->memo;
        
        if (isset($request['image_path'])) {
            $path = $request->file('image_path')->store('public/image');
            $car->image_path = basename($path);
        }
        unset($request['_token']);
        unset($request['image']);
        
        $car->save();
    }
    
    public static function carDataUpdate(Request $request)
    {
        $car = Car::find($request->id);
        $form = $request->all();
        if (isset($form['image_path'])) {
            $path = $request->file('image_path')->store('public/image');
            $form['image_path'] = basename($path);
        }
        
        unset($request['_token']);
        unset($request['image']);
        
        $car->fill($form)->save();
    }
    
    public static function fetchCarBySearch(Request $request)
    {
        $query = self::query();
        $fetchCars = $query->where('type', $request->type)->where('delivery_area', '>=', $request->delivery_area)->get();
        
        return Booking::fetchCarBySearch($fetchCars);
    }

}

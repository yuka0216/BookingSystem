<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Status extends Model
{
    const REQUEST = "未";
    const DONE = "完了";
    
    public function booking()
    {
        return $this->hasOne('App\Booking');
    }
    
    public static function statusSave()
    {
        $status = new Status;
        $bookingId = Booking::max('id');
        
        $status->booking_id = $bookingId;
        $status->status = self::REQUEST;
        
        $status->save();
    }
    
    public static function statusChange($request)
    {
        Status::where('booking_id', $request->id)->delete();
        $status = new Status;
        $status->booking_id = $request->id;
        $status->status = self::DONE;
        $status->save();
    }
}

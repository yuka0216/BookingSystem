<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Booking;

class UserController extends Controller
{
    public function booking()
    {
        return view('user.booking');
    }
    
    public function checkCondition(Request $request)
    {
        $conditionList = [
            'date' => $request->date,
            'delivery_area' => $request->conditionList['delivery_area'],
            'warehouse' => $request->conditionList['warehouse'],
            'time' => $request->conditionList['time'],
            'type' => $request->conditionList['type']
        ];
        return view('user.checkCondition', ['conditionList' => $conditionList]);
    }

    public function confirm()
    {
        
        return view('user.confirm');
    }
    
    public function confirmDataSave(Request $request)
    {
        Booking::confirmDataSave($request);
        
        return redirect('confirm');
    }
    
    public function schedule()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        
        return view('user.schedule', ['bookings' => $bookings]);
    }
}
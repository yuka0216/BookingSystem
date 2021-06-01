<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Car;
use App\Booking;
use App\Report;
use App\Status;

class AdminController extends Controller
{
    public function schedule()
    {
        $bookings = Booking::schedule();
        $page = Booking::paginate(5);
        
        return view('admin.schedule', ['bookings' => $bookings, 'page' => $page]);
    }

    public function carIndex()
    {
        $cars = Car::All();
        $page = Car::paginate(5);
        
        return view('admin.carIndex', ['cars'=>$cars, 'page' => $page]);
    }
    
    public function add()
    {
        return view('admin.add');
    }
    
    public function addCar(Request $request)
    {
        Car::addCar($request);
        
        return redirect("admin/carIndex");
    }
    
    public function report(Request $request)
    {
        $booking = Booking::find($request->id);
        return view('admin.report', ['booking'=> $booking]);
    }
    
    public function reportDataSave(Request $request)
    {
        Report::reportDataSave($request);
        Status::statusChange($request);
        
        return redirect('admin/schedule');
    }
    
    public function carDataEdit(Request $request)
    {
        $targetCarData = Car::find($request->id);
        return view('admin.carDataEdit', ['targetCarData' => $targetCarData]);
    }
    
    public function carDataDelete(Request $request)
    {
        Car::where('id', $request->id)->delete();
        return redirect("admin/carIndex");
    }
    
    public function carDataUpdate(Request $request)
    {
        Car::carDataUpdate($request);

        return redirect("admin/carIndex");
    }
    
    public function search(Request $request)
    {
        $fetchCarBySearch = Car::fetchCarBySearch($request);
        $canReserveCarCount = $fetchCarBySearch[0];
        
        $conditionList = Booking::makeConditionList($request);
        
        return view('user.vacancyCalender', ['canReserveCarCount' => $canReserveCarCount, 'conditionList' => $conditionList]);
    }

}
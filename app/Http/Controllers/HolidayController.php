<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;

class HolidayController extends Controller
{
    //
    public function index(){

        $items = Holiday::all();
        $totalHolidays = Holiday::count();
        $appointments = Holiday::all();
        $types =[0=>"Public",1=>"Company"];
        $startYear = 2020;
        $endYear = 2050;
        $years=array();
        for($i=$startYear; $i<$endYear; $i++){
            $years[$i]= $i;
        }
    
        return view('ants.pages.holiday',compact('items','appointments','years','types','totalHolidays'));
    }

    


}

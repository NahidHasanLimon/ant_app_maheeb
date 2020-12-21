<?php

namespace App\Http\Controllers;

use App\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class AntHomeController extends Controller
{
    //


    public function LeaveCustomizedFormat($items){
        if($items instanceof Collection){
            foreach ($items as $item){
                $start = \Carbon\Carbon::parse($item->start_date);
                $end = \Carbon\Carbon::parse($item->end_date);
                $different_days = $start->diffInDays($end);
                if($different_days<1){
                    $different_days =1;
                }else{
                    $different_days = $start->diffInDays($end);
                }
                $StartDate_Human=Carbon::parse($item->start_date)->format('d/m/yy');
                $StartDate_Human2=Carbon::parse($item->start_date)->format('dS M');
                $EndDate_Human=Carbon::parse($item->end_date)->format('d/m/yy');
                $EndDate_Human2=Carbon::parse($item->end_date)->format('dS M');
                $item->Duration_Human= $different_days;
                $item->StartDate_Human= $StartDate_Human;
                $item->EndDate_Human= $EndDate_Human;
                $item->StartDate_Human2= $StartDate_Human2;
                $item->EndDate_Human2= $EndDate_Human2;
            }
        }else{
            $item=$items;
            // if not Collection
            $start = \Carbon\Carbon::parse($item->start_date);
            $end = \Carbon\Carbon::parse($item->end_date);
            $different_days = $start->diffInDays($end);
            if($different_days<1){
                $different_days =1;
            }else{
                $different_days = $start->diffInDays($end);
            }

            $StartDate_Human=Carbon::parse($item->start_date)->format('d/m/yy');
            $StartDate_Human2=Carbon::parse($item->start_date)->format('dS M');
            $EndDate_Human=Carbon::parse($item->end_date)->format('d/m/yy');
            $EndDate_Human2=Carbon::parse($item->end_date)->format('dS M');

            $item->Duration_Human= $different_days;
            $item->StartDate_Human= $StartDate_Human;
            $item->EndDate_Human= $EndDate_Human;
            $item->StartDate_Human2= $StartDate_Human2;
            $item->EndDate_Human2= $EndDate_Human2;
        }
        return $items;
    }



    public function index(){

        $today_date = Carbon::now();
        $itemsGet = Holiday::where('start_date','>',$today_date)->limit(2)->get();
        $count= $itemsGet->count();
        $items=$this->LeaveCustomizedFormat($itemsGet);
//         dd($items);
        return view('ants.pages.ant_home',compact('items'));
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Holiday;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Carbon\Carbon;

class HolidayController extends Controller
{
    //
    public function index(){

        $items = Holiday::all();

        $appointments = Holiday::all();
        $types =[0=>"Public",1=>"Company"];


        $startYear = 2020;
        $endYear = 3000;
        $years=array();

        for($i=$startYear; $i<$endYear; $i++){
            $years[$i]= $i;
        }
//        dd($years);

//        return view('admin.pages.add_holiday',compact('items','calendar','appointments','years'));
        return view('admin.pages.add_holiday',compact('items','appointments','years','types'));
    }

    public function testHoliday(){

        $appointments = Holiday::all();
        $items = Holiday::all();
        return view('admin.pages.test_holiday',compact('appointments','items'));
    }
    public function calenderHoliday(){

        $appointments = Holiday::all();
        $items = Holiday::all();
        if(request()->ajax())
        {

            $data = Holiday::all();
            return response()->json( $data);
        }


        return view('admin.pages.calender_test',compact('appointments','items'));
    }

    public function store(Request $request)
    {
        $holiday = new Holiday();
        $holiday->holiday_name = $request->company_name;

        $hd = $request->holiday_start_date;

        if ( $request->has('multiHoliday')){
            $hdend = $request->holiday_end_date;

        }
        else{
            $hdend = $request->holiday_start_date;

        }

        $holiday->types = $request->typeName;
        $holiday->notes = $request->notesName;
        $holiday->start_date = Carbon::parse($hd)->format('Y-m-d');
        $holiday->end_date = Carbon::parse($hdend)->format('Y-m-d');


//        $holiday->save();

        if ($holiday->save()) {
            return response()->json([
                'success' => true,
                'holiday' => $holiday
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }




//        return response()->json( $holiday);



    }
    public function edit($id)
    {
        $data = Holiday::find($id);

//        dd($items);
        return response()->json([
            'data' => $data,


        ]);


    }

    public function detail(Request $request){
        if($request->type=='show'){
            // $department =  Department::find($request->id);
            $holiday = Holiday::find($request->id);
            return response()->json([
                'holiday'=>$holiday,
            ]);
        }else{
            $holiday = Holiday::find($request->id);

            return response()->json([
                'holiday'=>$holiday,

            ]);
        }
    }


    public function update(Request $request)
    {
        //
        // dd($request);
        $holiday =  Holiday::find($request->id);
        $holiday->holiday_name = $request->company_name;
        // $company->company_id = $request->select_company_modal;

        $hd = $request->holiday_start_date;
//        $hdend = $request->holiday_end_date;
        if ( $request->has('multiHoliday_2')){
            $hdend = $request->holiday_end_date;

        }
        else{
            $hdend = $request->holiday_start_date;

        }
        $holiday->types = $request->typeName;
        $holiday->notes = $request->notesName;
        $holiday->start_date = Carbon::parse($hd)->format('Y-m-d');
        $holiday->end_date = Carbon::parse($hdend)->format('Y-m-d');
        $holiday->save();
        $holiday = Holiday::find($holiday->id);
//        return response()->json([
//            'holiday'=>$holiday
//        ]);


        if ($holiday) {
            return response()->json([
                'success' => true,
                'holiday' => $holiday
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update'
            ]);
        }


    }






    public function destroy(Request $request)
    {
        $holiday = Holiday::find($request->id);
        $holiday->delete();
        return response()->json($holiday);
    }


}

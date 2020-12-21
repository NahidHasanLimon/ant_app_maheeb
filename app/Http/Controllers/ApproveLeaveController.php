<?php

namespace App\Http\Controllers;

use App\Leave;
use App\LeaveType;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
class ApproveLeaveController extends Controller
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
        $users = User::all();
        $leaveTypes = LeaveType::all();
        $itemsGet = Leave::with('approving_superadmin:id,first_name,middle_name,last_name','type:id,title','users:id,first_name,middle_name,last_name')->where('is_approved_superadmin','0')->get();
        $count= $itemsGet->count();
        $items=$this->LeaveCustomizedFormat($itemsGet);
        // dd($items);
    
        return view('admin.pages.approve-leave',compact('users','leaveTypes','items'));
    }
    public function total_unapproved_leaves(){
        $total_unapproved_leaves=0;
        $count_query=Leave::where('is_approved_superadmin',0)->count();
        if ($count_query) {
            $total_unapproved_leaves=$count_query;
        }
//        dd($total_unapproved_leaves);
        return $total_unapproved_leaves;
    }
    public function approvalstore(Request $request){
        $leave = Leave::find($request->id);
//        $leave_count = $this->total_unapproved_leaves();
//        dd($leave_count);
        $leave_count = (int)Leave::where('is_approved_superadmin','=','0')->count();

        if($leave_count==1){
            $leave_count =0;
        }else{
            $leave_count= $leave_count -1;
        }
        if ($leave) {
            $leave->is_approved_superadmin = 1;
            $leave->approving_superadmin_id = Auth::user()->id;
            $leave->superadmin_approval_date = Carbon::now()->format('Y-m-d');
           if (!$leave->save()) {
              return response()->json([
                "success"=>false,
                "message"=>'Failed to Approved Leave or You Dont have permission',

        ]);
           }
            return response()->json([
            "success"=>true,
            "leave"=>$leave,
            "leave_count"=>$leave_count,
             ]);
        }
        else{
             return response()->json([
            "success"=>false,
            "message"=>'Failed to Find Leave',

        ]);
        }

//        dd($leave);



//        dd($leave);
       

    }

//     public function store(Request $request){
//         $empId = $request->empName;
//         $leaveId = $request->leaveName;
//         $notes = $request->notes;
//         $input = array();
//         $hd = $request->holiday_start_date;


//         if ( $request->has('multiHoliday')){
//             $hdend = $request->holiday_end_date;

//         }
//         else{
//             $hdend = $request->holiday_start_date;

//         }
//         $holiday_start_date = Carbon::parse($hd)->format('Y-m-d');
//         $holiday_end_date = Carbon::parse($hdend)->format('Y-m-d');

// //        dd($pnId);
//         $input['user_id'] = $empId;
//         $input['start_date'] = $holiday_start_date;
//         $input['end_date'] = $holiday_end_date;
//         $input['notes'] = $notes;
//         $input['leave_type'] = $leaveId;

//         $leave = Leave::create($input);
//         $item = Leave::with('users','type')->find($leave->id);


//         return response()->json([
//             "leaves"=>$leave,
//             "item"=>$item,

//         ]);

//     }


}

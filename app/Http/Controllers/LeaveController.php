<?php

namespace App\Http\Controllers;

use App\Leave;
use App\LeaveType;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class LeaveController extends Controller
{
    //
    public function LeaveCustomizedFormat($items)
    {
        if ($items instanceof Collection) {
            foreach ($items as $item) {
                $start = \Carbon\Carbon::parse($item->start_date);
                $end = \Carbon\Carbon::parse($item->end_date);
                $different_days = $start->diffInDays($end);
                if ($different_days < 1) {
                    $different_days = 1;
                } else {
                    $different_days = $start->diffInDays($end);
                }
                $StartDate_Human = Carbon::parse($item->start_date)->format('d/m/yy');
                $StartDate_Human2 = Carbon::parse($item->start_date)->format('dS M,Y');
                $StartDate_Datepicker = Carbon::parse($item->start_date)->format('yy-m-d');
                $EndDate_Human = Carbon::parse($item->end_date)->format('d/m/yy');
                $EndDate_Human2 = Carbon::parse($item->end_date)->format('dS M,Y');
                $EndDate_Datepicker = Carbon::parse($item->end_date)->format('yy-m-d');
                $item->Duration_Human = $different_days;
                $item->StartDate_Human = $StartDate_Human;
                $item->EndDate_Human = $EndDate_Human;
                $item->StartDate_Human2 = $StartDate_Human2;
                $item->EndDate_Human2 = $EndDate_Human2;
                $item->StartDate_Datepicker = $StartDate_Datepicker;
                $item->EndDate_Datepicker = $EndDate_Datepicker;
            }
        } else {
            $item = $items;
            // if not Collection
            $start = \Carbon\Carbon::parse($item->start_date);
            $end = \Carbon\Carbon::parse($item->end_date);
            $different_days = $start->diffInDays($end);
            if ($different_days < 1) {
                $different_days = 1;
            } else {
                $different_days = $start->diffInDays($end);
            }

            $StartDate_Human = Carbon::parse($item->start_date)->format('d/m/yy');
            $StartDate_Human2 = Carbon::parse($item->start_date)->format('dS M,Y');
            $StartDate_Datepicker = Carbon::parse($item->start_date)->format('yy-m-d');
            $EndDate_Human = Carbon::parse($item->end_date)->format('d/m/yy');
            $EndDate_Human2 = Carbon::parse($item->end_date)->format('dS M,Y');
            $EndDate_Datepicker = Carbon::parse($item->end_date)->format('yy-m-d');
            $item->Duration_Human = $different_days;
            $item->StartDate_Human = $StartDate_Human;
            $item->EndDate_Human = $EndDate_Human;
            $item->StartDate_Human2 = $StartDate_Human2;
            $item->EndDate_Human2 = $EndDate_Human2;
            $item->StartDate_Datepicker = $StartDate_Datepicker;
            $item->EndDate_Datepicker = $EndDate_Datepicker;
        }
        return $items;
    }

    public function index()
    {
        $users = User::all();
        $leaveTypes = LeaveType::all();
        $itemsGet = Leave::with('approving_superadmin:id,first_name,middle_name,last_name', 'type:id,title', 'users:id,first_name,middle_name,last_name')->get();
        $count = $itemsGet->count();
        $items = $this->LeaveCustomizedFormat($itemsGet);
//        dd($items);
        return view('admin.pages.view-edit-leave', compact('users', 'leaveTypes', 'items'));
    }

    public function store(Request $request)
    {
        $userId = $request->requested_user_id;
        $leaveTypeId = $request->leaveType;
// dd($request->leaveType);
        $notes_by_requester = $request->notes_by_requester;
        $input = array();
        $hd = $request->leave_start_date;
        if ($request->has('multiHoliday') || isset($request->leave_end_date)) {
            $hdend = $request->leave_end_date;

        } else {
            $hdend = $request->leave_start_date;

        }
        $notes_by_requester = $request->notes_by_requester;
        $leave_start_date = Carbon::parse($hd)->format('Y-m-d');
        $leave_end_date = Carbon::parse($hdend)->format('Y-m-d');


        $input['user_id'] = $userId;
        $input['start_date'] = $leave_start_date;
        $input['end_date'] = $leave_end_date;
        $input['notes_by_requester'] = $notes_by_requester;
        $input['leave_type'] = $leaveTypeId;
        $leaveStore = Leave::create($input);
        if (!$leaveStore) {
            return response()->json([
                "success" => false,
                "message" => 'failed to save',
            ]);
        }

        $item = Leave::with('users:id,first_name,middle_name,last_name', 'type')->find($leaveStore->id);

        $leaves = $this->LeaveCustomizedFormat($item);
        // dd($item);
        return response()->json([
            "success" => true,
            "leaves" => $leaveStore,
            "item" => $item,

            "message" => 'save successfully',

        ]);


    }

    public function destroy(Request $request)
    {
        $leave = Leave::find($request->id);
        $leave_count = (int)Leave::where('is_approved_superadmin','=','0')->count();

        if($leave_count==1){
            $leave_count =0;
        }else{
            $leave_count= $leave_count -1;
        }

        if ($leave->delete()) {
            return response()->json([
                'success' => true,
                'leave_count' => $leave_count,
                'message' => 'Leave deleted successfully',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Leave deleted successfully',
            ]);
        }

    }


    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $leave = Leave::find($request->id);
            return response()->json([
                'leave' => $leave,
            ]);
        } else {
            $leave = Leave::find($request->id);
            $leave = $this->LeaveCustomizedFormat($leave);
//            dd($leave);
            $type = LeaveType::where('id', $leave->leave_type)->first();
            $user = User::where('id', $leave->user_id)->first();
//            dd($user);
            return response()->json([
                'type' => $type,
                'user' => $user,
                'leave' => $leave,
            ]);
        }
    }

    public function show(Request $request)
    {
        if (!$leave = Leave::with('type:id,title', 'users:id,first_name,middle_name,last_name', 'approving_superadmin:id,first_name,middle_name,last_name')->find($request->id)) {
            return response()->json([
                'success' => false,
                'leave' => 'Failed to Find Leave',
            ]);
        } else {
            $leave = $this->LeaveCustomizedFormat($leave);
            return response()->json([
                'success' => true,
                'leave' => $leave,
            ]);
        }
    }

    public function update(Request $request)
    {
        $leave = Leave::find($request->id);
        $leave_start_date = $request->leave_start_date;
        if ($is_multiholiday_edit = 1 && isset($request->leave_end_date)) {
            $leave_end_date = $request->leave_end_date;
        } else {
            $leave_end_date = $leave_start_date;
        }

        $leave->user_id = $request->requested_user_id;

        $leave->leave_type = $request->leaveType;

        $leave->start_date = Carbon::parse($leave_start_date)->format('Y-m-d');
        $leave->end_date = Carbon::parse($leave_end_date)->format('Y-m-d');

        if ($leave->save()) {
            $item = Leave::with('type:id,title', 'users:id,first_name,middle_name,last_name')->find($leave->id);
            $item = $this->LeaveCustomizedFormat($item);

            return response()->json([
                "success" => true,
                "item" => $item,
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => 'failed to Update',
            ]);
        }


    }


}

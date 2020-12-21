<?php

namespace App\Http\Controllers;

use App\Leave;
use App\LeaveType;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AskForLeaveController extends Controller
{
    //
public function LeaveCustomizedFormat($items){
    // dd($items->start_date);
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
                    if (preg_match('/^\s*$/', $item->start_date)) { 
                        $StartDate_Human="";
                    }else{
                       $StartDate_Human=Carbon::parse($item->start_date)->format('d/m/yy');
                    }
                    if (preg_match('/^\s*$/', $item->end_date)) { 
                        $EndDate_Human="";
                    }else{
                       $EndDate_Human=Carbon::parse($item->end_date)->format('d/m/yy');
                    }
                    $item->Duration_Human= $different_days;
                    $item->StartDate_Human= $StartDate_Human;
                    $item->EndDate_Human= $EndDate_Human;
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
                    if (preg_match('/^\s*$/', $item->start_date)) { 
                        $StartDate_Human="";
                    }else{
                       $StartDate_Human=Carbon::parse($item->start_date)->format('d/m/yy');
                    }
                    if (preg_match('/^\s*$/', $item->end_date)) { 
                        $EndDate_Human="";
                    }else{
                       $EndDate_Human=Carbon::parse($item->end_date)->format('d/m/yy');
                    }
                    $item->Duration_Human= $different_days;
                    $item->StartDate_Human= $StartDate_Human;
                    $item->EndDate_Human= $EndDate_Human;
            }
              return $items;
    }
    public function index()
    {
        $users = User::all();
        $leaveTypes = LeaveType::all();
        $itemGet = Leave::with('type')->where('user_id', \Auth::user()->id)->get();
        $items= $this->LeaveCustomizedFormat($itemGet);
        // dd($items);
        return view('ants.pages.ask_for_leave', compact('users', 'leaveTypes', 'items'));
    }
    public function store(Request $request){
        // dd($request);
        $userId = \Auth::user()->id;
        $leaveTypeId = $request->leaveType;
// dd($request->leaveType);
        $notes_by_requester = $request->notes_by_requester;
        $input = array();
        $hd = $request->leave_start_date;
        if ($request->has('multiHoliday') || isset($request->leave_end_date)){
            $hdend = $request->leave_end_date;

        }
        else{
            $hdend = $request->leave_start_date;

        }
        $notes_by_requester = $request->notes_by_requester;
        $leave_start_date = Carbon::parse($hd)->format('Y-m-d');
        $leave_end_date = Carbon::parse($hdend)->format('Y-m-d');

        if ($request->hasFile('doc')) {
            if ($request->file('doc')->isValid()) {
                $file = $request->file('doc');
                $document_name = $file->getClientOriginalName();
                $destinationPath = public_path('/documents/leave');
                $file->move($destinationPath, $document_name);
                $input['documents'] = $document_name;
            }
        }
        $input['user_id'] = $userId;
        $input['start_date'] = $leave_start_date;
        $input['end_date'] = $leave_end_date;
        $input['notes_by_requester'] = $notes_by_requester;
        $input['leave_type'] = $leaveTypeId;
        $leaveStore = Leave::create($input);
        if (!$leaveStore) {
            return response()->json([
            "success"=>false,
            "message"=>'failed to save',
        ]);
        }
        $item = Leave::with('users','type')->find($leaveStore->id);
        $leaves=$this->LeaveCustomizedFormat($item);
        // dd($item);
        return response()->json([
            "success"=>true,
            "leaves"=>$leaveStore,
            "item"=>$item,
            "message"=>'save successfully',

        ]);





    }


}

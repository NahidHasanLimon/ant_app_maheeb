<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\SubDepartment;
use App\Company;
use App\User;
use App\AttendanceLog;
use App\Attendance;
use Auth;
use Carbon\Carbon;
use DB;
class AttendanceSingleButtonController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

public function AttendanceDataHuman($attendance_logs){
            foreach ($attendance_logs as $attendance) {
                    if ($attendance->InTime >'10:10:10') {
                        $status_m="Late";
                    }else{
                        $status_m="In Time";
                    }       
                    if (preg_match('/^\s*$/', $attendance->InTime)) { 
                        $InTime_Human="";
                    }else{
                         $InTime_Human=Carbon::parse($attendance->InTime)->format('g:i A');
                    }
                    if (preg_match('/^\s*$/', $attendance->OutTime)) { 
                        $OutTime_Human="";
                    }else{
                        $OutTime_Human=Carbon::parse($attendance->OutTime)->format('g:i A');
                    }
                    if (preg_match('/^\s*$/', $attendance->Duration)) { 
                        $Duration_Human="";
                    }else{
                       $Duration_Human=$attendance->Duration;
                    }
                    if (preg_match('/^\s*$/', $attendance->Date)) { 
                        $Date_Human="";
                    }else{
                       $Date_Human=Carbon::parse($attendance->Date)->format('d/m/yy');
                    }
                    $attendance->status_m= $status_m;
                    $attendance->InTime_Human= $InTime_Human;
                    $attendance->OutTime_Human= $OutTime_Human;
                    $attendance->Duration_Human= $Duration_Human;
                    $attendance->Date_Human= $Date_Human;
                 }
              return $attendance_logs;
    }
    public function attendance_logs($user_id){
        $attendances=  AttendanceLog::select(array(
            'user_id','attendance_date as Date','check_in as InTime','check_out as OutTime', 
            DB::raw("TIMEDIFF(check_out,check_in)Duration")))
                    ->where('user_id',$user_id)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    } 
    public function attendance_logs_datewise($user_id,$attendance_date){
        $attendances=  AttendanceLog::select(array(
            'user_id','attendance_date as Date','check_in as InTime','check_out as OutTime', 
            DB::raw("TIMEDIFF(check_out,check_in)Duration")))
                    ->where('user_id',$user_id)
                    ->whereDate('attendance_date',$attendance_date)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    }

    public function index()
    {
        $last_attendance=AttendanceLog::where('user_id',Auth::user()->id)
                    ->whereDate('attendance_date',Carbon::today()->toDateString())
                    ->orderBy('id', 'DESC')
                    ->first();
            // dd($las);
            if (!is_null($last_attendance)) {
               $last_row=$last_attendance;
            }else{
                $last_row="";
            }

        $attendances= $this->attendance_logs(Auth::user()->id);
                            // dd($attendances);
        $attendances=$this->AttendanceDataHuman($attendances);
        // dd($attendances);

        $todaysAttendance=AttendanceLog::where('user_id',Auth::user()->id)
                            ->whereDate('attendance_date',Carbon::today()->toDateString())
                            ->first();
                        // dd($todaysAttendance);
        // dd($todaysAttendance);
        // dd($attendances);
        return view('admin.pages.own_attendance_single_button',compact('attendances','todaysAttendance','last_row'));
    }
    // new code
         public function check_last_status(){
            $attendance_date=Carbon::today()->toDateString();
            $total_checked_in=$this->total_checked_in_session_for_a_user($attendance_date);
            // dd($total_checked_in);
        $last_row=AttendanceLog::where('user_id',Auth::user()->id)
                    ->whereDate('attendance_date',$attendance_date)
                    ->orderBy('id', 'DESC')
                    ->first();
                   ;
        if (!is_null($last_row)) {
            if (!is_null($last_row->check_out) && !is_null($last_row->check_in)) {
                  return response()->json([
                            'success'=>true,
                            // 'status'=>false,
                            'checked_status'=>'out',
                            'total_checked_in'=>$total_checked_in,
                            'data'=>$last_row,
                            'message'=>'Checked out',
                        ]);
            }elseif (is_null($last_row->check_out) && is_null($last_row->check_in)) {
                 return response()->json([
                            'success'=>false,
                            // 'status'=>null,
                            'checked_status'=>'empty',
                             'total_checked_in'=>$total_checked_in,
                            'data'=>$last_row,
                            'message'=>'Empty !',
                        ]);
            }elseif (!is_null($last_row->check_out) && is_null($last_row->check_in)) {
                 return response()->json([
                            'success'=>true,
                            // 'status'=>false,
                            'checked_status'=>'out',
                             'total_checked_in'=>$total_checked_in,
                            'data'=>$last_row,
                            'message'=>'Checked out',
                        ]);
            }elseif (is_null($last_row->check_out) && !is_null($last_row->check_in)) {
                 return response()->json([
                            'success'=>true,
                            // 'status'=>true,
                            'checked_status'=>'in',
                             'total_checked_in'=>$total_checked_in,
                            'data'=>$last_row,
                            'message'=>'Checked in',
                        ]);
            }
        }else{
            return response()->json([
                            'success'=>false,
                            // 'status'=>null,
                            'checked_status'=>'empty',
                             'total_checked_in'=>$total_checked_in,
                            'data'=>$last_row,
                            'message'=>'Empty !',
                        ]);
        }

    }
    public function check_last_status_today(){
        dd('got it');
    }
    public function total_checked_in_session_for_a_user($attendance_date){
        $count_checked_session=0;
         $checked_session=AttendanceLog::where('user_id',Auth::user()->id)
                    ->whereDate('attendance_date',$attendance_date)
                    ->orderBy('id', 'DESC')
                    ->count();
            if (!$checked_session) {
                $count_checked_session=0;
              
            }else{
                $count_checked_session=$checked_session;
            }
            return $count_checked_session; 

        }
    public function find_last_status(){
        $last_row=AttendanceLog::where('user_id',Auth::user()->id)
                    ->whereDate('attendance_date',Carbon::today()->toDateString())
                    ->orderBy('id', 'DESC')
                    ->first();
                   ;
        if ($last_row) {
            return $last_row;
        }else{
            return false;
        }
    }
    public function check_in(Request $request)
    {   
        $attendance_date=Carbon::today()->toDateString();
        $current_time=Carbon::Now()->toTimeString();
         if ($current_time >'10:10:10') {
                     $at_status='late';
                 }else{
                    $at_status='present';
                 }

         $total_checked_in=$this->total_checked_in_session_for_a_user($attendance_date);
            if ($this->find_last_status()) {
                 if (!is_null($this->find_last_status()->check_out))
                   {
                 $attendance = new AttendanceLog();
                 $attendance->user_id=Auth::user()->id;
                 $attendance->attendance_date=Carbon::now();
                 $attendance->check_in= $current_time;
                $attendance->status=$at_status;
                 $attendance->save();
                 if ($attendance) {
                     return response()->json([
                            'success'=>true,
                            'checked_status'=>"in",
                            'total_checked_in'=>$total_checked_in,
                            'data'=>$attendance
                        ]);

                 }
                   } else{
                   return response()->json([
                            'success'=>false,
                            'checked_status'=>'in',
                            'total_checked_in'=>$total_checked_in,
                            'message'=>"You are already In!! First Checkout "
                        ]);
                   }

            }else{
                $attendance= new  AttendanceLog();
                $attendance->user_id=Auth::user()->id;
                $attendance->attendance_date=Carbon::now();
                $attendance->check_in= $current_time;
                $attendance->status=$at_status;
                $attendance->save();
                if ($attendance) {
                     return response()->json([
                            'success'=>true,
                            'checked_status'=>"in",
                            'total_checked_in'=>$total_checked_in,
                            'data'=>$attendance
                        ]);
                 }else{
                    return response()->json([
                        'success'=>false,
                        'message'=>'Failed to Save',
                    ]);
                 }
                }
        }
    public function check_out()
     {
        $attendance_date=Carbon::today()->toDateString();
        $total_checked_in=$this->total_checked_in_session_for_a_user($attendance_date);
        if ($this->find_last_status()) {
               if (is_null($this->find_last_status()->check_out))
                   {
                    // dd($last_row);

               $attendance = new AttendanceLog();
               $attendance=$attendance->find($this->find_last_status()->id);
               $attendance->user_id=Auth::user()->id;
               $attendance->attendance_date=Carbon::now();
               $now=Carbon::Now()->toTimeString();
               $totalDuration = Carbon::Now()->diffInSeconds($attendance->check_in);
               $duration=gmdate('H:i:s', $totalDuration);
               $attendance->check_out=$now;
               $attendance->duration=$duration;

                 $attendance->save();
                 if ($attendance) {
                     return response()->json([
                            'success'=>true,
                            'checked_status'=>"out",
                            'total_checked_in'=>$total_checked_in,
                            'data'=>$attendance
                        ]);
                 }
                   } else{
                   return response()->json([
                            'success'=>false,
                            'checked_status'=>'out',
                            'total_checked_in'=>$total_checked_in,
                            'message'=>"You are already Checked out! First checked in Then Check Out"
                        ]);
                   }
        }else{
            // dd('last satus false no Data Yet');
            return response()->json([
                            'success'=>false,
                            'checked_status'=>'empty',
                            'total_checked_in'=>$total_checked_in,
                            'message'=>"You have to check in first"
                        ]);
        }
       

    }
    // new code

  
}

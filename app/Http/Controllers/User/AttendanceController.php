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
class AttendanceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

public function AttendanceDataHuman($attendance_logs){
            foreach ($attendance_logs as $attendance) {
                   if (is_null($attendance->Status)) {
                               if ($attendance->InTime >'10:10:10') {
                                    $Status_Human="late";
                                }else{
                                    $Status_Human="present";
                                }
                        }else{
                            $Status_Human=$attendance->Status;
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
                       // $Duration_Human=$attendance->Duration;
                        $Duration_Human=Carbon::parse($attendance->Duration)->format('H:i:s');
                    }
                    if (preg_match('/^\s*$/', $attendance->Date)) { 
                        $Date_Human="";
                    }else{
                       $Date_Human=Carbon::parse($attendance->Date)->format('d/m/yy');
                    }
                    $attendance->Status_Human= $Status_Human;
                    $attendance->InTime_Human= $InTime_Human;
                    $attendance->OutTime_Human= $OutTime_Human;
                    $attendance->Duration_Human= $Duration_Human;
                    $attendance->Date_Human= $Date_Human;
                    $attendance->query_date=Carbon::parse($attendance->Date)->format('yy-m-d');
                    $attendance->query_year_and_month=Carbon::parse($attendance->Date)->format('yy-m');
                 }
              return $attendance_logs;
    }
      public function index()
    {
        $start_of_month = Carbon::now()->startOfMonth()->toDateString();
        $end_of_month = Carbon::now()->endOfMonth()->toDateString();
        $month_year_name=Carbon::now()->format('F,Y');
        $todays_month_query=Carbon::now()->format('yy-m');
        // dd($montYearName);
        // parameter passed for current month logged user
        $attendances= $this->monthwise_appproved_data_from_attendance_table($start_of_month,$end_of_month,Auth::user()->id);
        // dd($attendances);
        // $attendances= $this->approved_attendance_logs(Auth::user()->id);
        // dd($attendances);
        $attendances=$this->AttendanceDataHuman($attendances);
        // dd($attendances);
        // dd($attendances);
        return view('ants.pages.view_attendance',compact('attendances','month_year_name','todays_month_query'));
    }
    public function view_logs()
    {
        $start_of_month = Carbon::now()->startOfMonth()->toDateString();
        $end_of_month = Carbon::now()->endOfMonth()->toDateString();
        $month_year_name=Carbon::now()->format('F,Y');
        $todays_date_query=Carbon::now()->format('yy-m-d');
        $attendances= $this->attendance_logs(Auth::user()->id);
        // dd($attendances);
        $attendances=$this->AttendanceDataHuman($attendances);
        // dd($attendances);
        return view('ants.pages.view_logs',compact('attendances','month_year_name','todays_date_query'));
    }
    public function attendance_logs($user_id){
        $attendances= AttendanceLog::select(array(
            'user_id','attendance_date as Date','check_in as InTime','check_out as OutTime','duration as Duration' ,'status as Status' ))
                    ->where('user_id',$user_id)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    }
      public function approved_attendance_logs($user_id){
        $attendances=  AttendanceLog::select(array(
            'user_id','attendance_date as Date','check_in as InTime','check_out as OutTime','duration as Duration' ,'status as Status' ))
                    ->where('user_id',$user_id)
                    ->where('is_approved_s',1)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    } 
   
     public function all_attendance_logs_datewise($user_id,$attendance_date){
        $attendances=  AttendanceLog::select(array(
            'user_id','attendance_date as Date','duration as Duration','check_in as InTime','check_out as OutTime'))
                    ->where('user_id',$user_id)
                    // ->where('is_approved_s',1)
                    ->whereDate('attendance_date',$attendance_date)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    }
      

   public function approved_attendance_logs_datewise($user_id,$attendance_date){
        $attendances=  AttendanceLog::select(array(
            'user_id','attendance_date as Date','duration as Duration','check_in as InTime','check_out as OutTime'))
                    ->where('user_id',$user_id)
                    ->where('is_approved_s',1)
                    ->whereDate('attendance_date',$attendance_date)
                    ->orderBy('id', 'DESC')
                    ->get();
        return $attendances;
    } 
    public function monthwise_appproved_data_from_attendance_table($start_of_month, $end_of_month,$user_id){
         $attendances=  Attendance::select(array(
            'user_id','attendance_date as Date','check_in as InTime','check_out as OutTime','duration as Duration','status as Status'))
                    ->where('user_id',$user_id)
                    ->where('is_approved_s',1)
                    ->whereBetween('attendance_date', [$start_of_month.' 00:00:00',$end_of_month.' 23:59:59'])
                    ->orderBy('id', 'DESC')
                    ->get();
                    return $attendances;
    }

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function log_single(Request $request)
    {
        //
         $attendances=$this->attendance_logs_datewise($request->user_id,$request->attendance_date);
         $attendances=$this->AttendanceDataHuman($attendances);
        if ($attendances) {
             return response()->json([
                'success'=>true,
                'attendances'=>$attendances
            ]);
        }else{
             return response()->json([
                'success'=>false,
                'message'=>'Log Not Available'
            ]);
        }
    }
      
    public function checked_logged_user_attendance_today()
    {
         $todaysAttendance=AttendanceLog::where('user_id',Auth::user()->id)
                          ->whereDate('attendance_date',Carbon::today()->toDateString())
                          ->first();
            if ($todaysAttendance) {
                    return $todaysAttendance->id;
            }else{
                return false;
            }

    }
   public function get_all_attendance_status(){


        $attendance_status= Attendance::where('user_id',Auth::user()->id)->get();
        return response()->json([
                'success'=>true,
                'data'=>$attendance_status,
                'message'=>'successFullu'
            ]);


    
        }
    
     public function get_all_attendance_logs_requested_user(Request $request){
        // dd($reqest);
        $attendance_date= $request->attendance_date;
        $user_id= $request->user_id;
        $attendance_logs= $this->all_attendance_logs_datewise($user_id,$attendance_date);
        $attendance_logs=$this->AttendanceDataHuman($attendance_logs);
        if (!$attendance_logs) {
             return response()->json([
                'success'=>false,
                'message'=>'Failed to find logs '
            ]);

        }
        // dd($attendance_logs);
        return response()->json([
            'success'=>true,
            'data'=> $attendance_logs,
        ]);


    } 
     public function get_aproved_attendance_logs_requested_user(Request $request){
        $attendance_date= $request->attendance_date;
        $user_id= $request->user_id;
        $attendance_logs= $this->approved_attendance_logs_datewise($user_id,$attendance_date);
        $attendance_logs=$this->AttendanceDataHuman($attendance_logs);
        if (!$attendance_logs) {
             return response()->json([
                'success'=>false,
                'message'=>'Failed to find logs '
            ]);

        }
        // dd($attendance_logs);
        return response()->json([
            'success'=>true,
            'data'=> $attendance_logs,
        ]);


    } 
   
    public function get_aaproved_attendance_logs_requested(Request $request){
        $attendance_date= $request->attendance_date;
        $user_id= $request->user_id;
        $attendance_logs= $this->approved_attendance_logs_datewise($user_id,$attendance_date);
        $attendance_logs=$this->AttendanceDataHuman($attendance_logs);
        if (!$attendance_logs) {
             return response()->json([
                'success'=>false,
                'message'=>'Failed to find logs '
            ]);

        }
        // dd($attendance_logs);
        return response()->json([
            'success'=>true,
            'data'=> $attendance_logs,
        ]);


    }

  
}

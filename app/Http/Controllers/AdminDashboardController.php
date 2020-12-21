<?php

namespace App\Http\Controllers;

use App\AttendanceLog;
use App\Leave;
use App\User;
use Carbon\Carbon;
use DB;
use App\Attendance;
use Auth;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //


    public function index()
    {

        $employee_count = User::count();
        $yesterday = Carbon::yesterday();
        $today = Carbon::today();


        // Chart data for today attendance starts here

        $today_data = DB::table('attendances')->whereDate('attendance_date', '=', $today)
            ->select(
                DB::raw('status as today_status'),
                DB::raw('count(*) as number'))
            ->groupBy('status')
            ->get();
        $today_array[] = ['today_status', 'Number'];
        foreach ($today_data as $key => $value) {
            $today_array[++$key] = [$value->today_status, $value->number];
        }


        //   Chart data for today attendance ends here


        //    Chart data for yesterday attendance starts here

        $yesterday_data = DB::table('attendances')->whereDate('attendance_date', '=', $yesterday)
            ->select(
                DB::raw('status as yesterday_status'),
                DB::raw('count(*) as number'))
            ->groupBy('status')
            ->get();


        $yesterday_array[] = ['yesterday_status', 'Number'];


        foreach ($yesterday_data as $key => $value) {
            $yesterday_array[++$key] = [$value->yesterday_status, $value->number];
        }

        //  Chart data for yesterday attendance ends here




        $attendance_date = Carbon::now()->toDateString();
        $attendances = $this->find_all_unApproved_superAdmin_attendance_log($attendance_date);
        $attendances = $this->AttendanceDataHuman($attendances);
//        $attendance_count = AttendanceLog::whereDate('attendance_date', '=', $today)->where('is_approved_s','=','0')->count();
        $attendance_count = AttendanceLog::whereDate('attendance_date', '=', $today)->where('approving_superAdmin_id','=',null)->distinct('user_id')->count();
        $leaves = Leave::with('approving_superadmin:id,first_name,middle_name,last_name', 'type:id,title', 'users:id,first_name,middle_name,last_name,photo')->where('is_approved_superadmin', '0')->take(6)->get();
        $leave_count = Leave::where('is_approved_superadmin', '=', '0')->count();





        return view('layouts.partials.admin_home_page_content', compact('attendances', 'leaves', 'leave_count', 'attendance_count', 'employee_count'))->with('today_status', json_encode($today_array))->with('yesterday_status', json_encode($yesterday_array));
    }


    public function find_all_unApproved_superAdmin_attendance_log()
    {


        $today = Carbon::today();

        $attendance_logs = AttendanceLog::whereDate('attendance_date', '=', $today)->select(array(
            'user_id', 'attendance_date as Date', 'duration AS Duration', 'check_in as InTime', 'check_out as OutTime',
            DB::raw("CONCAT( if(user.first_name is null, '',user.first_name ),' ', if(user.middle_name is null, '' , user.middle_name ),' ',if(user.last_name is null, ' ', user.last_name)) AS Name,CONCAT(user.photo) As photo")))
            ->join("users as user", "user.id", "=", "attendance_logs.user_id")
            ->where('is_approved_s', 0)
            ->groupBy(DB::raw("Date(attendance_date)"), 'user_id')->take(6)
            ->get();

        return $attendance_logs;


    }

    public function AttendanceDataHuman($attendance_logs)
    {
        foreach ($attendance_logs as $attendance) {
            if ($attendance->InTime > '10:10:10') {
                $status_m = "Late";
            } else {
                $status_m = "In Time";
            }
            if (preg_match('/^\s*$/', $attendance->InTime)) {
                $InTime_Human = "";
            } else {
                $InTime_Human = Carbon::parse($attendance->InTime)->format('g:i A');
            }
            if (preg_match('/^\s*$/', $attendance->OutTime)) {
                $OutTime_Human = "";
            } else {
                $OutTime_Human = Carbon::parse($attendance->OutTime)->format('g:i A');
            }
            if (preg_match('/^\s*$/', $attendance->Duration)) {
                $Duration_Human = "";
            } else {
                $Duration_Human = Carbon::parse($attendance->Duration)->format('H:i:s');

            }
            $attendance->status_m = $status_m;
            $attendance->InTime_Human = $InTime_Human;
            $attendance->OutTime_Human = $OutTime_Human;
            $attendance->Duration_Human = $Duration_Human;
            $attendance->query_date = Carbon::parse($attendance->Date)->format('yy-m-d');
        }
        return $attendance_logs;
    }


}

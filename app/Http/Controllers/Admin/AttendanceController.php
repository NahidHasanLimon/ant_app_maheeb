<?php

namespace App\Http\Controllers\Admin;

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

    public function AttendanceDataHuman($attendance_logs)
    {
        foreach ($attendance_logs as $attendance) {
            if ($attendance->InTime > '10:10:10') {
                $Status_Human = "Late";
            } else {
                $Status_Human = "In Time";
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
                // $Duration_Human=$attendance->Duration;
                $Duration_Human = Carbon::parse($attendance->Duration)->format('H:i:s');
            }
            if (preg_match('/^\s*$/', $attendance->Date)) {
                $Date_Human = "";
            } else {
                $Date_Human = Carbon::parse($attendance->Date)->format('d/m/yy');
            }
            $attendance->Status_Human = $Status_Human;
            $attendance->InTime_Human = $InTime_Human;
            $attendance->OutTime_Human = $OutTime_Human;
            $attendance->Duration_Human = $Duration_Human;
            $attendance->Date_Human = $Date_Human;
            $attendance->query_date = Carbon::parse($attendance->Date)->format('yy-m-d');
        }
        return $attendance_logs;
    }

    public function index()
    {

        $todays_date_formated = Carbon::now()->format('yy-m-d');
        $search_date = Carbon::now()->toDateString();
        $user_id = Auth::user()->id;
        $attendances = $this->all_appproved_data_from_attendance_table();
        $attendances = $this->AttendanceDataHuman($attendances);
        // dd($attendances);
//        $usersList = User::select(\DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) AS FullName"), "id")->get()->toArray();
        $usersList = User::select(\DB::raw("CONCAT(if(first_name is null, '',first_name ),' ', if(middle_name is null, '' , middle_name ),' ',if(last_name is null, ' ', last_name)) AS FullName"), "id")->get()->toArray();
        // dd($usersList);
        return view('admin.pages.add_attendance', compact('attendances', 'todays_date_formated', 'usersList'));
    }

    public function attendance_logs($user_id)
    {
        $attendances = AttendanceLog::select(array(
            'user_id', 'attendance_date as Date', 'check_in as InTime', 'check_out as OutTime',
            DB::raw("TIMEDIFF(check_out,check_in)Duration")))
            ->where('user_id', $user_id)
            ->orderBy('id', 'DESC')
            ->get();
        return $attendances;
    }


    public function dayWise_appproved_data_from_attendance_table($search_date, $user_id)
    {
        $attendances = Attendance::select(array(
            'user_id', 'attendance_date as Date', 'attendances.id',
            DB::raw("check_in InTime,check_out OutTime,duration Duration,CONCAT(user.first_name,' ', user.middle_name,' ',user.last_name) AS Name,CONCAT(super_admin.first_name,' ', super_admin.middle_name,' ',super_admin.last_name) AS SuperAdmin")))
            ->leftJoin("users as user", "user.id", "=", "attendances.user_id")
            ->leftJoin("users as super_admin", "super_admin.id", "=", "attendances.approving_superAdmin_id")
            ->whereDate('attendance_date', $search_date)
            ->where('is_approved_s', 1)
            ->groupBy(DB::raw("Date(attendance_date)"), 'user_id')
            ->get();

        return $attendances;
    }

    public function all_appproved_data_from_attendance_table()
    {
        $attendances = Attendance::select(array(
            'user_id', 'attendance_date as Date', 'attendances.id',
            DB::raw("check_in InTime,check_out OutTime,duration Duration,CONCAT(if(user.first_name is null, '',user.first_name ),' ', if(user.middle_name is null, '' , user.middle_name ),' ',if(user.last_name is null, ' ', user.last_name)) AS Name,CONCAT(if(super_admin.first_name is null, '',super_admin.first_name ),' ', if(super_admin.middle_name is null, '' , super_admin.middle_name ),' ',if(super_admin.last_name is null, ' ', super_admin.last_name)) AS SuperAdmin")))
            ->leftJoin("users as user", "user.id", "=", "attendances.user_id")
            ->leftJoin("users as super_admin", "super_admin.id", "=", "attendances.approving_superAdmin_id")
            ->where('is_approved_s', 1)
            ->groupBy(DB::raw("Date(attendance_date)"), 'user_id')
            ->get();
        return $attendances;
    }

// add attendance page


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function checked_logged_user_attendance_today()
    {
        $todaysAttendance = AttendanceLog::where('user_id', Auth::user()->id)
            ->whereDate('attendance_date', Carbon::today()->toDateString())
            ->first();
        if ($todaysAttendance) {
            return $todaysAttendance->id;
        } else {
            return false;
        }

    }

    public function is_attendance_exist($user_id, $attendance_date)
    {
        $exist_or_not = Attendance::where('user_id', $user_id)
            ->whereDate('attendance_date', $attendance_date)
            ->pluck('attendance_date')
            ->toArray();
        return $exist_or_not;
    }

    public function delete_attendanceLog_by_date_and_userWise($attendance_date, $user_id)
    {
        $delete_attendance = AttendanceLog::where('user_id', '=', $user_id)
            ->whereDate('attendance_date', '=', $attendance_date)
            ->delete();
        if ($delete_attendance) {
            return true;
        } else {
            return false;
        }

    }

    public function delete_attendance_by_date_and_userWise($attendance_date, $user_id)
    {
        $delete_attendance = Attendance::where('user_id', '=', $user_id)
            ->whereDate('attendance_date', '=', $attendance_date)
            ->delete();
        if ($delete_attendance) {
            return true;
        } else {
            return false;
        }

    }

    // for ajax reqest
    public function log_single(Request $request)
    {
        //
        $attendances = $this->attendance_logs_datewise($request->user_id, $request->attendance_date);
        $attendances = $this->AttendanceDataHuman($attendances);
        if ($attendances) {
            return response()->json([
                'success' => true,
                'attendances' => $attendances
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Log Not Available'
            ]);
        }
    }

    public function store_attendamce_log(Request $request)
    {
        $total_number_of_row = count($request->user);
        // if any of them exist
        for ($j = 0; $j < $total_number_of_row; $j++) {
            $user_id = $request->user[$j];
            $attendance_date = $request->attendance_date[$j];
            if ($this->is_attendance_exist($user_id, $attendance_date)) {
                return response()->json([
                    'success' => false,
                    'message' => "Attendancce Allready Exist"
                ]);
            }
        }
        // end existance checking

        for ($i = 0; $i < $total_number_of_row; $i++) {

            // $ok=$request->user[$i];

            $user_id = $request->user[$i];
            $attendance_date = $request->attendance_date[$i];

            // dd($attendance_date);
            // $attendance_date= Carbon::createFromFormat('d/m/Y', $request->attendance_date[$i])->format('Y-m-d');
            $check_in = $request->check_in[$i];
            $check_out = $request->check_out[$i];
            $total_duration_temp = Carbon::parse($check_out)->diffInSeconds(Carbon::parse($check_in));
            $total_duration = gmdate('H:i:s', $total_duration_temp);
            $status = $request->status[$i];
            if (is_null($status)) {
                if ($check_in <= '10:10:10') {
                    $final_status = "InTime";
                } else {
                    $final_status = "Late";
                }
            } else {
                $final_status = $status;
            }
            $attendance = New AttendanceLog();
            $attendance->user_id = $user_id;
            $attendance->attendance_date = $attendance_date;
            $attendance->check_in = $check_in;
            $attendance->check_out = $check_out;
            $attendance->status = $final_status;
            $attendance->duration = $total_duration;
            $attendance->save();


        }
        // end of for loop
        return response()->json([
            'success' => true,
            'message' => "Attendancce Added success fully"
        ]);

    }

    // before approve
    public function single_delete_attendanceLog(Request $request)
    {
        $user_id = $request->user_id;
        $attendance_date = $request->attendance_date;
        $delete_attendance = $this->delete_attendanceLog_by_date_and_userWise($attendance_date, $user_id);
        $today = Carbon::today();
        $attendance_count = AttendanceLog::whereDate('attendance_date', '=', $today)->where('approving_superAdmin_id','=',null)->distinct('user_id')->count();



        if ($delete_attendance) {
            return response()->json([
                'success' => true,
                'attendance_count' => $attendance_count,
                'message' => "Deleted Successfully"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Failed to delete Attendancce"
            ]);
        }


    }

    // For manage attennandance
    public function single_delete_from_attendanceLog_and_attendance(Request $request)
    {
        $user_id = $request->user_id;
        $attendance_date = $request->attendance_date;
        $delete_attendanceOnly = $this->delete_attendance_by_date_and_userWise($attendance_date, $user_id);
        if ($delete_attendanceOnly) {
            $delete_attendanceLog = $this->delete_attendanceLog_by_date_and_userWise($attendance_date, $user_id);
            if ($delete_attendanceLog) {
                return response()->json([
                    'success' => true,
                    'message' => "Deleted Successfully"
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'message' => "Failed to delete Attendancce"
        ]);


    }


}

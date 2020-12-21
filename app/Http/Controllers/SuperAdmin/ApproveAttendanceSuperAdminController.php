<?php

namespace App\Http\Controllers\SuperAdmin;

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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class ApproveAttendanceSuperAdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['role:super-admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find_unapproved_dates_sa()
    {
        $unapproved_dates_logs = AttendanceLog::where('is_approved_s', 0)
            ->distinct('DATE(attendance_date)')
            ->get([DB::raw('DATE(attendance_date) as attendance_date')])
            ->pluck('attendance_date')
            ->toArray();

        return $unapproved_dates_logs;
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

    public function index()
    {

        $todays_date_formated = Carbon::now()->format('yy-m-d');
        $attendance_date = Carbon::now()->toDateString();
        $attendances = $this->find_all_unApproved_superAdmin_attendance_log($attendance_date);
        $attendances = $this->AttendanceDataHuman($attendances);
//                     dd($attendances);
        $unapproved_dates = $this->find_unapproved_dates_sa();

        return view('admin.pages.approve_attendance', compact('attendances', 'unapproved_dates', 'todays_date_formated'));
    }

    public function is_approved_attendance_exist($user_id, $attendance_date)
    {
        $exist_or_not = Attendance::where('user_id', $user_id)
            ->where('is_approved_s', 1)
            ->whereDate('attendance_date', $attendance_date)
            ->pluck('attendance_date')
            ->toArray();
        return $exist_or_not;
    }

    public function is_attendance_exist($user_id, $attendance_date)
    {
        $exist_or_not = Attendance::where('user_id', $user_id)
            ->where('is_approved_s', 1)
            ->whereDate('attendance_date', $attendance_date)
            ->pluck('attendance_date')
            ->toArray();
        return $exist_or_not;
    }

    public function approved_by_superAdmin(Request $request)
    {
        $total_entry = count($request->hidden_user_id);


        for ($i = 0; $i < $total_entry; $i++) {
            $check_exist = $this->is_approved_attendance_exist($request->hidden_user_id[$i], $request->hidden_attendance_date);
            if (empty($check_exist)) {

                $total_duration = calculate_attendanceLog_total_duration($request->hidden_attendance_date, $request->hidden_user_id[$i]);
                $attendance = new Attendance();
                $attendance->attendance_date = $request->hidden_attendance_date;
                $attendance->user_id = $request->hidden_user_id[$i];
                $attendance->check_in = $request->check_in[$i];
                $attendance->check_out = $request->check_out[$i];
                $attendance->status = $request->status_admin[$i];;
                $attendance->is_approved_s = 1;
                $attendance->duration = $total_duration;
                if ($attendance->save()) {
                    // make log table approved
                    AttendanceLog::where('user_id', $request->hidden_user_id[$i])
                        ->whereDate('attendance_date', $request->hidden_attendance_date)
                        ->update(['is_approved_s' => 1]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Attendance Allready Exist'
                ]);
            }
        }
        // dd($attendance);
        return response()->json([
            'success' => true
        ]);

    }

    public function find_unApproved_superAdmin_attendance_log($attendance_date)
    {
        $attendance_logs = AttendanceLog::select(array(
            'user_id', 'attendance_date as Date', 'duration AS Duration', 'status as Status',
            DB::raw("MIN(check_in)InTime,MAX(check_out)OutTime,CONCAT(user.first_name,' ', user.middle_name,' ',user.last_name) AS Name")))
            ->join("users as user", "user.id", "=", "attendance_logs.user_id")
            ->whereDate('attendance_date', $attendance_date)
            ->where('is_approved_s', 0)
            ->groupBy(DB::raw("Date(attendance_date)"), 'user_id')
            ->get();
        return $attendance_logs;

    }

    public function find_all_unApproved_superAdmin_attendance_log()
    {
        $f_name = "user.first_name" ==null?"  ":"user.first_name";
        $middle_name = "user.middle_name" ==null?"Empty":"user.middle_name";

        $last_name = "user.last_name" ==null?"  ":"user.last_name";
        $attendance_logs = AttendanceLog::select(array(
            'user_id', 'attendance_date as Date', 'duration AS Duration',
//            DB::raw("MIN(check_in)InTime,MAX(check_out)OutTime,  CONCAT(user.first_name,' ', user.middle_name,' ',user.last_name) AS Name"  )))
            DB::raw("MIN(check_in)InTime,MAX(check_out)OutTime,  CONCAT( if(user.first_name is null, '',user.first_name ),' ', if(user.middle_name is null, '' , user.middle_name ),' ',if(user.last_name is null, ' ', user.last_name)) AS Name"  )))


            ->join("users as user", "user.id", "=", "attendance_logs.user_id")
            ->where('is_approved_s', 0)
            ->groupBy(DB::raw("Date(attendance_date)"), 'user_id')
            ->get();
        return $attendance_logs;

    }

    public function find_inTime_outTime_attendance_log($attendance_date, $user_id)
    {
        $attendance_logs = AttendanceLog::select(array(
            'user_id', 'attendance_date as Date', 'duration AS Duration',
            DB::raw("MIN(check_in)InTime,MAX(check_out)OutTime")))
            ->whereDate('attendance_date', $attendance_date)
            ->where('user_id', $user_id)
            ->first();
        return $attendance_logs;

    }

    public function calculate_attendanceLog_total_duration($attendance_date, $user_id)
    {
        $total_duration = 0;
        $attendance_logs = AttendanceLog::select(array(
            'user_id', 'attendance_date as Date', 'duration AS Duration',
            DB::raw("SEC_TO_TIME( SUM( TIME_TO_SEC( `duration` ) ) ) AS durationSum")))
            ->whereDate('attendance_date', $attendance_date)
            ->where('user_id', $user_id)
            ->first();
        if (!is_null($attendance_logs->durationSum)) {
            $total_duration = $attendance_logs->durationSum;

        }
        return $total_duration;

    }

    public function find_all_unapproved_attendanceLog_row_ids_for_a_date($attendance_date)
    {
        $unapproved_log_row_ids = AttendanceLog::where('is_approved_s', 0)
            ->whereDate('attendance_date', $attendance_date)
            ->pluck('id')
            ->toArray();
        return $unapproved_log_row_ids;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single_approved_attendanceLog(Request $request)
    {
        //
        // dd($request);
        $attendance_date = $request->attendance_date;
        $user_id = $request->user_id;
        // $check_in=$request->check_in;
        // $check_out=$request->check_out;
        // dd($request);
        $attendance = new Attendance();
        $approve_log = DB::table('attendance_logs')
            ->where('user_id', $user_id)
            ->whereDate('attendance_date', $attendance_date)
            ->update(['is_approved_s' => 1, 'approving_superAdmin_id' => Auth::user()->id]);
        $find_inTime_outTime = $this->find_inTime_outTime_attendance_log($attendance_date, $user_id);
        if ($find_inTime_outTime) {
            if ($find_inTime_outTime['InTime'] < '10:10:10') {
                $at_status = 'present';
            } else {
                $at_status = 'late';
            }
        }
        $total_duration = $this->calculate_attendanceLog_total_duration($attendance_date, $user_id);
        $is_exist = $this->is_attendance_exist($attendance_date, $user_id);
        if (!empty($is_exist)) {

            $approve_attendance = DB::table('attendances')
                ->where('user_id', $user_id)
                ->whereDate('attendance_date', $attendance_date)
                ->update([
                    'is_approved_s' => 1,
                    'check_in' => $find_inTime_outTime['InTime'],
                    'check_out' => $find_inTime_outTime['OutTime'],
                    'duration' => $total_duration,
                    'status' => $at_status,
                    'approving_superAdmin_id' => Auth::user()->id,
                ]);
        } else {
            $approve_attendance = Attendance::firstOrNew([
                'is_approved_s' => 1,
                'user_id' => $user_id,
                'attendance_date' => $attendance_date,
                'check_in' => $find_inTime_outTime['InTime'],
                'check_out' => $find_inTime_outTime['OutTime'],
                'duration' => $total_duration,
                'status' => $at_status,
                'approving_superAdmin_id' => Auth::user()->id,

            ]);
        }
        // dd(Auth::user()->id);
        $today = Carbon::today();
        $attendance_count = AttendanceLog::whereDate('attendance_date', '=', $today)->where('approving_superAdmin_id','=',null)->distinct('user_id')->count();



        if ($approve_attendance) {
            $approve_attendance->save();
            return response()->json([
                'success' => true,
                'attendance_count' => $attendance_count,
                'message' => 'Attendance Approved'

            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to Approved'
            ]);
        }
        // dd(Auth::user()->id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datewise_approved_attendanceLog(Request $request)
    {
        if (is_null($request->attendance_date)) {
            return response()->json([
                'success' => false,
                'message' => 'Attendance Date is Empty'
            ]);
        }

        $attendance_date = $request->attendance_date;
        // $row_ids=$this->find_all_unapproved_attendanceLog_row_ids_for_a_date($attendance_date);
        $attendances = $this->find_unApproved_superAdmin_attendance_log($attendance_date);
        // dd($attendances);
        $count_attendanceLog = count($attendances);
        if ($count_attendanceLog == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No Data  For Approve'
            ]);
            // dd($count_attendanceLog);

        }

        // update into log table
        $approve_log = DB::table('attendance_logs')
            ->whereDate('attendance_date', $attendance_date)
            ->update(['is_approved_s' => 1, 'approving_superAdmin_id' => Auth::user()->id]);

        // save into attendance table
        foreach ($attendances as $vlaue) {
            $total_duration = $this->calculate_attendanceLog_total_duration($attendance_date, $vlaue->user_id);
            $ddata[] = $total_duration;
            $attendance = new  Attendance();
            $attendance->user_id = $vlaue->user_id;
            $attendance->check_in = $vlaue->InTime;
            $attendance->check_out = $vlaue->OutTime;
            $attendance->duration = $total_duration;
            if ($vlaue->InTime < '10:10:10') {
                $at_status = 'present';
            } else {
                $at_status = 'late';
            }
            $attendance->status = $at_status;

            $attendance->is_approved_s = 1;
            $attendance->approving_superAdmin_id = Auth::user()->id;
            $attendance->save();
        }
        // dd($attendance);

        return response()->json([
            'success' => true,
            'ddata' => $ddata,
            'message' => 'approved succssfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

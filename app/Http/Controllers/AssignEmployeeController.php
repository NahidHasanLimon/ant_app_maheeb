<?php

namespace App\Http\Controllers;

use App\AssignEmployee;
use App\Company;
use App\Designation;
use App\Posting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AssignEmployeeController extends Controller
{
    //
    public function number_of_unassigned_employee()
    {
        $count = 0;
        $countUser = User::count();
        $countEmployee = Posting::whereNull('end_date')->distinct('user_id')->count();
        $number_of_unassigned_employee = $countUser - $countEmployee;
        if ($number_of_unassigned_employee && $number_of_unassigned_employee > 0) {
            $count = $number_of_unassigned_employee;
        }
        return $count;
    }

    public function index()
    {
        $number_of_unassigned_employee = $this->number_of_unassigned_employee();
//        dd($number_of_unassigned_employee);

        $companies = Company::all();

        $emps = Posting::with('users', 'designations')->whereNull('end_date')->distinct('user_id')->pluck('user_id');

        $allUsers = User::whereNotIn('id', $emps)->get();


        return view('admin.pages.assign_employee', compact('allUsers', 'companies', 'number_of_unassigned_employee'));
    }

    public function edit(Request $request)
    {
        $photo = "";
        $item = User::find($request->id);

        $photo .= "<img class='rounded-circle' style='height: 100px;width: 100px' src='/backend/img/user_photo/$item->photo'>";

        $user = User::find($request->id);

        return response()->json([
            'user' => $user,
            'photo' => $photo,

        ]);
    }

    public function store(Request $request)
    {
        $employee_user_id = User::find($request->id);

        $user_id = $employee_user_id->id;
        $hd = $request->holiday_start_date;


        $designation_id = $request->designationName;
        $salary = $request->salary_name;
        $remarks = $request->remarks_name;

        $start_date = Carbon::parse($hd)->format('Y-m-d');


        $input = array();

        $input['user_id'] = $user_id;
        $input['start_date'] = $start_date;

        $input['designation_id'] = $designation_id;
        $input['salary'] = $salary;
        $input['remarks'] = $remarks;

        $employee = Posting::create($input);

        $item = Posting::find($employee->id);


        $table = "";
//        $users = User::all();
        $users = User::pluck('id');
//        $emps = Posting::pluck('user_id');
        $emps = Posting::with('users', 'designations')->whereNull('end_date')->distinct('user_id')->pluck('user_id');;
        $tableItems = User::whereNotIn('id', $emps)->get();


        $number_of_unassigned_employee = $this->number_of_unassigned_employee();


        foreach ($tableItems as $tableItem) {
            $table .= "<tr class=\"unqcompany$tableItem->id\">";
            $table .= "<td>";
            $table .= "<img class='rounded-circle' style='height: 50px;width: 50px' src='/backend/img/user_photo/$tableItem->photo'>";
            $table .= "</td>";
            $table .= "<td>$tableItem->first_name $tableItem->middle_name $tableItem->last_name</td>";
            $table .= "<td>$tableItem->mobile_number</td>";
            $table .= "<td>$tableItem->email</td>";
            $table .= "<td>";
            $table .= "<button type=\"button\"
                            class=\"btn btn btn-primary btn-round-sm btn-sm assign_btn editcompany commonbtn\"
                            data-id=\"$tableItem->id\" data-toggle=\"modal\"
                            data-target=\"#exampleModal\">
                            Assign
                            </button>";

            $table .= "</td>";
            $table .= "</tr>";

        }

        if ($item) {
            return response()->json([
                'success' => true,
                "item" => $item,
                "table" => $table,
                "number_of_unassigned_employee" => $number_of_unassigned_employee,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }


//        return response()->json([
//            "item" => $item,
//            "table" => $table,
//            "number_of_unassigned_employee" => $number_of_unassigned_employee,
//        ]);
    }

    public function getDesignations($id)
    {

        $designation = Designation::where('sub_department_id', $id)->get();


        return json_encode($designation);
    }


}

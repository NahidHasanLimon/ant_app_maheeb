<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Designation;
use App\Posting;
use App\SubDepartment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeAssignEmployeeController extends Controller
{
    //
    public function index()
    {
        $companies = Company::all();

        $items = Posting::with('users', 'designations')->whereNull('end_date')->select('user_id')->distinct()->get();

        $users = User::pluck('id');
        $countUser = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');

        $myEmployee = Posting::all();
        $left = "";
        if ($myEmployee->isNotEmpty()) {
            if ($countUser <= 0) {
//                $left = 1;
                $left = "";
            } else {
                $left = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');
            }
        }



        return view('admin.pages.de_assign_employee', compact('items', 'companies', 'left'));
    }

    public function edit(Request $request)
    {
        $photo = "";
        $item = User::find($request->id);


        $photo .= "<img class='rounded-circle' style='height: 100px;width: 100px' src='/backend/img/user_photo/$item->photo'>";
        $user = User::find($request->id);
        $table = "";
        $tableItems = Posting::with('designations')->whereNull('end_date')->where('user_id', $request->id)->get();


//            $table .= " <table id=\"order-listing\" class=\"table table-responsive\">";
            $table .= " <table id=\"order-listing\" class=\"table\">";
            $table .= "<thead>";
            $table .= "<tr class=\"myTableHead\">";
            $table .= "<th>Company</th>";
            $table .= "<th>Dept</th>";
            $table .= "<th>Sub Dept</th>";
            $table .= "<th>Designation</th>";
            $table .= "<th>Start Date</th>";
            $table .= "<th>End Date</th>";
            $table .= "<th>Salary</th>";
            $table .= "<th>Activity</th>";
            $table .= "</tr>";
            $table .= " </thead>";
//            $table .= "<tbody class=\"holiday_row\" id=\"companyappend\">";
            $table .= "<tbody class=\"holiday_row\" id=\"deassign_detail_table\">";

            foreach ($tableItems as $key => $tableItem) {
                $desig_name = $tableItem->designations->designation_name;
                $sub_dept_name = $tableItem->designations->sub_department->sub_department_name;
                $dept_name = $tableItem->designations->sub_department->department->department_name;

                $company_name = $tableItem->designations->sub_department->department->company->company_name;


                $table .= "<tr class=\"unqcompany$tableItem->id\">";

                $table .= "<td>$company_name</td>";
                $table .= "<td>$dept_name</td>";

                $table .= "<td>$sub_dept_name</td>";

                $table .= "<td>$desig_name</td>";
                $table .= "<td>$tableItem->start_date</td>";
                if ($tableItem->end_date === null) {
                    $table .= "<td>Not Available</td>";
                } else {
                    $table .= "<td>($tableItem->end_date)</td>";
                }

                $table .= "<td>$tableItem->salary</td>";


                $table .= "<td>";

                $table .= "<button id='stop_btn_2' type=\"button\" 
                            data-id='$tableItem->id'
                            class=\"btn btn-danger deletecompany commonbtn\">
                           Stop
                         </button>";

                $table .= "</td>";
                $table .= "</tr>";
                $table .= "";
            }

            $table .= "</tbody>";
            $table .= "</table>";




        return response()->json([
            'user' => $user,
            'photo' => $photo,
            'table' => $table,

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


        if (Posting::where('user_id', $user_id)->whereNull('end_date')->where('designation_id', $designation_id)->exists()) {

            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        } else {
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
            $tableItems = Posting::with('designations')->whereNull('end_date')->where('user_id', $request->id)->get();

            $userName = User::where('id', $item->user_id)->first();

            $table .= " <table id=\"order-listing\" class=\"table\">";
            $table .= "<thead>";
            $table .= "<tr class=\"myTableHead\">";
            $table .= "<th>Company</th>";
            $table .= "<th>Dept</th>";
            $table .= "<th>Sub Dept</th>";
            $table .= "<th>Designation</th>";
            $table .= "<th>Start Date</th>";
            $table .= "<th>End Date</th>";
            $table .= "<th>Salary</th>";
            $table .= "<th>Activity</th>";
            $table .= "</tr>";
            $table .= " </thead>";
//            $table .= "<tbody class=\"holiday_row\" id=\"companyappend\">";
            $table .= "<tbody class=\"holiday_row\" id=\"deassign_detail_table\">";




            foreach ($tableItems as $key => $tableItem) {

                $desig_name = $tableItem->designations->designation_name;
                $sub_dept_name = $tableItem->designations->sub_department->sub_department_name;
                $dept_name = $tableItem->designations->sub_department->department->department_name;

                $company_name = $tableItem->designations->sub_department->department->company->company_name;

                $table .= "<tr class=\"unqcompany$tableItem->id\">";


                $table .= "<td>$company_name</td>";
//
                $table .= "<td>$dept_name</td>";

                $table .= "<td>$sub_dept_name</td>";
                $table .= "<td>$desig_name</td>";
                $table .= "<td>$tableItem->start_date</td>";

                if ($tableItem->end_date === null) {
                    $table .= "<td>Not Available</td>";
                } else {
                    $table .= "<td>($tableItem->end_date)</td>";
                }
                $table .= "<td>$tableItem->salary</td>";

                $table .= "<td>";

                $table .= "  <button type=\"button\" id=\"stop_btn_2\"
                            data-id='$tableItem->id'
                            class=\"btn btn-danger deletecompany commonbtn\">
                            
                            Stop
                            </button>";

                $table .= "</td>";
                $table .= "</tr>";
                $table .= "";

            }

            $users = User::pluck('id');
            $countUser = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');


            $myEmployee = Posting::all();
            $left = "";
            if ($myEmployee->isNotEmpty()) {
                if ($countUser <= 0) {

                    $left = 1;
                } else {
                    $left = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');
                }
            }


            return response()->json([
                'success' => true,
                "item" => $item,
                "table" => $table,
                "left" => $left,
            ]);


        }


    }


    public function destroy(Request $request)
    {
        $dept = Posting::find($request->id);

        $dept->delete();

        $dept->end_date = Carbon::now()->format('Y-m-d');
        $dept->save();
        return response()->json($dept);
    }


}

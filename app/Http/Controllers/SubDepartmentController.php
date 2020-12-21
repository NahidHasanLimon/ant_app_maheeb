<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\SubDepartment;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{

    public function index()
    {

        $departments = Department::get();
        $items = SubDepartment::with('department')->get();
        return view('admin.pages.add_sub_department', compact('companies', 'items','departments'));
    }

    public function destroy(Request $request)
    {
        $subDept = SubDepartment::find($request->id);
        $subDept->delete();
        return response()->json($subDept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $subDept = SubDepartment::find($request->id);
            return response()->json([
                'subDept' => $subDept,
            ]);
        } else {
            $subDept = SubDepartment::find($request->id);
//            dd($subDept);
            $department = Department::where('id', $subDept->department_id)->first();
            $rows = Department::get();
            $company = Company::where('id', $department->company_id)->first();
            $drops = "";

            foreach ($rows as $row) {

                if ($row->id == $department->id) {
                    $drops .= "<option value='$row->id' selected> $row->department_name </option>";
                } else {
                    $drops .= "<option value='$row->id'> $row->department_name </option>";
                }
            }

            return response()->json([
                'subDept' => $subDept,
                'company' => $company,
                'department' => $department,
                'drops' => $drops,
            ]);
        }
    }

    public function store(Request $request)
    {
        $deptId = $request->deptName;
        $subDeptName = $request->sub_dept_name;

        $input = array();
        $input['department_id'] = $deptId;
        $input['sub_department_name'] = $subDeptName;

        $subDepartment = SubDepartment::create($input);
        $item = SubDepartment::with('department', 'department.company')->find($subDepartment->id);
//


        if ($item) {
            return response()->json([
                'success' => true,
                "subDepartment" => $subDepartment,
                "item" => $item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }

    public function update(Request $request)
    {
        $subDepartment = SubDepartment::find($request->id);

        $subDepartment->sub_department_name = $request->sub_dept_name;

        $subDepartment->department_id = $request->deptName;

        $subDepartment->save();

        $item = SubDepartment::with('department', 'department.company')->find($subDepartment->id);



        if ($item) {
            return response()->json([
                'success' => true,
                "item" => $item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }



}

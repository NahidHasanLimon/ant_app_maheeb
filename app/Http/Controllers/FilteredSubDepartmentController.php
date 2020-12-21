<?php

namespace App\Http\Controllers;

use App\Department;
use App\SubDepartment;
use Illuminate\Http\Request;

class FilteredSubDepartmentController extends Controller
{
    //
    public function index($id){

        $dept_name = Department::where('id',$id)->first();
        $items = SubDepartment::with('department')->where('department_id',$dept_name->id)->get();

        return view('admin.pages.filtered_sub_department',compact('dept_name','items'));
    }

    public function destroy(Request $request)
    {

        $subDept = SubDepartment::find($request->id);
        $subDept->delete();
        return response()->json($subDept);
    }



    public function store(Request $request)
    {
//        $deptId = $request->deptName;
        $deptId = $request->deptIdHidden;
        $subDeptName = $request->sub_dept_name;

//        dd($deptId,$subDeptName);

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

//        dd($subDepartment->department_id);
        $subDepartment->sub_department_name = $request->sub_dept_name;

        $subDepartment->department_id = $subDepartment->department_id;

//        dd($request->sub_dept_name,$request->deptName);
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



    public function filtered_test(Request $request)
    {
//        dd($request->id);
        if ($request->type == 'show') {

            $subDept = SubDepartment::find($request->id);
            return response()->json([
                'subDept' => $subDept,
            ]);
        } else {
            $subDept = SubDepartment::find($request->id);


            $department = Department::where('id', $subDept->department_id)->first();

            return response()->json([
                'subDept' => $subDept,
//                'company' => $company,
                'department' => $department,
//                'drops' => $drops,
            ]);
        }
    }

}

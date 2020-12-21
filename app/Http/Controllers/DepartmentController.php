<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index()
    {

        $companies = Company::all();
        $items = Department::with('company')->get();
        return view('admin.pages.add_department', compact('companies', 'items'));
    }

    public function store(Request $request)
    {
        $cmpId = $request->cmpName;
        $deptName = $request->department_name;

        $input = array();

        $input['company_id'] = $cmpId;
        $input['department_name'] = $deptName;


        $request->validate([
            'department_name' => 'required|unique:departments|max:255',

        ]);



        $department = Department::create($input);
        $item = Department::with('company')->find($department->id);



        if ($item) {
            return response()->json([
                'success' => true,
                "department" => $department,
                "item" => $item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }


    }

    public function destroy(Request $request)
    {
        $dept = Department::find($request->id);


        $dept->delete();
        return response()->json($dept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $dept = Department::find($request->id);
            return response()->json([
                'dept' => $dept,
            ]);
        } else {
            $dept = Department::find($request->id);

            $company = Company::where('id', $dept->company_id)->first();


            return response()->json([
                'dept' => $dept,
                'company' => $company,
            ]);
        }
    }

    public function update(Request $request)
    {
        $dept = Department::find($request->id);
        $dept->company_id = $request->cmpName;

        $dept->department_name = $request->department_name;
        $request->validate([
            'department_name' => 'required|unique:departments|max:255',

        ]);


        $dept->save();
        $item = Department::with('company')->find($dept->id);



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

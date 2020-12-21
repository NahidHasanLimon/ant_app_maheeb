<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Designation;
use App\SubDepartment;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    //
    public function index()
    {

//        $companies = Company::all();
        $departments = Department::all();
        $subDepts = SubDepartment::all();
        $items = Designation::with('sub_department')->get();;
//        dd($items);
        return view('admin.pages.add_designation', compact('companies', 'departments', 'subDepts', 'items'));
    }

    public function destroy(Request $request)
    {
        $designation = Designation::find($request->id);


        $designation->delete();
        return response()->json($designation);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $designation = Designation::find($request->id);
            return response()->json([
                'designation' => $designation,
            ]);
        } else {
            $designation = Designation::find($request->id);

            $subDepartment = SubDepartment::where('id', $designation->sub_department_id)->first();

            $department = Department::where('id', $subDepartment->department_id)->first();
            $company = Company::where('id', $department->company_id)->first();


            $deptRows = Department::get();
            $subRows = SubDepartment::get();
            $drops = "";
            $subdrops = "";

            foreach ($deptRows as $row) {

                if ($row->id == $department->id) {
                    $drops .= "<option value='$row->id' selected> $row->department_name </option>";
                } else {
                    $drops .= "<option value='$row->id'> $row->department_name </option>";
                }
            }

            foreach ($subRows as $row) {

                if ($row->id == $subDepartment->id) {
                    $subdrops .= "<option value='$row->id' selected> $row->sub_department_name </option>";
                } else {
                    $subdrops .= "<option value='$row->id'> $row->sub_department_name </option>";
                }
            }

            return response()->json([
                'designation' => $designation,
                'company' => $company,
                'department' => $department,
                'subDepartment' => $subDepartment,
                'drops' => $drops,
                'subdrops' => $subdrops,
            ]);
        }
    }


    public function store(Request $request)
    {

        $subDeptId = $request->subDeptName;
        $designation = $request->designation_name;

        $input = array();

        $input['sub_department_id'] = $subDeptId;
        $input['designation_name'] = $designation;

        $designation = Designation::create($input);

        $item = Designation::with('sub_department', 'sub_department.department', 'sub_department.department.company')->find($designation->id);





        if ($item) {
            return response()->json([
                'success' => true,
                "designation" => $designation,
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
        $designation = Designation::find($request->id);
        $designation->sub_department_id = $request->subDeptName;

        $designation->designation_name = $request->designation_name;

        $designation->save();
        $item = Designation::with('sub_department', 'sub_department.department', 'sub_department.department.company')->find($designation->id);


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

    public function getSubDepartments($id)
    {

        $subDepartments = SubDepartment::where('department_id', $id)->get();


        return json_encode($subDepartments);
    }


}

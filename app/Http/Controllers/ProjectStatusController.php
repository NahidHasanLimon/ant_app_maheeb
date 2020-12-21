<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use App\ProjectStatusCategory;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
{
    //

    public function index()
    {

        $categories = ProjectStatusCategory::get();
        $items = ProjectStatus::with('status_category')->get();
        return view('admin.pages.project_status', compact('categories', 'items'));
    }


    public function destroy(Request $request)
    {
        $pro_status = ProjectStatus::find($request->id);
        $pro_status->delete();
        return response()->json($pro_status);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pro_status = ProjectStatus::with('status_category')->find($request->id);
            return response()->json([
                'pro_status' => $pro_status,
            ]);
        } else {
            $pro_status = ProjectStatus::with('status_category')->find($request->id);


            if ($pro_status) {
                return response()->json([
                    'success' => true,
                    'pro_status' => $pro_status,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }


    public function store(Request $request)
    {
        $catId = $request->cat_name;
        $pro_status_name = $request->name;
        $definition_name = $request->definition_name;

        $input = array();
        $input['project_status_category_id'] = $catId;
        $input['name'] = $pro_status_name;
        $input['definition'] = $definition_name;

//
//        $request->validate([
//            'name' => 'required|unique:project_statuses|max:255',
//
//        ]);



        $subCategory = ProjectStatus::create($input);
        $item = ProjectStatus::with('status_category')->find($subCategory->id);


        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
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
        $pro_status = ProjectStatus::find($request->id);

        $pro_status->project_status_category_id = $request->cat_name;
        $pro_status->name = $request->name;
        $pro_status->definition = $request->definition_name;

//        $request->validate([
//            'name' => 'required|unique:project_statuses|max:255',
//
//        ]);

        $pro_status->save();

        $item = ProjectStatus::with('status_category')->find($pro_status->id);


        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update'
            ]);
        }


    }

}

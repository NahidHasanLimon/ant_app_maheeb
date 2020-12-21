<?php

namespace App\Http\Controllers;

use App\ProjectStatusCategory;
use Illuminate\Http\Request;

class ProjectStatusCategoryController extends Controller
{
    //
    public function index()
    {
        $items = ProjectStatusCategory::all();
        return view('admin.pages.project_status_category', compact('items'));
    }


    public function store(Request $request)
    {
        $projects_status_category_name = $request->name;
        $definition = $request->definition_name;
        $input['name'] = $projects_status_category_name;
        $input['definition'] = $definition;


        $request->validate([
            'name' => 'required|unique:project_status_categories|max:255',

        ]);


        $project_status_category = ProjectStatusCategory::create($input);
        $item = ProjectStatusCategory::find($project_status_category->id);


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
        $pro_status_cat = ProjectStatusCategory::find($request->id);
        $pro_status_cat->name = $request->name;
        $pro_status_cat->definition = $request->definition_name;

        $request->validate([
            'name' => 'required|unique:project_status_categories|max:255',

        ]);


        $pro_status_cat->save();
        $item = ProjectStatusCategory::find($pro_status_cat->id);

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

    public function destroy(Request $request)
    {
        $pro_status_cat = ProjectStatusCategory::find($request->id);
        $pro_status_cat->delete();
        return response()->json($pro_status_cat);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pro_status_cat = ProjectStatusCategory::find($request->id);
            return response()->json([
                'pro_status_cat' => $pro_status_cat,
            ]);
        } else {
            $pro_status_cat = ProjectStatusCategory::find($request->id);


            if ($pro_status_cat) {
                return response()->json([
                    'success' => true,
                    'pro_status_cat' => $pro_status_cat,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }




}

<?php

namespace App\Http\Controllers;

use App\ProjectsCategory;
use Illuminate\Http\Request;

class ProjectsCategoryController extends Controller
{
    //

    public function index()
    {
        $items = ProjectsCategory::all();
        return view('admin.pages.add_projects_category', compact('items'));
    }


    public function store(Request $request)
    {
        $projects_category_name = $request->project_category_name;
        $input['project_category_name'] = $projects_category_name;

        $request->validate([
            'project_category_name' => 'required|unique:projects_categories|max:255',

        ]);

        $projects_category = ProjectsCategory::create($input);
        $item = ProjectsCategory::find($projects_category->id);



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

    public function destroy(Request $request)
    {
        $pr_cat = ProjectsCategory::find($request->id);
        $pr_cat->delete();
        return response()->json($pr_cat);
    }


    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pr_cat = ProjectsCategory::find($request->id);
            return response()->json([
                'pr_cat' => $pr_cat,
            ]);
        } else {
            $pr_cat = ProjectsCategory::find($request->id);


            if ($pr_cat) {
                return response()->json([
                    'success' => true,
                    'pr_cat' => $pr_cat,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }
    public function update(Request $request)
    {
        $pr_cat = ProjectsCategory::find($request->id);
        $pr_cat->project_category_name = $request->project_category_name;


        $request->validate([
            'project_category_name' => 'required|unique:projects_categories|max:255',

        ]);
        $pr_cat->save();
        $item = ProjectsCategory::find($pr_cat->id);

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

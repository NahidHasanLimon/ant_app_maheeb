<?php

namespace App\Http\Controllers;

use App\ProjectsCategory;
use App\ProjectsSubCategory;
use Illuminate\Http\Request;

class ProjectsSubCategoryController extends Controller
{
    //
    public function index()
    {

        $categories = ProjectsCategory::get();
        $items = ProjectsSubCategory::with('category')->get();
        return view('admin.pages.projects_sub_category', compact('categories', 'items'));
    }

    public function destroy(Request $request)
    {
        $pr_sub_cat = ProjectsSubCategory::find($request->id);
        $pr_sub_cat->delete();
        return response()->json($pr_sub_cat);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pr_sub_cat = ProjectsSubCategory::with('category')->find($request->id);
            return response()->json([
                'pr_sub_cat' => $pr_sub_cat,
            ]);
        } else {
            $pr_sub_cat = ProjectsSubCategory::with('category')->find($request->id);


            if ($pr_sub_cat) {
                return response()->json([
                    'success' => true,
                    'pr_sub_cat' => $pr_sub_cat,
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
        $subCategoryName = $request->projects_sub_category_name;

        $input = array();
        $input['project_category_id'] = $catId;
        $input['projects_sub_category_name'] = $subCategoryName;


        $request->validate([
            'projects_sub_category_name' => 'required|unique:projects_sub_categories|max:255',

        ]);



        $subCategory = ProjectsSubCategory::create($input);
        $item = ProjectsSubCategory::with('category')->find($subCategory->id);



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
        $subCategory = ProjectsSubCategory::find($request->id);

        $subCategory->project_category_id = $request->cat_name;

        $subCategory->projects_sub_category_name = $request->projects_sub_category_name;


        $request->validate([
            'projects_sub_category_name' => 'required|unique:projects_sub_categories|max:255',

        ]);


        $subCategory->save();

        $item = ProjectsSubCategory::with('category')->find($subCategory->id);


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

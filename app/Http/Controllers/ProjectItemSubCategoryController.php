<?php

namespace App\Http\Controllers;

use App\ProjectItemCategory;
use App\ProjectItemSubCategory;
use Illuminate\Http\Request;

class ProjectItemSubCategoryController extends Controller
{
    //
    public function index()
    {
        $categories = ProjectItemCategory::get();
        $items = ProjectItemSubCategory::with('item_category')->get();
        return view('admin.pages.project_item_sub_categories', compact('categories', 'items'));
    }

    public function destroy(Request $request)
    {
        $pr_sub_cat = ProjectItemSubCategory::find($request->id);
        $pr_sub_cat->delete();
        return response()->json($pr_sub_cat);
    }


    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pr_sub_cat = ProjectItemSubCategory::with('item_category')->find($request->id);
            return response()->json([
                'pr_sub_cat' => $pr_sub_cat,
            ]);
        } else {
            $pr_sub_cat = ProjectItemSubCategory::with('item_category')->find($request->id);


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
        $subCategoryName = $request->item_sub_category_name;

//        dd($catId,$subCategoryName);
        $input = array();
        $input['item_category_id'] = $catId;
        $input['item_sub_category_name'] = $subCategoryName;


        $request->validate([
            'item_sub_category_name' => 'required|unique:project_item_sub_categories|max:255',

        ]);


        $subCategory = ProjectItemSubCategory::create($input);
        $item = ProjectItemSubCategory::with('item_category')->find($subCategory->id);



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
        $subCategory = ProjectItemSubCategory::find($request->id);

        $subCategory->item_category_id = $request->cat_name;

        $subCategory->item_sub_category_name = $request->item_sub_category_name;


        $request->validate([
            'item_sub_category_name' => 'required|unique:project_item_sub_categories|max:255',

        ]);


        $subCategory->save();

        $item = ProjectItemSubCategory::with('item_category')->find($subCategory->id);


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

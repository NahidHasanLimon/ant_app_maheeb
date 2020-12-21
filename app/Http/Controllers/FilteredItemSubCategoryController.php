<?php

namespace App\Http\Controllers;

use App\ProjectItemCategory;
use App\ProjectItemSubCategory;
use Illuminate\Http\Request;

class FilteredItemSubCategoryController extends Controller
{
    //
    public function index($id){

        $cat_name = ProjectItemCategory::where('id',$id)->first();
        $items = ProjectItemSubCategory::with('item_category')->where('item_category_id',$cat_name->id)->get();

        return view('admin.pages.filtered_item_sub_category',compact('cat_name','items'));
    }

    public function store(Request $request){

        $catId = $request->cat_id_hidden;
        $subCategoryName = $request->sub_cat_name;

//        dd($catId,$subCategoryName);
        $input = array();
        $input['item_category_id'] = $catId;
        $input['item_sub_category_name'] = $subCategoryName;

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

        $subCategory->item_category_id = $subCategory->item_category_id;

        $subCategory->item_sub_category_name = $request->sub_cat_name;

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


    public function filtered_sub_cat_test(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $pr_sub_cat = ProjectItemSubCategory::with('item_category')->find($request->id);
            return response()->json([
                'pr_sub_cat' => $pr_sub_cat,
            ]);
        } else {
            $pr_sub_cat = ProjectItemSubCategory::with('item_category')->find($request->id);

//            dd($pr_sub_cat);
            $project_category = ProjectItemCategory::where('id',$pr_sub_cat->item_category_id)->first();


            if ($pr_sub_cat) {
                return response()->json([
                    'success' => true,
                    'pr_sub_cat' => $pr_sub_cat,
                    'project_category' => $project_category,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available',
                    'project_category' => $project_category
                ]);
            }
        }
    }


}

<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use App\ProjectStatusCategory;
use Illuminate\Http\Request;

class FilteredProjectStatusCategoryController extends Controller
{
    //

    public function index($id){

        $cat_name = ProjectStatusCategory::where('id',$id)->first();
        $items = ProjectStatus::with('status_category')->where('project_status_category_id',$cat_name->id)->get();

        return view('admin.pages.filtered_project_status_cat',compact('cat_name','items'));
    }


    public function store(Request $request)
    {
        $catId = $request->cat_id_hidden;
        $pro_status_name = $request->pro_status_name;
        $definition_name = $request->definition_name;

        $input = array();
        $input['project_status_category_id'] = $catId;
        $input['name'] = $pro_status_name;
        $input['definition'] = $definition_name;

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

        $pro_status->project_status_category_id = $pro_status->project_status_category_id;
        $pro_status->name = $request->pro_status_name;
        $pro_status->definition = $request->definition_name;

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

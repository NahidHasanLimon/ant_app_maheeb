<?php

namespace App\Http\Controllers;

use App\ProjectItemCategory;
use Illuminate\Http\Request;

class ProjectItemCategoryController extends Controller
{
    //
    public function index()
    {

        $items = ProjectItemCategory::all();
        return view('admin.pages.project_item_category',compact('items'));
    }

    public function destroy(Request $request)
    {
        $item_category = ProjectItemCategory::find($request->id);
        $item_category->delete();
        return response()->json($item_category);
    }


    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $item_category = ProjectItemCategory::find($request->id);
            return response()->json([
                'item_category' => $item_category,
            ]);
        } else {
            $item_category = ProjectItemCategory::find($request->id);


            if ($item_category) {
                return response()->json([
                    'success' => true,
                    'item_category' => $item_category,
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
        $item_category_name = $request->item_category_name;
        $input['item_category_name'] = $item_category_name;


        $request->validate([
            'item_category_name' => 'required|unique:project_item_categories|max:255',

        ]);


        $item_category = ProjectItemCategory::create($input);
        $item = ProjectItemCategory::find($item_category->id);


        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Available'
            ]);
        }

    }


    public function update(Request $request)
    {
        $item_category_name = ProjectItemCategory::find($request->id);
        $item_category_name->item_category_name = $request->item_category_name;


        $request->validate([
            'item_category_name' => 'required|unique:project_item_categories|max:255',

        ]);
        $item_category_name->save();
        $item = ProjectItemCategory::find($item_category_name->id);

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Available'
            ]);
        }
    }





}

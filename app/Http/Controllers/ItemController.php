<?php

namespace App\Http\Controllers;

use App\Items;
use App\ProjectItemCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function index()
    {
        $itemCategories = ProjectItemCategory::all();
        $items = Items::with('item_category')->get();
        return view('admin.pages.item', compact('itemCategories', 'items'));
    }

    public function destroy(Request $request)
    {
        $items = Items::find($request->id);
        $items->delete();
        return response()->json($items);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $items = Items::with('item_category')->find($request->id);
            return response()->json([
                'items' => $items,
            ]);
        } else {
            $items = Items::with('item_category')->find($request->id);


            if ($items) {
                return response()->json([
                    'success' => true,
                    'items' => $items,
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
        $itemName = $request->item_name;

        $input = array();
        $input['item_category_id'] = $catId;
        $input['item_name'] = $itemName;

        $itemCreate = Items::create($input);
        $item = Items::with('item_category')->find($itemCreate->id);



        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed To Store'
            ]);
        }
    }


    public function update(Request $request)
    {
        $element = Items::find($request->id);

        $element->item_category_id = $request->cat_name;

        $element->item_name = $request->item_name;

        $element->save();

        $item = Items::with('item_category')->find($element->id);


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

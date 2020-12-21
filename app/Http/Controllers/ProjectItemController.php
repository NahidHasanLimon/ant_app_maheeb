<?php

namespace App\Http\Controllers;

use App\Items;
use App\ProjectItem;
use App\Projects;
use Illuminate\Http\Request;

class ProjectItemController extends Controller
{
    //
    public function index()
    {

        $projectItems = ProjectItem::with('item', 'project')->get();
        $itemElements = Items::all();
        $projects = Projects::all();

        return view('admin.pages.project_items', compact('projectItems', 'itemElements', 'projects'));
    }

    public function destroy(Request $request)
    {
        $projectItems = ProjectItem::find($request->id);
        $projectItems->delete();
        return response()->json($projectItems);
    }

    public function detail(Request $request)
    {

        $projectItem = ProjectItem::with('item', 'project')->find($request->id);


            if ($projectItem) {
                return response()->json([
                    'success' => true,
                    'projectItem' => $projectItem,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }

    }



    public function store(Request $request)
    {
        $itemId = $request->item_name;
        $projectId = $request->project_name;
        $qtyId = $request->qty_name;
        $unitPriceId = $request->unit_price_name;

        $input = array();
        $input['item_id'] = $itemId;
        $input['projects_id'] = $projectId;
        $input['qty'] = $qtyId;
        $input['unit_price'] = $unitPriceId;

        $item = ProjectItem::create($input);
        $projectItem = ProjectItem::with('item', 'project')->find($item->id);



        if ($projectItem) {
            return response()->json([
                'success' => true,
                'projectItem' => $projectItem
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
        $element = ProjectItem::find($request->id);

        $element->item_id = $request->item_name;
        $element->projects_id = $request->project_name;
        $element->qty = $request->qty_name;
        $element->unit_price = $request->unit_price_name;



        $element->save();
        $projectItem =  ProjectItem::with('item', 'project')->find($element->id);

        if ($projectItem) {
            return response()->json([
                'success' => true,
                'projectItem' => $projectItem
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update'
            ]);
        }


    }




}

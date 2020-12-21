<?php

namespace App\Http\Controllers;

use App\TangibleAsset;
use App\TangibleCategory;
use Illuminate\Http\Request;

class TangibleAssetController extends Controller
{
    //
    public function index(){

        $categories = TangibleCategory::all();
        $items = TangibleAsset::with('tangible_category')->get();
        return view('admin.pages.add_tangible_asset',compact('categories','items'));
    }

    public function destroy(Request $request)
    {
        $dept = TangibleAsset::find($request->id);


        $dept->delete();
        return response()->json($dept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $dept = TangibleAsset::find($request->id);
            return response()->json([
                'dept' => $dept,
            ]);
        } else {
            $dept = TangibleAsset::find($request->id);

            $company = TangibleCategory::where('id', $dept->tangible_category_id)->first();

            return response()->json([
                'dept' => $dept,
                'company' => $company,
            ]);
        }
    }



    public function store(Request $request){
        $cmpId = $request->cmpName;
        $deptName = $request->deptName;
        $qntyName = $request->quantityName;

        $input = array();

        $input['tangible_category_id'] = $cmpId;
        $input['tangible_asset_name'] = $deptName;
        $input['tangible_asset_quantity'] = $qntyName;


        $department = TangibleAsset::create($input);
        $item = TangibleAsset::with('tangible_category')->find($department->id);




        if ($item) {
            return response()->json([
                'success' => true,
                "department"=>$department,
                "item"=>$item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }

    public function update(Request $request){
        $dept =  TangibleAsset::find($request->id);
        $dept->tangible_category_id = $request->cmpName;

        $dept->tangible_asset_name = $request->deptName;
        $dept->tangible_asset_quantity = $request->quantityName;


        $dept->save();
        $item = TangibleAsset::with('tangible_category')->find($dept->id);




        if ($item) {
            return response()->json([
                'success' => true,
                "item"=>$item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }


    }






}

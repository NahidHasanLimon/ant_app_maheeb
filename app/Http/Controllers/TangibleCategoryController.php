<?php

namespace App\Http\Controllers;

use App\TangibleCategory;
use Illuminate\Http\Request;

class TangibleCategoryController extends Controller
{
    //
    public function index()
    {
        $items = TangibleCategory::all();
        return view('admin.pages.add_tangible_category', compact('items'));
    }

    public function destroy(Request $request)
    {
        $company = TangibleCategory::find($request->id);

        $company->delete();
        return response()->json($company);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $company = TangibleCategory::find($request->id);
            return response()->json([
                'company' => $company,
            ]);
        } else {
            $company = TangibleCategory::find($request->id);

            return response()->json([
                'company' => $company,

            ]);
        }
    }


    public function store(Request $request)
    {
        $input = array();
        $cmpName = $request->company_name;

        $input['tangible_category_name'] = $cmpName;


        $company = TangibleCategory::create($input);
        $item = TangibleCategory::find($company->id);



        if ($item) {
            return response()->json([
                'success' => true,
                "company" => $company,
                "item" => $item,
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
        $company = TangibleCategory::find($request->id);
        $company->tangible_category_name = $request->company_name;


        $company->save();
        $item = TangibleCategory::find($company->id);



        if ($item) {
            return response()->json([
                'success' => true,
                "item" => $item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }

    }


}

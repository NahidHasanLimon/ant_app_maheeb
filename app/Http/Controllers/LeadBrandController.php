<?php

namespace App\Http\Controllers;

use App\LeadBrand;
use App\LeadCompany;
use Illuminate\Http\Request;

class LeadBrandController extends Controller
{
    //
    public function index()
    {

        $companies = LeadCompany::all();
        $items = LeadBrand::with('lead_company')->get();
        return view('admin.pages.leads.lead_brand', compact('companies', 'items'));
    }

    public function destroy(Request $request)
    {
        $dept = LeadBrand::find($request->id);


        $dept->delete();
        return response()->json($dept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $dept = LeadBrand::find($request->id);
            return response()->json([
                'dept' => $dept,
            ]);
        } else {
            $dept = LeadBrand::find($request->id);

            $company = LeadCompany::where('id', $dept->lead_company_id)->first();


            return response()->json([
                'dept' => $dept,
                'company' => $company,
            ]);
        }
    }

    public function store(Request $request)
    {
        $cmpId = $request->cmpName;
        $brandName = $request->lead_brand_name;

        $input = array();

        $input['lead_company_id'] = $cmpId;
        $input['lead_brand_name'] = $brandName;


        $request->validate([
            'lead_brand_name' => 'required|unique:lead_brands|max:255',

        ]);


        $department = LeadBrand::create($input);
        $item = LeadBrand::with('lead_company')->find($department->id);




        if ($item) {
            return response()->json([
                'success' => true,
                "department" => $department,
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
        $company = LeadBrand::find($request->id);
        $company->lead_brand_name = $request->lead_brand_name;
        $company->lead_company_id = $request->cmpName;
        $request->validate([
            'lead_brand_name' => 'required|unique:lead_brands|max:255',

        ]);


        $company->save();

        $item = LeadBrand::with('lead_company')->find($company->id);

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

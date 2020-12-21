<?php

namespace App\Http\Controllers;

use App\LeadIndustry;
use Illuminate\Http\Request;
use Validator;

class LeadIndustryController extends Controller
{
    //
    public function index()
    {
        $items = LeadIndustry::all();
        return view('admin.pages.leads.lead_industry', compact('items'));
    }

    public function destroy(Request $request)
    {
        $company = LeadIndustry::find($request->id);

        $company->delete();
        return response()->json($company);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $company = LeadIndustry::find($request->id);
            return response()->json([
                'company' => $company,
            ]);
        } else {
            $company = LeadIndustry::find($request->id);

            return response()->json([
                'company' => $company,

            ]);
        }
    }


    public function store(Request $request)
    {
        $input = array();
        $cmpName = $request->lead_industry_name;


        $input['lead_industry_name'] = $cmpName;


        $request->validate([
            'lead_industry_name' => 'required|unique:lead_industries|max:255',

        ]);


        $company = LeadIndustry::create($input);

        $item = LeadIndustry::find($company->id);



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
        $company = LeadIndustry::find($request->id);
        $company->lead_industry_name = $request->lead_industry_name;
        $request->validate([
            'lead_industry_name' => 'required|unique:lead_industries|max:255',

        ]);
        $company->save();
        $item = LeadIndustry::find($company->id);




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

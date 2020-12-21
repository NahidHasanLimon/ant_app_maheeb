<?php

namespace App\Http\Controllers;

use App\LeadIndustry;
use App\LeadSubIndustry;
use Illuminate\Http\Request;

class LeadSubIndustryController extends Controller
{
    //
    public function index(){

        $companies = LeadIndustry::all();
        $items = LeadSubIndustry::with('lead_industry')->get();
        return view('admin.pages.leads.lead_sub_industry',compact('companies','items'));
    }
    public function destroy(Request $request)
    {
        $dept = LeadSubIndustry::find($request->id);


        $dept->delete();
        return response()->json($dept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $dept = LeadSubIndustry::find($request->id);
            return response()->json([
                'dept' => $dept,
            ]);
        } else {
            $dept = LeadSubIndustry::find($request->id);

            $company = LeadIndustry::where('id', $dept->lead_industry_id)->first();

            return response()->json([
                'dept' => $dept,
                'company' => $company,
            ]);
        }
    }


    public function store(Request $request){
        $cmpId = $request->cmpName;
        $subIndName = $request->lead_sub_industry_name;

        $input = array();

        $input['lead_industry_id'] = $cmpId;
        $input['lead_sub_industry_name'] = $subIndName;

        $request->validate([
            'lead_sub_industry_name' => 'required|unique:lead_sub_industries|max:255',

        ]);



        $department = LeadSubIndustry::create($input);
        $item = LeadSubIndustry::with('lead_industry')->find($department->id);


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
    public function update(Request $request)
    {
        $company = LeadSubIndustry::find($request->id);
        $company->lead_sub_industry_name = $request->lead_sub_industry_name;
        $company->lead_industry_id = $request->cmpName;
        $request->validate([
            'lead_sub_industry_name' => 'required|unique:lead_sub_industries|max:255',

        ]);
        $company->save();



        $item = LeadSubIndustry::with('lead_industry')->find($company->id);


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

<?php

namespace App\Http\Controllers;

use App\LeadCompany;
use Illuminate\Http\Request;

class LeadCompanyController extends Controller
{
    //
    public function index()
    {
        $items = LeadCompany::all();
        return view('admin.pages.leads.lead_organization', compact('items'));
    }

    public function destroy(Request $request)
    {
        $company = LeadCompany::find($request->id);

        $company->delete();
        return response()->json($company);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $company = LeadCompany::find($request->id);
            return response()->json([
                'company' => $company,
            ]);
        } else {
            $company = LeadCompany::find($request->id);

            return response()->json([
                'company' => $company,

            ]);
        }
    }

    public function store(Request $request)
    {
        $input = array();
        $cmpName = $request->lead_company_name;

        $input['lead_company_name'] = $cmpName;

        $request->validate([
            'lead_company_name' => 'required|unique:lead_companies|max:255',

        ]);

        $company = LeadCompany::create($input);
        $item = LeadCompany::find($company->id);




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
        $company = LeadCompany::find($request->id);
        $company->lead_company_name = $request->lead_company_name;
        $request->validate([
            'lead_company_name' => 'required|unique:lead_companies|max:255',

        ]);

        $company->save();
        $item = LeadCompany::find($company->id);


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

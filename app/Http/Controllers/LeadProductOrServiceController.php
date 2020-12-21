<?php

namespace App\Http\Controllers;

use App\LeadIndustry;
use App\LeadProductOrService;
use App\LeadSubIndustry;
use Illuminate\Http\Request;

class LeadProductOrServiceController extends Controller
{
    //
    public function index(){

        $companies = LeadIndustry::get();
        $items = LeadProductOrService::with('lead_sub_industry','lead_sub_industry.lead_industry')->get();
        dd($items);
        $productServices = [0=>"product",1=>"service"];

        return view('admin.pages.leads.lead_product_or_service',compact('companies','items',"productServices"));
    }

    public function destroy(Request $request)
    {
        $subDept = LeadProductOrService::find($request->id);
        $subDept->delete();
        return response()->json($subDept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $subDept = LeadProductOrService::find($request->id);
            return response()->json([
                'subDept' => $subDept,
            ]);
        } else {
            $subDept = LeadProductOrService::find($request->id);

            $department = LeadSubIndustry::where('id', $subDept->lead_sub_industry_id)->first();
            $industry = LeadIndustry::where('id', $department->lead_industry_id)->first();
            $rows = LeadSubIndustry::get();
            $drops = "";

            foreach($rows as $row){

                if($row->id == $department->id) {
                    $drops .= "<option value='$row->id' selected> $row->lead_sub_industry_name </option>";
                }
                else{
                    $drops .= "<option value='$row->id'> $row->lead_sub_industry_name </option>";
                }
            }

            return response()->json([
                'subDept' => $subDept,
                'industry' => $industry,
                'department' => $department,
                'drops' => $drops,
            ]);
        }
    }




    public function store(Request $request){

        $deptId = $request->deptName;
        $psId = $request->psName;
        $subDeptName = $request->lead_product_or_service_name;

        $input = array();

        $input['lead_sub_industry_id'] = $deptId;
        $input['is_lead_product_or_service'] = $psId;
        $input['lead_product_or_service_name'] = $subDeptName;


        $request->validate([
            'lead_product_or_service_name' => 'required|unique:lead_product_or_services|max:255',

        ]);



        $subDepartment = LeadProductOrService::create($input);
        $item = LeadProductOrService::with('lead_sub_industry','lead_sub_industry.lead_industry')->find($subDepartment->id);




        if ($item) {
            return response()->json([
                'success' => true,
                "subDepartment"=>$subDepartment,
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
        $subDepartment =  LeadProductOrService::find($request->id);
//        $subDepartment->company_id = $request->cmpName;
        $subDepartment->is_lead_product_or_service = $request->psName;

        $subDepartment->lead_sub_industry_id = $request->deptName;
        $subDepartment->lead_product_or_service_name = $request->lead_product_or_service_name;
        $request->validate([
            'lead_product_or_service_name' => 'required|unique:lead_product_or_services|max:255',

        ]);
        $subDepartment->save();

        $item = LeadProductOrService::with('lead_sub_industry','lead_sub_industry.lead_industry')->find($subDepartment->id);


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






    public function getSubIndustry($id)
    {

        $departments = LeadSubIndustry::where('lead_industry_id',$id)->get();

        return json_encode($departments);
    }






}

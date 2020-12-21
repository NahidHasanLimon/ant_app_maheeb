<?php

namespace App\Http\Controllers;

use App\LeadBrand;
use App\LeadBrandService;
use App\LeadCompany;
use App\LeadProductOrService;
use Illuminate\Http\Request;

class LeadBrandServiceController extends Controller
{
    //
    public function index(){

        $leadCompanies = LeadCompany::all();
        $leadprodServices = LeadProductOrService::all();
        $items = LeadBrandService::with('lead_brand','lead_product_or_service')->get();


        return view('admin.pages.leads.lead_brand_service',compact('leadCompanies','items',"leadprodServices"));
    }

    public function getLeadBrand($id)
    {

        $departments = LeadBrand::where('lead_company_id',$id)->get();

        return json_encode($departments);
    }
    public function destroy(Request $request)
    {
        $subDept = LeadBrandService::find($request->id);
        $subDept->delete();
        return response()->json($subDept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $subDept = LeadBrandService::find($request->id);
            return response()->json([
                'subDept' => $subDept,
            ]);
        } else {
            $subDept = LeadBrandService::find($request->id);

            $lb = LeadBrand::where('id',$subDept->lead_brand_id)->first();
            $lc = LeadCompany::where('id',$lb->lead_company_id)->first();
            $lps = LeadProductOrService::where('id',$subDept->lead_product_or_service_id)->first();

            $rows = LeadBrand::get();

            $drops = "";

            foreach($rows as $row){

                if($row->id == $subDept->lead_brand_id) {
                    $drops .= "<option value='$row->id' selected> $row->lead_brand_name </option>";
                }
                else{
                    $drops .= "<option value='$row->id'> $row->lead_brand_name </option>";
                }
            }

            return response()->json([
                'subDept' => $subDept,
                'lc' => $lc,
                'lps' => $lps,
                'drops' => $drops,
            ]);
        }
    }


    public function store(Request $request){

        $deptId = $request->deptName;
        $psId = $request->psName;


        $input = array();


        $input['lead_brand_id'] = $deptId;
        $input['lead_product_or_service_id'] = $psId;

        $subDepartment = LeadBrandService::create($input);

        $item = LeadBrandService::with('lead_brand','lead_product_or_service')->find($subDepartment->id);

        $lb = LeadBrand::where('id',$item->lead_brand_id)->first();
        $lc = LeadCompany::where('id',$lb->lead_company_id)->first();



        if ($item) {
            return response()->json([
                'success' => true,
                "subDepartment"=>$subDepartment,
                "item"=>$item,
                "lc"=>$lc,

            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }




    }

    public function update(Request $request){
        $subDepartment =  LeadBrandService::find($request->id);
        $subDepartment->lead_brand_id = $request->deptName;

        $subDepartment->lead_product_or_service_id = $request->psName;

        $subDepartment->save();

        $item = LeadBrandService::with('lead_brand','lead_product_or_service')->find($subDepartment->id);
        $lb = LeadBrand::where('id',$item->lead_brand_id)->first();
        $lc = LeadCompany::where('id',$lb->lead_company_id)->first();

        if ($item) {
            return response()->json([
                'success' => true,
                "item"=>$item,
                "lc"=>$lc,

            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }





    }


}

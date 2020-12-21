<?php

namespace App\Http\Controllers;

use App\LeadBrand;
use App\LeadCompany;
use App\NewProject;
use App\Projects;
use App\ProjectsSubCategory;
use App\ProjectStatus;
use App\ProjectStatusCategory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewProjectController extends Controller
{
    public function index()
    {
        $brands = LeadBrand::get();
        $companies = LeadCompany::get();
        $statuses = ProjectStatus::get();
        $categories = ProjectStatusCategory::get();
        $users = User::get();
        $cash_bank = [1 => "Cash", 2 => "Bank"];
        $items = NewProject::with('lead_company','user','status_category')->get();

//        dd($items);

        return view('admin.pages.new_project', compact('brands', 'companies', 'statuses', 'categories', 'users', 'cash_bank', 'items'));
    }

    public function destroy(Request $request)
    {
        $projects = NewProject::find($request->id);
        $projects->delete();
        return response()->json($projects);
    }


    public function store(Request $request)
    {
        $lead_company_id = $request->company_name;
        $lead_brand_id = $request->brand_name;
        $project_name = $request->project_name;
        $status_category_id = $request->status_cat_name;
        $status_id = $request->status_name;
        $kam_id = $request->kam_name;
        $work_order_month = $request->work_order_month;
        $project_complete_month = $request->project_com_month_name;
        $revenue = $request->rev_name;
        $cost = $request->cost_name;
        $usable_revenue = $request->usable_rev_name;
        $type = $request->cash_bank_name;
        $journal_link = $request->journal_link_name;

//        dd($lead_brand_id,$lead_company_id,$project_name,$status_category_id,$status_id);

        $new_project = new NewProject();
        $new_project->lead_brand_id = $lead_brand_id;
        $new_project->lead_company_id = $lead_company_id;
        $new_project->projects_name = $project_name;
        $new_project->status_category_id = $status_category_id;
        $new_project->status_id = $status_id;
        $new_project->kam_id = $kam_id;
        $new_project->work_order_month = Carbon::parse($work_order_month)->format('Y-m-d');
        $new_project->project_complete_month = Carbon::parse($project_complete_month)->format('Y-m-d');
        $new_project->revenue = $revenue;
        $new_project->cost = $cost;
        $new_project->usable_revenue = $usable_revenue;
        $new_project->type = $type;
        $new_project->journal_link = $journal_link;

//        dd($new_project);

        $new_project->save();
        $item = NewProject::with('lead_company','user')->find($new_project->id);
//

//        dd($item);
//
        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
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
        $lead_company_id = $request->company_name;
        $lead_brand_id = $request->brand_name;
        $project_name = $request->project_name;
        $status_category_id = $request->status_cat_name;
        $status_id = $request->status_name;
        $kam_id = $request->kam_name;
        $work_order_month = $request->work_order_month;
        $project_complete_month = $request->project_com_month_name;
        $revenue = $request->rev_name;
        $cost = $request->cost_name;
        $usable_revenue = $request->usable_rev_name;
        $type = $request->cash_bank_name;
        $journal_link = $request->journal_link_name;


        $new_project = NewProject::find($request->id);
        $new_project->lead_brand_id = $lead_brand_id;
        $new_project->lead_company_id = $lead_company_id;
        $new_project->projects_name = $project_name;
        $new_project->status_category_id = $status_category_id;
        $new_project->status_id = $status_id;
        $new_project->kam_id = $kam_id;
        $new_project->work_order_month = Carbon::parse($work_order_month)->format('Y-m-d');
        $new_project->project_complete_month = Carbon::parse($project_complete_month)->format('Y-m-d');
        $new_project->revenue = $revenue;
        $new_project->cost = $cost;
        $new_project->usable_revenue = $usable_revenue;
        $new_project->type = $type;
        $new_project->journal_link = $journal_link;


        $new_project->save();
        $item = NewProject::with('lead_company','user')->find($new_project->id);

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }
    }

    public function getBrand($id){

        $brands= LeadBrand::where('lead_company_id', $id)->get();

        return json_encode($brands);

    }

    public function getStatus($id){

        $status= ProjectStatus::where('project_status_category_id', $id)->get();

        return json_encode($status);

    }




    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $projects = NewProject::with('lead_company', 'user')->find($request->id);
            return response()->json([
                'projects' => $projects,
            ]);
        } else {
            $projects = NewProject::with('lead_company', 'user','status_category')->find($request->id);
//            dd($projects);
            $lead_brand = LeadBrand::where('id',$projects->lead_brand_id)->first();
            $project_status = ProjectStatus::where('id',$projects->status_id)->first();

//            dd($project_status);
            $lead_brands = LeadBrand::all();
            $lead_brand_option = "";

            foreach ($lead_brands as $lead_brand) {

                if ($projects->lead_brand_id == $lead_brand->id) {
                    $lead_brand_option .= "<option value='$lead_brand->id' selected> $lead_brand->lead_brand_name </option>";
                } else {
                    $lead_brand_option .= "<option value='$lead_brand->id'> $lead_brand->lead_brand_name </option>";
                }
            }

            $status_cats = ProjectStatus::all();
            $status_cat_option = "";

            foreach ($status_cats as $status_cat) {

                if ($projects->status_category_id == $status_cat->id) {
                    $status_cat_option .= "<option value='$status_cat->id' selected> $status_cat->name </option>";
                } else {
                    $status_cat_option .= "<option value='$status_cat->id'> $status_cat->name </option>";
                }
            }


            if ($projects) {
                return response()->json([
                    'success' => true,
                    'projects' => $projects,
                    'lead_brand' => $lead_brand,
                    'project_status' => $project_status,
                    'lead_brand_option' => $lead_brand_option,
                    'status_cat_option' => $status_cat_option,

                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }


    public function show(Request $request){
//        dd($request->id);
        $projects = NewProject::with('lead_company', 'user','status_category')->find($request->id);
//        dd($projects);
        $lead_brand = LeadBrand::where('id',$projects->lead_brand_id)->first();
        $project_status = ProjectStatus::where('id',$projects->status_id)->first();


        $lead_brands = LeadBrand::all();
        $lead_brand_option = "";

        foreach ($lead_brands as $lead_brand) {

            if ($projects->lead_brand_id == $lead_brand->id) {
                $lead_brand_option .= "<option value='$lead_brand->id' selected> $lead_brand->lead_brand_name </option>";
            } else {
                $lead_brand_option .= "<option value='$lead_brand->id'> $lead_brand->lead_brand_name </option>";
            }
        }

        $status_cats = ProjectStatus::all();
        $status_cat_option = "";

        foreach ($status_cats as $status_cat) {

            if ($projects->status_category_id == $status_cat->id) {
                $status_cat_option .= "<option value='$status_cat->id' selected> $status_cat->name </option>";
            } else {
                $status_cat_option .= "<option value='$status_cat->id'> $status_cat->name </option>";
            }
        }

        return response()->json([
            'projects' => $projects,
            'lead_brand' => $lead_brand,
            'project_status' => $project_status,
            'lead_brand_option' => $lead_brand_option,
            'status_cat_option' => $status_cat_option,
        ]);


    }




}

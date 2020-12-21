<?php

namespace App\Http\Controllers;

use App\Company;
use App\LeadCompany;
use App\Projects;
use App\ProjectsCategory;
use App\ProjectsNature;
use App\ProjectsSubCategory;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //
    public function index()
    {

        $items = Projects::with( 'organizations', 'subcategories', 'categories')->get();
        $natures = ProjectsNature::all();
        $companies = LeadCompany::all();
        $subCategories = ProjectsSubCategory::all();
        $categories = ProjectsCategory::all();
        return view('admin.pages.projects', compact('items', 'natures', 'companies', 'subCategories', 'categories'));
    }


    public function destroy(Request $request)
    {
        $projects = Projects::find($request->id);
        $projects->delete();
        return response()->json($projects);
    }




    public function store(Request $request)
    {
        $companyId = $request->company_name;
        $categoryId = $request->cat_name;
        $subCatId = $request->sub_cat_name;
        $nature = $request->pro_nature_name;
        $frequency = $request->pro_frequency_name;
        $projectsName = $request->projects_name;

        $input = array();
        $input['company_id'] = $companyId;
        $input['project_category_id'] = $categoryId;
        $input['project_sub_category_id'] = $subCatId;
        $input['project_nature'] = $nature;
        $input['projects_name'] = $projectsName;
        $input['project_frequency'] = $frequency;


        $request->validate([
            'projects_name' => 'required|unique:projects|max:255',

        ]);


        $projects = Projects::create($input);
        $item = Projects::with('organizations','subcategories','categories')->find($projects->id);



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
        $projects = Projects::find($request->id);

        $projects->project_category_id = $request->cat_name;
        $projects->company_id = $request->company_name;
        $projects->project_sub_category_id = $request->sub_cat_name;
        $projects->project_nature = $request->pro_nature_name;
        $projects->project_frequency = $request->pro_frequency_name;
        $projects->projects_name = $request->projects_name;
        $request->validate([
            'projects_name' => 'required|unique:projects|max:255',

        ]);


        $projects->save();

        $item =  Projects::with('organizations','subcategories','categories')->find($projects->id);


        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update'
            ]);
        }


    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $projects = Projects::with('organizations','subcategories','categories')->find($request->id);
            return response()->json([
                'projects' => $projects,
            ]);
        } else {
            $projects = Projects::with('organizations','subcategories','categories')->find($request->id);
            $sub_categories = ProjectsSubCategory::all();
            $sub_category_option = "";

            foreach ($sub_categories as $sub_category) {

                if ($projects->project_sub_category_id == $sub_category->id) {
                    $sub_category_option .= "<option value='$sub_category->id' selected> $sub_category->projects_sub_category_name </option>";
                } else {
                    $sub_category_option .= "<option value='$sub_category->id'> $sub_category->projects_sub_category_name </option>";
                }
            }

            if ($projects) {
                return response()->json([
                    'success' => true,
                    'projects' => $projects,
                    'sub_category_option' => $sub_category_option,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }


    public function getSubCategory($id)
    {

        $subCategories = ProjectsSubCategory::where('project_category_id', $id)->get();

        return json_encode($subCategories);
    }









}

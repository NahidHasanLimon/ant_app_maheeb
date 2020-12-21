<?php

namespace App\Http\Controllers;

use App\ProjectsNature;
use Illuminate\Http\Request;

class ProjectsNatureController extends Controller
{
    //
    public function index()
    {
        $items = ProjectsNature::all();
        return view('admin.pages.projects_nature', compact('items'));
    }

    public function store(Request $request)
    {
        $pro_nature_name = $request->pro_nature_name;
        $input['project_nature_name'] = $pro_nature_name;
        $projects_nature = ProjectsNature::create($input);
        $item = ProjectsNature::find($projects_nature->id);

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Available'
            ]);
        }

    }

    public function destroy(Request $request)
    {
        $projects_nature = ProjectsNature::find($request->id);
        $projects_nature->delete();
        return response()->json($projects_nature);
    }
    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $projects_nature = ProjectsNature::find($request->id);
            return response()->json([
                'projects_nature' => $projects_nature,
            ]);
        } else {
            $projects_nature = ProjectsNature::find($request->id);


            if ($projects_nature) {
                return response()->json([
                    'success' => true,
                    'projects_nature' => $projects_nature,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Not Available'
                ]);
            }
        }
    }
    public function update(Request $request)
    {
        $projects_nature = ProjectsNature::find($request->id);
        $projects_nature->project_nature_name = $request->pro_nature_name;


        $projects_nature->save();
        $item = ProjectsNature::find($projects_nature->id);

        if ($item) {
            return response()->json([
                'success' => true,
                'item' => $item
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Not Available'
            ]);
        }
    }



}

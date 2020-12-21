<?php

namespace App\Http\Controllers;

use App\Company;
use File;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //

    public function index()
    {


        $items = Company::all();
        return view('admin.pages.add_company', compact('items'));
    }

    public function store(Request $request)
    {
        $input = array();
        $cmpName = $request->company_name;
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
//                $destinationPath = public_path('/backend/img/theme/light');
                $destinationPath = 'backend/img/company_photo/';
                $file->move($destinationPath, $name);
                //$inputs = $request->all();
                $input['company_logo'] = $name;
            }
        }
        $input['company_name'] = $cmpName;


        $company = Company::create($input);
        $item = Company::find($company->id);



        $table = "";

        $rows = Company::get();

        foreach ($rows as $row){
            $table .= "<tr class=\"unqcompany$row->id\">";
            $table .= "<td>";
            $table .= "<img class='rounded-circle' style='height: 50px;width: 50px' src='/backend/img/company_photo/$row->company_logo'>";
            $table .= "</td>";
            $table .= "<td>$row->company_name</td>";

            $table .= "<td>";
//                $table .= "<button>";
            $table .= "  <button type=\"button\"
                            class=\"btn edit_btn editcompany commonbtn\"
                            data-id=\"$row->id\" data-toggle=\"modal\"
                            data-target=\"#exampleModal\">
                            <i class=\"fa fa-pencil\"></i> 
                            </button>";
            $table .= "  <button type=\"button\" 
                            data-id='$row->id'
                            class=\"btn delete_btn deletecompany commonbtn\">
                           <i class=\"fa fa-trash\"></i>   
                            </button>";
            $table .= "</td>";
            $table .= "</tr>";
            $table .= "";

        }

        if ($item) {
            return response()->json([
                'success' => true,
                "company" => $company,
                "item" => $item,
                "table" => $table,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }

    }


    public function destroy(Request $request)
    {
        $company = Company::find($request->id);
//        dd($company);
//        unlink(public_path('/backend/img/company_photo/') . $company->company_logo);

        $company->delete();
        return response()->json($company);
    }


    public function detail(Request $request)
    {
        if ($request->type == 'show') {
            // $department =  Department::find($request->id);
            $company = Company::find($request->id);
            return response()->json([
                'company' => $company,
            ]);
        } else {
            $company = Company::find($request->id);

            return response()->json([
                'company' => $company,

            ]);
        }
    }

    public function update(Request $request)
    {
        $company = Company::find($request->id);
        $company->company_name = $request->company_name;

//        dd($company);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $destinationPath = 'backend/img/company_photo/';
                $file->move($destinationPath, $name);
                //$inputs = $request->all();
                $company->company_logo = $name;
            }
        }


        $company->save();
        $item = Company::find($company->id);
        $image = "";
//        $image .= '<img src="/backend/img/theme/light/'.$item->company_logo.'" style="height: 50px; width: 50px;" />';
        $temp = $item->company_logo;
        $image .= "<img src='/backend/img/theme/light/$temp' />";
        $rows = Company::get();
        $table="";
        foreach ($rows as $row){
            $table .= "<tr class=\"unqcompany$row->id\">";
            $table .= "<td>";
            $table .= "<img class='rounded-circle' style='height: 50px;width: 50px' src='/backend/img/company_photo/$row->company_logo'>";
            $table .= "</td>";
            $table .= "<td>$row->company_name</td>";

            $table .= "<td>";
//                $table .= "<button>";
            $table .= "<button type=\"button\"
                            class=\"btn edit_btn editcompany commonbtn\"
                            data-id=\"$row->id\" data-toggle=\"modal\"
                            data-target=\"#exampleModal\">
                           <i class=\"fa fa-pencil\"></i> 
                            </button>";
            $table .= "  <button type=\"button\" 
                            data-id='$row->id'
                            class=\"btn delete_btn deletecompany commonbtn\">
                            <i class=\"fa fa-trash\"></i>
                            </button>";
            $table .= "</td>";
            $table .= "</tr>";
            $table .= "";

        }


        if ($item) {
            return response()->json([
                'success' => true,
                "item" => $item,
                "image" => $image,
                "table" => $table,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }


}

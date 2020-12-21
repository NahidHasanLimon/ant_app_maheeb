<?php

namespace App\Http\Controllers;

use App\Posting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FireEmployeeController extends Controller
{
    //
    public function index()
    {
        $items = Posting::with('users', 'designations')->whereNull('end_date')->select('user_id')->distinct()->get();

        $users = User::pluck('id');
        $countUser = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');

        $myEmployee = Posting::all();
        $left = "";
        if ($myEmployee->isNotEmpty()) {
            if ($countUser <= 0) {

//                $left = 1;
                $left = "";
            } else {
                $left = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');
            }
        }

        return view('admin.pages.fire_employee', compact('items', 'left'));
    }

    public function detail(Request $request)
    {
        $user_id = $request->id;


    }

    public function update(Request $request)
    {

        $user_id = $request->id;

        $postings = Posting::whereNull('end_date')->where('user_id', $user_id)->pluck('id');

//        dd($postings);
        $input = array();

        $count = (int)count($postings);

//        dd($count);
        $end_date = Carbon::now()->format('Y-m-d');
        for ($i = 0; $i < $count; $i++) {

            $input['end_date'] = $end_date;

            Posting::whereIn('id', $postings)->update($input);
        }
        $table = "";

        $userIds = Posting::whereNull('end_date')->pluck('user_id');

        $tableItems = User::whereIn('id', $userIds)->get();
        foreach ($tableItems as $user) {

            $table .= "<tr class=\"unqcompany$user->id\">";
            $table .= "<td>";
            $table .= "<img class='rounded-circle' style='height: 50px;width: 50px' src='/backend/img/user_photo/$user->photo'>";
            $table .= "</td>";
            $table .= "<td>$user->first_name $user->middle_name $user->last_name</td>";
            $table .= "<td>$user->mobile_number</td>";
            $table .= "<td>$user->email</td>";
            $table .= "<td>";
//                $table .= "<button>";
            $table .= "  <button type=\"button\"                               
                            class=\"btn btn-primary btn-round-lg btn-lg fire_btn fireemp commonbtn\"
                            data-id=\"$user->id\" data-toggle=\"modal\"
                            data-target=\"#exampleModal\">
                            Fire
                            </button>";
            $table .= "</td>";
            $table .= "</tr>";
            $table .= "";

        }
        $users = User::pluck('id');
//        dd($users);
        $countUser = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');


        $myEmployee = Posting::all();
        $left = "";
        if ($myEmployee->isNotEmpty()) {
            if ($countUser <= 0) {
                $row_left = 1;
//                $row_left = "";
                $left = "<a href=\"#\" id=\"left_employee\">
                            You Have <span class=\"d-block mb-2 \">no assigned employees</span> </a>";
            } else {
                $row_left = (int)Posting::whereIn('user_id', $users)->whereNull('end_date')->distinct('user_id')->count('user_id');

                $left = "  <a href=\"#\" id=\"left_employee\">
                            You Have total <span class=\"d-block mb-2 \">$row_left assigned employees</span> </a>";
            }
        }

        return response()->json([
            "success" => true,
            "table" => $table,
            "left" => $left,
        ]);


    }


}

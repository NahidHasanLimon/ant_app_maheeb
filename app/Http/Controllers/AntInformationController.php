<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AntInformationController extends Controller
{
    //
    public function index(){

        $user = User::with('user_information')->find(\Auth::user()->id);


//        dd($user);
        return view('ants.pages.ant_information',compact('user'));
    }

    public function edit(Request $request){

        $user = User::with('user_information')->find(\Auth::user()->id);
        // dd($user);
        return response()->json([
            'user'=>$user
        ]);


    }

}

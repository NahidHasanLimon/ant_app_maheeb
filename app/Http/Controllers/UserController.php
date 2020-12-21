<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function viewchange()
    {

        return view('admin.pages.change_password');
    }

    public function change(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'password_confirmation' => ['same:password'],

        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->password)]);
            $notification = array(
                'message' => 'Password Changed successfully!',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'The current Password Is not Matched!',
                'alert-type' => 'error'
            );
        }

        return Redirect()->back()->with($notification);

    }

    public function userProfile()
    {
        $user = User::with('user_information')->find(\Auth::user()->id);
        return view('admin.pages.user_profile',compact('user'));
    }


}

<?php

namespace App\Http\Controllers;

use App\ModelHasRoles;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class ProvidePermissionController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        $roles = Roles::all();
        $items = ModelHasRoles::with('roles', 'users')->get();


        return view('admin.pages.provide_permission', compact('users', 'roles', 'items'));
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $role_id = ModelHasRoles::where('model_id',$user->id)->first();

//        dd($user,$role_id);
        $role_delete = ($role_id->role_id == 1) ? $user->removeRole('Super-Admin') : $user->removeRole('Admin');
//        dd($role_delete);
        return response()->json($role_delete);
    }



    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $subDept = ModelHasRoles::find($request->id);
            return response()->json([
                'subDept' => $subDept,
            ]);
        } else {

            $employee_id = User::find($request->id);
            $role_id = ModelHasRoles::where('model_id',$request->id)->first();
//            dd($role_id);
            $role_name = Roles::where('id',$role_id->role_id)->first();


            }

//            dd($user_dropdown);
            return response()->json([

                'employee_id' => $employee_id,
                'role_name' => $role_name,

            ]);
        }


    public function store(Request $request)
    {
        $role_id = $request->user_name;
        $role_name = $request->role_name;

        $user = User::find($role_id);

        $model_has_roles = ($role_name == 1) ? $user->assignRole('Super-Admin') : $user->assignRole('Admin');

        $item =  ModelHasRoles::with('roles', 'users')->where('model_id',$user->id)->first();

//        dd($item);
        if ($model_has_roles) {
            return response()->json([
                'success' => true,
//                "department" => $department,
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
//        $subDepartment = ModelHasRoles::where('model_id',$request->id)->first();
//        $user = User::find($request->id);
        $role_id = $request->user_name;
        $role_name = $request->role_name;
        $user = User::find($role_id);
        $model_has_roles = ($role_name == 1) ? $user->syncRoles('Super-Admin') : $user->syncRoles('Admin');


//        if($model_has_roles){
//            ModelHasRoles::where('model_id',$role_id)->save();
//        }

        $item =  ModelHasRoles::with('roles', 'users')->where('model_id',$user->id)->first();


        if ($model_has_roles) {
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

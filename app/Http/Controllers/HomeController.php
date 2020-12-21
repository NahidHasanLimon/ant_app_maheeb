<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request->user()->hasAnyRole(['Super-Admin', 'admin']));
        if ($request->user()->hasAnyRole(['Super-Admin', 'Admin'])) {
        // return view('layouts.partials.theme-content');
        return redirect()->route('admin.dasboard');
            
        }
        return redirect()->route('ant.dashboard');
    }
}

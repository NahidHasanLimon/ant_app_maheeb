<?php

namespace App\Http\Controllers;

use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index(){
        $statuses = [0=>"Unpaid", 1=>"Paid"];
        $items = Subscription::all();
        return view('admin.pages.add_subscription',compact('items','statuses'));
    }

    public function destroy(Request $request)
    {
        $dept = Subscription::find($request->id);


        $dept->delete();
        return response()->json($dept);
    }

    public function detail(Request $request)
    {
        if ($request->type == 'show') {

            $dept = Subscription::find($request->id);
            return response()->json([
                'dept' => $dept,
            ]);
        } else {
            $dept = Subscription::find($request->id);

            return response()->json([
                'dept' => $dept,
            ]);
        }
    }



    public function store(Request $request){
        $acName = $request->acName;
        $emailName = $request->emailName;
        $passName = $request->passName;
        $statusName = $request->statusName;
        $moduleName = $request->moduleName;
        $amountName = $request->amountName;
        $start = $request->start_date;
        $end = $request->end_date;

        $start_date = Carbon::parse($start)->format('Y-m-d');
        $end_date = Carbon::parse($end)->format('Y-m-d');

        $input = array();

        $input['account_name'] = $acName;
        $input['account_email'] = $emailName;
        $input['account_password'] = $passName;
        $input['payment_status'] = $statusName;
        $input['module'] = $moduleName;
        $input['amount'] = $amountName;
        $input['start_date'] = $start_date;
        $input['end_date'] = $end_date;

        $department = Subscription::create($input);
        $item = Subscription::find($department->id);




        if ($item) {
            return response()->json([
                'success' => true,
                "department"=>$department,
                "item"=>$item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }


    public function update(Request $request){
        $dept =  Subscription::find($request->id);
        $dept->account_name = $request->acName;
        $dept->account_email = $request->emailName;
        $dept->account_password = $request->passName;
        $dept->payment_status = $request->statusName;
        $dept->module = $request->moduleName;
        $dept->amount = $request->amountName;

        $start = $request->start_date;
        $end = $request->end_date;

        $dept->start_date = Carbon::parse($start)->format('Y-m-d');
        $dept->end_date = Carbon::parse($end)->format('Y-m-d');




        $dept->save();
        $item = Subscription::find($dept->id);



        if ($item) {
            return response()->json([
                'success' => true,
                "item"=>$item,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store'
            ]);
        }



    }

    public function show(Request $request){
        $dept = Subscription::find($request->id);
        return response()->json([
            'dept'=>$dept
        ]);


    }

    public function myTest(Request $request){

        $data = "";

        $items = Subscription::all();

        foreach ($items as $item) {
            $data .= "<h1>$item->account_name</h1>";

        }

        return response()->json([
           "data"=>$data
        ]);


    }


}

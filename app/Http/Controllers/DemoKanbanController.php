<?php

namespace App\Http\Controllers;

use App\BlackList;
use App\ToDo;
use Illuminate\Http\Request;

class DemoKanbanController extends Controller
{
    //
    public function index()
    {

        $lists = BlackList::where('status', 0)->get();

        $todos = BlackList::where('status', 1)->get();
        return view('admin.pages.my-test-kanban', compact('lists', 'todos'));
    }


    public function kanbanLoad(Request $request)
    {

        $lists = BlackList::where('status', 0)->get();
        $items = "";
        $toDoItems = "";

        foreach ($lists as $list) {

            $items .= " <div id='$list->id' class=\"card card-progress draggable-item border shadow-none\">";
            $items .= "<div class=\"card-body\">";
            $items .= "<div class=\"row align-items-center mb-2\">";
            $items .= "<div class=\"col-6\">";
            $items .= "<span class=\"badge badge-pill badge-xs badge-success\">$list->label</span>";
            $items .= "</div>";
            $items .= "<div class=\"col-6 text-right\">";
            $items .= "<span class=\"text-sm\">70%</span>";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "<a class=\"h6\" href=\"#modal-task-view\" data-toggle=\"modal\">$list->title</a>";
            $items .= "<div class=\"row align-items-center\">";
            $items .= " <div class=\"col-8\">";
            $items .= "<div class=\"actions d-inline-block\">";
            $items .= "<div class=\"action-item mr-2\">";
            $items .= "<i class=\"fas fa-paperclip mr-2\"></i>4";
            $items .= "</div>";
            $items .= "<div class=\"action-item mr-3\">";
            $items .= "<i class=\"fas fa-comment-alt mr-2\"></i>6";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "<div class=\"col-4 text-right\">";
            $items .= "<a href=\"#\" class=\"avatar avatar-sm rounded-circle m-0 kanban_avatar\">";
            $items .= "<img alt=\"Image placeholder\" src=\"https://i.pravatar.cc/800*800\">";
            $items .= "</a>";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "</div>";
            $items .= "";


        }


        $toDos = BlackList::where('status', 1)->get();

        foreach ($toDos as $todo) {
            $toDoItems .= "<div id='$todo->id' class=\"card card-progress draggable-item border shadow-none\">";
            $toDoItems .= "<div class=\"card-body\">";
            $toDoItems .= "<div class=\"row align-items-center mb-2\">";
            $toDoItems .= "<div class=\"col-6\">";
            $toDoItems .= "<span class=\"badge badge-pill badge-xs badge-success\">$todo->label</span>";
            $toDoItems .= "</div>";
            $toDoItems .= "<div class=\"col-6 text-right\">";
            $toDoItems .= "<span class=\"text-sm\">70%</span>";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "<a class=\"h6\" href=\"#modal-task-view\" data-toggle=\"modal\">$todo->title</a>";
            $toDoItems .= "<div class=\"row align-items-center\">";
            $toDoItems .= " <div class=\"col-8\">";
            $toDoItems .= "<div class=\"actions d-inline-block\">";
            $toDoItems .= "<div class=\"action-item mr-2\">";
            $toDoItems .= "<i class=\"fas fa-paperclip mr-2\"></i>4";
            $toDoItems .= "</div>";
            $toDoItems .= "<div class=\"action-item mr-3\">";
            $toDoItems .= "<i class=\"fas fa-comment-alt mr-2\"></i>6";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "<div class=\"col-4 text-right\">";
            $toDoItems .= "<a href=\"#\" class=\"avatar avatar-sm rounded-circle m-0 kanban_avatar\">";
            $toDoItems .= "<img alt=\"Image placeholder\" src=\"https://i.pravatar.cc/800*800\">";
            $toDoItems .= "</a>";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "</div>";
            $toDoItems .= "";


        }

        return response()->json([
            "items" => $items,
            "lists" => $lists,
            "toDoItems" => $toDoItems
        ]);


    }

    public function updateOrder(Request $request)
    {

        $id = $request->ids;

        $data = BlackList::find($id);

        if ($data->status == 1) {
            $data->status = 0;
        } else {
            $data->status = 1;
        }


        $data->save();
        return response()->json([

            "id" => $id,
            "data" => $data
        ]);
    }

    public function store(Request $request)
    {
        $input = array();
        $label = $request->blLabel;
        $title = $request->blTitle;
        $input['label'] = $label;
        $input['title'] = $title;

        if ($request->has('blackList')) {
            $status = "0";

        } else {
            $status = "1";

        }

        $input['status'] = $status;

        $blackList = BlackList::create($input);


        return response()->json([
            "blackList" => $blackList,


        ]);


    }

}

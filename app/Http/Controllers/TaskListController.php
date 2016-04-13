<?php

namespace App\Http\Controllers;


use Auth;
use App\Http\Requests;
use App\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{

    public static function create() {
        return view('taskList/create');
    }


    public static function save(Request $request) {
        $taskList = new TaskList([
            'user_id' => Auth::User()->id,
            'name' => $request['name'],
            'description' => $request['description']
        ]);
        $taskList->save();

        return redirect()->action('HomeController@index');
    }

}

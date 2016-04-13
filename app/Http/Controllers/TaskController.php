<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
    public static function index() {

    }

    public static function edit() {

    }

    public static function create($task_list_id) {
        return view('task/create', ['task_list_id' => $task_list_id]);
    }

    public static function save(Request $request) {
        $statusInt = Task::STATUS_OPEN;

        switch($request['status']) {
            case 'TODO':
                $statusInt = Task::STATUS_OPEN;
                break;
            case 'In Progress':
                $statusInt = Task::STATUS_IN_PROGRESS;
                break;
            case 'Completed':
                $statusInt = Task::STATUS_COMPLETE;
                break;
        }

        $task = new Task([
            'user_id' => Auth::User()->id,
            'status' => $statusInt,
            'description' => $request['description']
        ]);
        $task->save();

        $task->taskLists()->attach($request['task_list_id']);

        return redirect()->action('HomeController@index');
    }

    public static function delete($task_id) {
        $task = Task::where('id', $task_id)->first();
        $task->delete();

        return redirect()->action('HomeController@index');
    }
}

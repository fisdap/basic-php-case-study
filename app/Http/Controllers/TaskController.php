<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\TaskGroup;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$tasks = DB::table('tasks')-
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
         *  Validate $request Data
         *  https://laravel.com/docs/5.0/validation
         */

        /*
         * Adding Tasks
         */
        
        $task = new Task;
        $task->task_title           = $request->input('task_name');
        $task->task_description     = $request->input('task_description');
        $task->group_tasks_id       = $request->input('task_group') ? : 1;
        $task->save();

        $task_gruop = TaskGroup::where('id', $task->group_tasks_id)->select('color')->first();

        $task->color = $task_gruop->color;

        return response()->json($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $type
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        $tasks = Task::where('status_id', $type)
                        ->join('task_groups', 'tasks.group_tasks_id', '=', 'task_groups.id')
                        ->where('is_deleted', '0')
                        ->select('task_title', 'task_description', 'group_tasks_id', 'task_groups.color', 'status_id', 'tasks.id')
                        ->get();

        return response()->json($tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if($request->input('type') == 'change_status')
        {
            $task->status_id = $request->input('direction');
            $task->save();
        }
        else
        {
            $task->task_title           = $request->input('task_name');
            $task->task_description     = $request->input('task_description');
            $task->group_tasks_id       = $request->input('task_group') ? : 1;
            $task->save();
        }

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->is_deleted = 1;
        $task->save();

        return response()->json('Deleted');
    }
}

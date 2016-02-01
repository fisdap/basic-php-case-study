<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
    /**
     * Task Manager Dashboard With The Tasks View Created In Descending Order
    */
	public function displayTask()
    {
		$tasks	=	Task::orderBy('id', 'desc')->get();
		return view('tasks', [
             'tasks' => $tasks
        ]);
    }
	
	/**
     * Individual Task View Layout
    */
	public function viewLayout($id)
    {
        $tasks	=	Task::where('id', $id)->get();
        return view('views', [
             'tasks' => $tasks
        ]);
    }
	
	/**
     * Add Task Layout
    */
    public function addLayout()
    {
    	return view('add');
    }
    
	/**
     * To Create A New Task
    */
    public function addTask(Request $request)
    {
		// To validate the form fields
        $this->validate($request, [
        'name' => 'required|max:100', 'assigned' => 'required', 'description' => 'required',
        ]);

        $task	=	new Task;
		$task->task_name   	=	$request->name;
		$task->task_status	=	$request->status;
		
		// The task assigned to the persons selected are added with ',' separated
		if(count($request->assigned > 0))
			$task->task_assigned    =   implode(", ",$request->assigned);
		else
			$task->task_assigned    =   $request->assigned;
		
		$task->task_description		=	$request->description;
		$task->save();		
		return redirect('/');
    }
	
	/**
     * Edit Task Layout
    */
    public function editLayout($id)
    {
    	$tasks	=	Task::where('id', $id)->get();
        return view('edit', [
             'tasks' => $tasks
        ]);
    }

	/**
     * To Update An Existing Task
    */
    public function updateTask(Request $request)
    {
		// To validate the form fields
        $this->validate($request, [
        'name' => 'required|max:100', 'assigned' => 'required', 'description' => 'required',
        ]);
        
        $task = Task::find($request->id);		
		$task->task_name  	=	$request->name;
		$task->task_status	=	$request->status;
		
		if(count($request->assigned > 0))
			$task->task_assigned    =   implode(", ",$request->assigned);
		else
			$task->task_assigned    =   $request->assigned;
			
		$task->task_description		=	$request->description;		
		$task->updated_at   =   date("Y-m-d h:i:s");	// Updated at time		
		$task->save();		
		return redirect('/');
    }

    /**
     * To Delete A Task
    */
	public function deleteTask(Task $task)
    {
    	$task->delete();
        return redirect('/');
    }
}

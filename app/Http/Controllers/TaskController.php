<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use Auth;

class TaskController extends Controller
{
    /**
     * Returns array of all of the authenticated users tasks in order of newest first
     */
    public function tasks() {

      $user = Auth::user();

      $tasks = [];

      foreach ($user->tasks as $task) {
        $temp = $task->toArray();
        $temp['series'] = $task->series->name;
        $tasks[] = $temp;
      }

      return response()->json(array_reverse($tasks));
    }

    /**
     * Expects 'name', 'state' to be in Request
     * optional params are 'description'
     *
     * Returns errors if errors are present in request data
     */
    public function create(Request $request) {
      $user = Auth::user();

      $errors = [];

      if (empty($request->name)) {
        $errors[] = 'Name is required';
      }

      if (empty($request->state)) {
        $errors[] = 'State is required';
      }

      if (!empty($errors)) {
        return response()->json([
          'status' => 'error',
          'message' => 'Form errors',
          'errors' => $errors
        ]);
      }

      Task::create([
        'name' => $request->name,
        'description' => $request->description,
        'state' => $request->state,
        'user_id' => $user->id,
        'series_id' => $request->series_id
      ]);

      return response()->json([
        'status' => 'success',
        'message' => 'Task created'
      ]);
    }

    /**
     * Deletes the task based on the passed ID
     * Checks to make sure the user owns the task first
     */
    public function delete(Request $request) {
      $user = Auth::user();

      // Double check that the auth user owns the task
      if ($user->tasks->contains($request->task_id)) {
        Task::destroy($request->task_id);

        return response()->json([
          'status' => 'success',
          'message' => 'Task deleted'
        ]);
      } else {
        abort(403);
      }
    }

    /**
     * Updates the state of the task
     * Expects params of task_id and state
     */
    public function updateState(Request $request) {
      $user = Auth::user();

      // Double check that the auth user owns the task
      if ($user->tasks->contains($request->task_id)) {
        $task = Task::findOrFail($request->task_id);

        $task->state = $request->state;
        $task->save();

        return response()->json([
          'status' => 'success',
          'message' => 'Task state changed'
        ]);
      } else {
        abort(403);
      }
    }
}

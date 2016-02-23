<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use Auth;

class TaskController extends Controller
{
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

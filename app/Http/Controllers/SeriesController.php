<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Series;
use App\Task;

class SeriesController extends Controller
{
    /**
     * Returns an array sorted by newest first of series + their tasks
     */
    public function series() {
      $user = Auth::user();

      $series = [];
      foreach ($user->series as $item) {
        $temp = $item->toArray();
        $temp['tasks'] = $item->tasks->reverse();
        $series[] = $temp;
      }

      return response()->json(array_reverse($series), 200);
    }

    /**
     * Expects a name as a parameter
     * Creates series attached to user logged in
     */
    public function create(Request $request) {
      $user = Auth::user();

      $errors = [];

      if (empty($request->name)) {
        $errors[] = 'You must provide a name';
      }

      if (!empty($errors)) {
        return response()->json([
          'status' => 'error',
          'message' => 'Form errors',
          'errors' => $errors
        ]);
      }

      Series::create([
        'name' => $request->name,
        'user_id' => $user->id
      ]);

      return response()->json([
        'status' => 'success',
        'message' => 'Series created'
      ]);
    }

    /**
     * Expects a series_id param
     * Deletes all tasks associated with the series
     * Deletes the series
     */
    public function delete(Request $request) {
      $user = Auth::user();

      // Double check that the auth user owns the task
      if ($user->series->contains($request->series_id)) {
        Task::where('series_id', $request->series_id)->delete();
        Series::destroy($request->series_id);

        return response()->json([
          'status' => 'success',
          'message' => 'Series deleted'
        ]);
      } else {
        abort(403);
      }
    }
}

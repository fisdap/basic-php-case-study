<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class SeriesController extends Controller
{
    public function series() {
      $user = Auth::user();

      $series = $user->series;

      return response()->json($series, 200);
    }
}

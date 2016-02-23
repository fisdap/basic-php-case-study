<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'guest'], function() {
  Route::get('/', function () {
      return view('index');
  });

  Route::get('/auth/login', 'Auth\AuthController@getLogin');
  Route::get('/auth/register', 'Auth\AuthController@getRegister');
});

Route::get('/logout', 'Auth\AuthController@getLogout');

Route::group(['prefix' => 'api/v1', 'middleware' => 'guest'], function() {
  Route::post('/login', 'Auth\AuthController@handleLogin');
  Route::post('/register', 'Auth\AuthController@handleRegister');
});


Route::group(['middleware' => 'auth'], function() {
  Route::get('/dashboard', 'PagesController@getDashboard');
});


Route::group(['prefix' => 'api/v1/series', 'middleware' => 'auth'], function() {
  Route::get('/', 'SeriesController@series');
  Route::post('/new', 'SeriesController@create');
  Route::post('/delete', 'SeriesController@delete');
});

Route::group(['prefix' => 'api/v1/tasks', 'middleware' => 'auth'], function() {
  Route::get('/', 'TaskController@tasks');
  Route::post('/new', 'TaskController@create');
  Route::post('/delete', 'TaskController@delete');
  Route::post('/state', 'TaskController@updateState');
});

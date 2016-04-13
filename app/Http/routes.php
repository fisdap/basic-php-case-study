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


Route::get('/', 'HomeController@index');


Route::get('/create-task-list', [
    'uses' => 'TaskListController@create',
    'as' => 'taskList.create'
]);
Route::post('/create-task-list', [
    'uses' => 'TaskListController@save',
    'as' => 'taskList.save'
]);


Route::get('/create-task/{task_list_id}', [
    'uses' => 'TaskController@create',
    'as' => 'task.create'
]);
Route::post('/create-task', [
    'uses' => 'TaskController@save',
    'as' => 'task.save'
]);


Route::get('/delete-task/{task_id}', [
    'uses' => 'TaskController@delete',
    'as' => 'task.delete'
]);

Route::auth();


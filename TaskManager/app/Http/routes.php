<?php

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => 'web'], function (){

	/**
	* Task Manager Dashboard With The Tasks View Created In Descending Order
	*/
	Route::get('/', 'TaskController@displayTask');
	
	/**
	* Individual Task View Layout
	*/
	Route::get('/views/{id}', 'TaskController@viewLayout');
	
	/**
	* Add Task Layout
	*/
	Route::get('/add', 'TaskController@addLayout');
	
	/**
	* To Create A New Task
	*/	
	Route::post('/task', 'TaskController@addTask');
	
	/**
	* Edit Task Layout
	*/
	Route::get('/edit/{id}', 'TaskController@editLayout');
	
	/**
	* To Edit & Update An Existing Task
	*/
	Route::post('/edit/{id}', 'TaskController@updateTask');
	
	/**
	* To Delete A Task
	*/
	Route::delete('/task/{task}', 'TaskController@deleteTask');
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// route task model
Route::model('task', 'Task');

// routing - gets
Route::get('/', 'TasksController@index');
Route::get('/new', 'TasksController@create');
Route::get('/edit/{task}', 'TasksController@edit');
Route::get('/delete/{task}', 'TasksController@delete');

// routing - posts (form submissions)
Route::post('/new', 'TasksController@handleCreate');
Route::post('/edit', 'TasksController@handleEdit');
Route::post('/delete', 'TasksController@handleDelete');


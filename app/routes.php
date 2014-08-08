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


// Home controller
Route::get('/signup', 'HomeController@signup');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');

// routing - gets
Route::get('/', 'TasksController@index');
Route::get('/edit/{task}', 'TasksController@edit');
Route::get('/delete/{task}', 'TasksController@delete');

Route::get('/alltasks', 'TasksController@alltasks');
Route::get('/completed', 'TasksController@completed');

// routing - posts (form submissions)
Route::post('/create', 'TasksController@handleCreate');
Route::post('/edit', 'TasksController@handleEdit');

Route::delete('/delete/{task}', 'TasksController@delete');


// Home Controller Posts
Route::post('/signup', 'HomeController@handlesignup');
Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);

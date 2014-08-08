<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    public function logout()
    {
        # Log out
        Auth::logout();

        # Send them to the homepage
        return Redirect::to('/');
    }

    public function login()
    {
        // Show the login task form.
        return View::make('login');
    }

    public function handlelogin()
    {
        // Show the login task form.
        return View::make('login');
    }


    public function signup()
    {
        // Show the signup task form.
        return View::make('signup');

    }

	public function handlesignup()
    {
        // Show the edit task form.
        $user = new User;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->email    = Input::get('email');

        # Try to add the user 
        try {
            $user->save();
        }
        # Fail
        catch (Exception $e) {
            return Redirect::to('/signup')->with('flash_message', $e . 'Sign up failed; please try again.')->withInput();
        }

        # Log the user in
        Auth::login($user);

        return Redirect::to('index')->with('flash_message', 'Welcome to Foobooks!');
    }



}

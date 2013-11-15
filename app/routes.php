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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('crawl/login', function(){
	return View::make('login');
});

Route::post('crawl/login', function(){
	$userdata = [
		'username' => Input::get('username'),
		'password' => Input::get('password')
	];

	if(Auth::attempt($userdata))
	{
		return Redirect::to('crawl');
	}
	else
	{
		return Redirect::to('crawl/login')
				->with('login_errors', true);
	}
});

Route::get('crawl', array('before'=>'auth', 
	function(){
		return Redirect::to('home');
	}
));

//Route::when('admin/*','auth');
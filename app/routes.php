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

Route::post('crawl/login', [
	'uses' => 'AuthController@login', 
	'before' => 'attempt'
]);

Route::get('crawl/logout', [
	'uses' => 'AuthController@logout',
	'before' => 'auth'
]);

Route::get('crawl', [
	'before'=>'auth', 
	function()
	{
		return View::make('pages');
	}
]);

Route::get('crawl/paginas', [
	'before'=>'auth',
	function()
	{
		return View::make('pages');
	}
]);

Route::get('crawl/perfil', [
	'before'=>'auth',
	function()
	{
		return View::make('perfil');
	}
]);
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



Route::group(['prefix' => 'crawl'], function(){
	
	/*
	|---------------------------------------------------------------------------
	| Section for Login, calling AuthController
	|---------------------------------------------------------------------------
	*/
	Route::get('login', 'AuthController@showLogin');

	Route::post('login', [
		'uses' => 'AuthController@login', 
		'before' => 'attempt'
	]);

	Route::get('logout', [
		'uses' => 'AuthController@logout',
		'before' => 'auth'
	]);



	Route::get('/', [
		'before'=>'auth', 
		function()
		{
			return "Esto es el home";
		}
	]);

	/*
	|---------------------------------------------------------------------------
	| Section for operations in Pages, calling PagesController
	|---------------------------------------------------------------------------
	*/

	Route::get('paginas', [
		'uses' => 'PagesController@index',
		'before' => 'auth'
	]);

	Route::get('paginas/del/{id}', [
		'uses' => 'PagesController@deletePage',
		'before' => 'auth'
	]);

	Route::post('paginas/update', [
		'uses' => 'PagesController@updatePage',
		'before' => 'auth|csrf'
	]);

	Route::get('paginas/new', [
		'uses' => 'PagesController@showNewPage',
		'before' => 'auth'
	]);

	Route::post('paginas/new', [
		'uses' => 'PagesController@newPage',
		'before' => 'auth|csrf'
	]);

	Route::get('paginas/edit/{id}', [
		'uses' => 'PagesController@showEditPage',
		'before' => 'auth'
	]);

	Route::post('paginas/edit/', [
		'uses' => 'PagesController@editPage',
		'before'=> 'auth|csrf'
	]);


	/*
	|---------------------------------------------------------------------------
	| Section for operations in Profile, calling ProfileController
	|---------------------------------------------------------------------------
	*/

	Route::get('perfil', [
		'uses' 	 => 'ProfileController@index',
		'before' =>'auth'
	]);

	Route::post('perfil/update', [
		'uses' 	 => 'ProfileController@update',
		'before' => 'auth'
	]);



	/*
	|---------------------------------------------------------------------------
	| Section for operations in Configure, calling ConfigureController
	|---------------------------------------------------------------------------
	*/

	Route::get('configuracion', [
		'before' =>'auth',
		function(){
			$paginas = DB::table('pages')->where('status','=',true)->get();
			return View::make('configure')->with(['pagesLoad'=>$paginas]);
		}]);

	Route::post('configuracion/save', [
		'before' => 'auth',
		'uses' => 'ConfigController@saveConfig',
		]);


});

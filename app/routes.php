<?php
//For testing
// Display all SQL executed in Eloquent
/*Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
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
		'uses' => 'ConfigController@showConfig',
		'before' => 'auth'
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
		'uses' 	 => 'UserController@index',
		'before' =>'auth'
	]);

	Route::post('perfil/update', [
		'uses' 	 => 'UserController@update',
		'before' => 'auth'
	]);

	/*
	|---------------------------------------------------------------------------
	| Section for operations in Configure, calling ConfigureController
	|---------------------------------------------------------------------------
	*/

	Route::get('configuracion', [
		'uses' => 'ConfigController@showConfig',
		'before' => 'auth'
	]);

	Route::post('configuracion/save', [
		'uses' => 'ConfigController@saveConfig',
		'before' => 'auth|csrf'
	]);

	/*
	|---------------------------------------------------------------------------
	| Section for operations in Users, calling UsersController
	|---------------------------------------------------------------------------
	*/

	Route::get('usuarios', [
		'uses' => 'UserController@showlist',
		'before' => 'auth'
	]);

	Route::get('usuarios/new', [
		'uses' => 'UserController@newUser',
		'before' => 'auth'
	]);

	Route::post('usuarios/create', [
		'uses' => 'UserController@create',
		'before' => 'auth|csrf'
	]);

	Route::get('usuarios/del/{id}', [
		'uses' => 'UserController@delete',
		'before' => 'auth'
	]);

});

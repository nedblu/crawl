<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		return View::make('users')->with('users',$users);
	}

	public function showNew()
	{
		return View::make('newUser');	
	}

	public function create()
	{
		$data = Input::all();
		var_dump($data);
	}

}
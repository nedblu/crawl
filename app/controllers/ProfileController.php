<?php

class ProfileController extends \BaseController {

	public function index()
	{
		$id_user = Auth::user()->id;

		$user_data = User::find($id_user);

		return View::make('perfil', $user_data);

	}

	public function update()
	{
		$data_update = 
		[
			$name = Input::get('nombre');
		]
	}

}
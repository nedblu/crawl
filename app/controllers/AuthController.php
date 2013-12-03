<?php

class AuthController extends BaseController {

	public function showLogin()
	{
		if(Auth::check())
		{
			return Redirect::to('crawl');
		}
		else
		{
			return View::make('login');
		}
	}

	public function login()
	{

		$userdata = [
			'username' => Str::lower(trim(Input::get('username'))),
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

	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('crawl/login');	
	}

}
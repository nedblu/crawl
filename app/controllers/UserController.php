<?php

class UserController extends \BaseController {

	public function index()
	{
		$id_user = Auth::user()->id;

		$user_data = User::find($id_user);

		return View::make('perfil', $user_data);

	}

	public function update()
	{
		$flag_pic = false;
		$flag_pas = false;

		$update_data = Input::all();

		if(!empty($update_data['password']) && !empty($update_data['password_confirmation']))
		{
			
			$rules = [
				'password' => 'required|confirmed',
				'password_confirmation' => 'required'
			];
			$messages = [
				'confirmed' => '* Lo sentimos, pero tus contrseñas no coinciden.'
			];
			$validator = Validator::make($update_data, $rules, $messages);

			if($validator->passes())
				$flag_pas = true;
			else
				return Redirect::to('crawl/perfil')->withErrors($validator);
		}

		$path = 'public/assets/profile_imgs/';

		if( !file_exists($path) )
		{
			mkdir($path, 0700);
		}

		if( !empty($update_data['pic']) )
		{

			$destinationPath = $path;
			$fileName = Str::random($length = 16) . "." . $update_data['pic']->getClientOriginalExtension();
			$update_data['pic']->move($path, $fileName);
		
			$mythumb = new thumb();
			$mythumb->loadImage($path . $fileName);
			
			$mythumb->crop(100, 100);
			$mythumb->save($path . 'thumb100-' . $fileName);

			$mythumb->crop(48, 48);
			$mythumb->save($path . 'thumb48-' . $fileName);

			$flag_pic = true;
		}

		if(($flag_pas == true) && ($flag_pic == true))
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $update_data['nombre'],
				'email' => $update_data['email'],
				'password' => Hash::make($update_data['password']),
				'image' => $fileName 
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil');
		}
		elseif ($flag_pas == true) 
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $update_data['nombre'],
				'email' => $update_data['email'],
				'password' => Hash::make($update_data['password'])
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil'); 
		}
		elseif ($flag_pic == true)
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $update_data['nombre'],
				'email' => $update_data['email'],
				'image' => $fileName 
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil');
		}
		else
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $update_data['nombre'],
				'email' => $update_data['email']
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil');
		}
	}

	public function showlist()
	{

		$users = User::all();

		return View::make('users')->with('users',$users);
	}

	public function newUser()
	{

		return View::make('newUser');	
	}

	public function create()
	{
		$data = Input::all();

		$rules = [
			'fullname' => 'required',
			'username' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',
			'email' => 'email',
			'userlevel' => 'required|min:1|max:3'
		];

		$validator = Validator::make($data, $rules);

		if($validator->passes())
		{
			$user = new User;
			$user->fullname = $data['fullname'];
			$user->username = $data['username'];
			$

			$user->save();
			return Redirect::to('crawl/usuarios');
		}
		else
		{
			return Redirect::to('crawl/usuarios/new')->withErrors($validator);

		}
	}

}
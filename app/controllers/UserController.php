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
				'confirmed' => '<p class="errors"> Lo sentimos, pero tus contrseñas no coinciden.</p>'
			];
			$validator = Validator::make($update_data, $rules, $messages);

			if($validator->passes())
				$flag_pas = true;
			else
				return Redirect::to('crawl/perfil')->withErrors($validator);
		}

		$path = 'assets/profile_imgs/';

		if( !file_exists($path) )
		{
			mkdir($path, 0700);
		}

		if( Input::hasFile('pic') )
		{

			$destinationPath = $path;
			$fileName = Auth::user()->username . ".jpg";

			Image::make(Input::file('pic')->getRealPath())->grab(100)->save($path . 'thumb100-' . $fileName, 100);
			Image::make(Input::file('pic')->getRealPath())->grab(48)->save($path . 'thumb48-' . $fileName, 100);

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
			'userlevel' => 'required|numeric|min:1|max:3'
		];

		$messages = [
			'required' => '<p class="errors">Este campo es requerido.</p>',
			'confirmed' => '<p class="errors"> Lo sentimos, pero tus contrseñas no coinciden.</p>',
			'min' => '<p class="errors">Debes elegir al menos un nivel de usuario.</p>'
		];

		$validator = Validator::make($data, $rules, $messages);

		if($validator->passes())
		{
			$user = new User;
			$user->fullname  = $data['fullname'];
			$user->username  = $data['username'];
			$user->password  = Hash::make($data['password']);
			$user->email 	 = $data['email'];
			$user->userlevel = $data['userlevel'];
			$user->image 	 = 'default.png';
			$user->save();
			return Redirect::to('crawl/usuarios');
		}
		else
		{
			return Redirect::to('crawl/usuarios/new')->withErrors($validator)->withInput();

		}
	}
	public function delete($id)
	{
		$user = User::find($id);

		$data = [
			'type' => $user->userlevel,
		];

		$rules = [
			'type' => 'numeric|min:2'
		];
		$messages = [
			'min' => '<p class="errors"><b>Advertencia:</b> No puedes eliminar al administrador principal.</p>' 
		];

		$validator = Validator::make($data, $rules, $messages);

		if( $validator->passes() )
		{
			$user->where('id',$id)->delete();
			return Redirect::to('crawl/usuarios');	
		}
		else
			return Redirect::to('crawl/usuarios')->withErrors($validator);
		
		
	}

}
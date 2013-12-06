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
		$flag_pic = false;
		$flag_pas = false;

		$data_update = [
			$name 	= Input::get('nombre'),
			$email 	= Input::get('email'),
			$pass	= Input::get('password'),
			$conf	= Input::get('confirm'),
			$pic 	= Input::file('pic')
		]; 
	
		$path = 'public/assets/profile_imgs/' . Auth::user()->username;

		if(!file_exists($path))
		{
			mkdir($path, 0700);
		}
		
		if(!empty($pic))
		{
			$destinationPath = $path . '/';
			$fileName = Auth::user()->username . "." . $pic->getClientOriginalExtension();
			$pic->move($destinationPath, $fileName);

			$mythumb = new thumb();
			$mythumb->loadImage($path . '/' . $fileName);
			
			$mythumb->crop(100, 100);
			$mythumb->save($path . '/' . 'thumb100-' . $fileName);

			$mythumb->crop(48, 48);
			$mythumb->save($path . '/'. 'thumb48-' . $fileName);

			$flag_pic = true;
		}
		

		if(!empty($pass) && !empty($conf) && ($pass == $conf))
		{
			$flag_pas = true;
		}

		if(($flag_pas == true) && ($flag_pic == true))
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $name,
				'email' => $email,
				'password' => Hash::make($pass),
				'image' => $fileName 
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil'); 
		}
		elseif ($flag_pas == true) 
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $name,
				'email' => $email,
				'password' => Hash::make($pass)
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil'); 
		}
		elseif ($flag_pic == true)
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $name,
				'email' => $email,
				'image' => $fileName 
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil'); 
		}
		else
		{
			$id = Auth::user()->id;
			$data = [
				'fullname' 	=> $name,
				'email' => $email
			];

			User::where('id', $id)->update($data);
			return Redirect::to('crawl/perfil');
		}
	}

}
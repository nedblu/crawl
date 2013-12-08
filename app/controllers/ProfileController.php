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

		$update_data = Input::all();
		
		$path = 'public/assets/profile_imgs/' . Auth::user()->username;

		if( !file_exists($path) )
		{
			mkdir($path, 0700);
		}
		
		if( !empty($update_data['pic']) )
		{
			$destinationPath = $path . '/';
			$fileName = Auth::user()->username . "." . $update_data['pic']->getClientOriginalExtension();
			$update_data['pic']->move($destinationPath, $fileName);
		
			$mythumb = new thumb();
			$mythumb->loadImage($path . '/' . $fileName);
			
			$mythumb->crop(100, 100);
			$mythumb->save($path . '/' . 'thumb100-' . $fileName);

			$mythumb->crop(48, 48);
			$mythumb->save($path . '/' . 'thumb48-' . $fileName);

			$flag_pic = true;
		}
		

		if(!empty($update_data['password']) && !empty($update_data['confirm']))
		{
			if($update_data['password'] == $update_data['confirm'])
				$flag_pas = true;
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

}
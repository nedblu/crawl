<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		$users = [
			['fullname'=>'admin','username'=>'admin','password'=>Hash::make('password'), 'email'=>'carlosaguilarnet@gmail.com', 'userlevel'=>1]
		];

		DB::table('users')->insert($users);
	}

}
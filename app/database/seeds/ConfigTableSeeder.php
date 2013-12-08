<?php

class ConfigTableSeeder extends Seeder {

	public function run()
	{
		$config = [
			[
				'description' => 'Sitio Web para la venta y suministro de gorditas sabrozonas :3'		
			]
		];

		DB::table('config')->insert($config);
	}

}
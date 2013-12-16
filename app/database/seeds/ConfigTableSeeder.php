<?php

class ConfigTableSeeder extends Seeder {

	public function run()
	{
		$config = [
			[
				'description' => 'copyright &copy; 2013. Crawl. Este es un sitio web creado usando Crawl.'		
			]
		];

		DB::table('config')->insert($config);
	}

}
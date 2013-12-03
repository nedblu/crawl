<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$pages = [
			[
				'name' => 'Inicio',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => true
			],
			[
				'name' => 'Inicio',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => false
			],
			[
				'name' => 'Inicio',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => true
			]
		];

		DB::table('pages')->insert($pages);
	}

}
<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$pages = [
			[
				'name' => 'Pagina1',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => true
			],
			[
				'name' => 'Pagina2',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => false
			],
			[
				'name' => 'Pagina3',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => true
			],
			[
				'name' => 'Pagina4',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => true
			],
			[
				'name' => 'Pagina5',
				'title' => 'Inicio',
				'keywords' => 'Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba, Prueba', 
				'layout' => 1, 
				'content' => 'lorem loremlorem loremlorem loremlorem loremlorem loremlorem loremlorem lorem',
				'status' => false
			],
			[
				'name' => 'Pagina6',
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
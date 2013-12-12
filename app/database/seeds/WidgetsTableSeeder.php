<?php

class WidgetsTableSeeder extends Seeder {

	public function run()
	{
		$widgets = [
			[
				'name' => 'clock',
				'config' => 'route/to/clock',
				'status' => true,
				'image' => 'route/to/image'
			],
			[
				'name' => 'date',
				'config' => 'route/to/date',
				'status' => true,
				'image' => 'route/to/image'
			]
		];

		DB::table('widgets')->insert($widgets);
	}

}
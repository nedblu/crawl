<?php

class WidgetsTableSeeder extends Seeder {

	public function run()
	{
		$widgets = [
			[
				'name' => 'clock',
				'config' => '/assets/widgets/clock.php',
				'status' => true,
				'image' => '/assets/widgets/clock.jpg'
			],
			[
				'name' => 'date',
				'config' => '/assets/widgets/date.php',
				'status' => true,
				'image' => '/assets/widgets/date.jpg'
			]
		];

		DB::table('widgets')->insert($widgets);
	}

}
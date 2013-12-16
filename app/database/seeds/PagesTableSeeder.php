<?php

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$pages = [
			[
				'name' => 'Home',
				'title' => 'Welcome Home',
				'link' => 'home',
				'keywords' => 'Test, home', 
				'layout' => 1, 
				'content' => '<h1>Crawl CMS</h1> Crawl is a simple CMS (Content Management System) to ease the life of professionals whom do not have the knowledge of programming. For us NedBlu it is important to achieve the concept ‘easy to use’ because we believe people deserve to be happy and enjoy their website how ever it best suits them.',
				'status' => true
			],
			[
				'name' => 'About',
				'title' => 'About us',
				'link' => 'about',
				'keywords' => 'Test, about', 
				'layout' => 1, 
				'content' => 'Enim dapibus? Enim dis augue urna odio, natoque porta elit turpis porttitor, scelerisque pulvinar. Integer risus magna dis, purus nunc. Purus amet lorem porta etiam! Sit scelerisque, natoque massa odio? Porttitor augue et sit habitasse mattis? Sed ut porta, urna? Porttitor sed, risus pulvinar odio ac placerat phasellus? Ac vel a. In lundium aliquam elementum in! Auctor pid ultricies pellentesque mid elementum, nunc, dapibus duis, in diam? Elementum auctor non cum enim, magnis integer! A! Purus in adipiscing cum tortor quis magna integer habitasse, cras. Ut auctor turpis urna elementum? Egestas vel eu, in, enim a pellentesque elementum vel in lorem est arcu porta etiam a scelerisque nunc! Scelerisque et? Pid elementum enim ridiculus! Eros pulvinar nec elit cum parturient.',
				'status' => true
			],
			[
				'name' => 'Contact',
				'title' => 'Contact us for more information',
				'link' => 'contact',
				'keywords' => 'Test, contact', 
				'layout' => 1, 
				'content' => '<h1>Now contact us</h1> This project is based on Laravel 4, a beautiful framework for artisans. Our main goal is for our clients to have the security and docile accessibility to manage their website. Therefore, we are working hard to achieve our goals using the security that Laravel provides. Documentation for the entire framework can be found on the Laravel website.',
				'status' => true
			]
		];

		DB::table('pages')->insert($pages);
	}

}
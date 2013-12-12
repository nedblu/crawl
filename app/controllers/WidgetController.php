<?php

class WidgetController extends BaseController {

	public function showWidgets()
	{
		$widget = DB::table('widgets')->where('status','=',true)->get();
		return View::make('widgets')->with([ 'widgets' => $widget ]);
		
	}

	public function saveWidgets()
	{
		
		return Redirect::to('crawl/paginas');
	}

}
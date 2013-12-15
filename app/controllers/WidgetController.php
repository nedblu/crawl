<?php

class WidgetController extends BaseController {

	public function showWidgets()
	{
		$widget = DB::table('widgets')->get();
		return View::make('widgets')->with([ 'widgets' => $widget ]);
		
	}

	public function saveWidgets()
	{
		$widgets = Input::get();
		//DB::table('widgets')->where('id','=',)
		return Redirect::to('crawl/widgets');
	}

}
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

		for ($i=1; $i < 4; $i++) {
			if ($widgets['wid'.$i] != null) {
				DB::table('widgets')->where('id', '=', $widgets['wid'.$i])->update( array('status' => true));
			}
			if($widgets['set'.$i] != null){
				DB::table('widgets')->where('id', '=', $widgets['set'.$i])->update( array('status' => false));
			}
		}
		return Redirect::to('crawl/widgets');
	}

}
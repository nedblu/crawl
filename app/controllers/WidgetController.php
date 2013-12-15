<?php

class WidgetController extends BaseController {

	public function showWidgets()
	{
		$widget = DB::table('widgets')->where('status', '=', false)->get();
		$widgetF = DB::table('widgets')->where('status', '=', true)->get();
		return View::make('widgets')->with([ 'widgets' => $widget ])->with(['widgetF' => $widgetF ]);
		
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
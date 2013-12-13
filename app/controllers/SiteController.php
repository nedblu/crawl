<?php

class SiteController extends \BaseController {

	private function getPages()
	{
		$nav = DB::table('pages')->where('id','!=',1)->get(['name','status']);
		return $nav;
	}
	
	public function index()
	{
		$data = Page::find(1)->get(['title','keywords','content']);
		return View::make('themes.index')->with('links', self::getPages())->with('data', $data);
	}

	public function pages($page)
	{
		$data = Page::where('link',$page)->get(['title','keywords','content']);

		//return $data;
		return View::make('themes.pages')->with('links', self::getPages())->with('data', $data);
	}
}
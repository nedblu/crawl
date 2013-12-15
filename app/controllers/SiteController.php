<?php

class SiteController extends \BaseController {

	private function getPages()
	{
		$nav = DB::table('pages')->where('id','!=',1)->get(['name','status']);
		return $nav;
	}
	private function getFooter()
	{
		$footer = DB::table('config')->get();
		return $footer;
	}
	private function getDataIndex()
	{
		$data = Page::find(1)->get(['title','keywords','content','name']);
		return $data;
	}
	public function index()
	{
		$data = Page::find(1)->get(['title','keywords','content','name']);
		return View::make('themes.index')
					->with('links', self::getPages())
					->with('data', $data)
					->with('footer', self::getFooter());
	}

	public function pages($page)
	{
		$data = Page::where('link',$page)->get(['title','keywords','content']);
		$index = Page::find(1)->get(['name']);

		return View::make('themes.pages')
					->with('links', self::getPages())
					->with('data', $data)
					->with('index',$index)
					->with('footer', self::getFooter());
	}
}
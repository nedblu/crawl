<?php

class PagesController extends BaseController {

	public function show()
	{
		$pages = DB::table('pages')->get();
		return View::make('pages')->with('pages', $pages);
	}

	public function deletePage($id)
	{
		DB::table('pages')->where('id','=', $id)->delete();
		return Redirect::to('crawl/paginas');
	}

	public function updatePage()
	{
		$changes = Input::all();
		var_dump($changes);
		echo $changes[1];
	}

}
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

		if(sizeof($changes) == 1)
		{
			DB::table('pages')->where('status', true)->update(['status' => false]);
			return Redirect::to('crawl/paginas');
		}
		else
		{
			foreach ($changes['page'] as $change) 
			{
				DB::table('pages')->where('id', $change)->update(['status' => true]);
			}
			return Redirect::to('crawl/paginas');

		}
	}

}
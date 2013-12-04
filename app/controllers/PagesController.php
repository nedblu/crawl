<?php

class PagesController extends BaseController {

	public function show()
	{

		$pages = Page::all();
		return View::make('pages')->with('pages', $pages);

	}

	public function deletePage($id)
	{

		Page::where('id',$id)->delete();
		return Redirect::to('crawl/paginas');

	}

	public function updatePage()
	{
		$changes = Input::all();
		var_dump($changes);

		if( sizeof($changes) == 1 )
		{
			
			Page::where('status',true)->update(['status' => false])
			//return Redirect::to('crawl/paginas');
		}
		else
		{
			var_dump($changes['page']);

			foreach ($changes['page'] as $change) 
			{
				DB::table('pages')->where('id', $change)->update(['status' => true]);
				echo "Actaulizada";
			}
			//return Redirect::to('crawl/paginas');
		}
	}
	
	public function newPage()
	{
		
		$newPage = [
			'name'  	=> Input::get('name'),
			'title' 	=> Input::get('title'),
			'keywords' 	=> Input::get('keywords'),
			'layout'	=> Input::get('layout'),
			'content' 	=> Input::get('content'),
			'status'	=> false
		];

		$rules = [
			'name'  	=> 'required',
			'title' 	=> 'required',
			'keywords' 	=> 'required',
			'layout'	=> 'required',
			'content' 	=> 'required'
		];

		$v = Validator::make($newPage, $rules);

		if( $v->fails() )
		{
			var_dump($v->messages());
			//return Redirect::to('crawl/paginas/new')->withErrors();
		}
		else
		{
			DB::table('pages')->insert($newPage);
			return Redirect::to('crawl/paginas');
		}
	}
}
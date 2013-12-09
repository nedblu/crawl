<?php

class PagesController extends \BaseController {

	public function index()
	{

		$pages = DB::table('pages')->get();
		return View::make('pages')->with('pages', $pages);

	}
	
	public function showNewPage()
	{

		return View::make('new');

	}

	public function showEditPage($id)
	{

		$page = Page::find($id);
		return View::make('edit')->with('page', $page);
	}

	public function editPage()
	{
		$id = Input::get('id');

		$editPage = [
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

		$v = Validator::make($editPage, $rules);

		if( $v->fails() )
		{
			return Redirect::to('crawl/paginas/edit/' . $id)->withErrors($v);
		}
		else
		{
			
			Page::where('id',$id)->update($editPage);

			return Redirect::to('crawl/paginas');
		}
	}

	public function deletePage($id)
	{

		Page::where('id',$id)->delete();
		return Redirect::to('crawl/paginas');

	}

	public function updatePage()
	{
		$changes = Input::all();

		if( sizeof($changes) == 1 )
		{
			
			Page::where('status',true)->update(['status' => false]);
			return Redirect::to('crawl/paginas');

		}
		else
		{

			DB::update("UPDATE pages SET status=0");

			foreach ($changes['page'] as $change) 
			{
				Page::where('id', $change)->update(['status' => true]);
			}
			
			return Redirect::to('crawl/paginas');

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
			return Redirect::to('crawl/paginas/new')->withErrors($v->messages);
		}
		else
		{
			$page = new Page($newPage);
			$page->save();

			return Redirect::to('crawl/paginas');
		}
	}
}
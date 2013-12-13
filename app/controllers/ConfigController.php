<?php 

class ConfigController extends BaseController {

	public function showConfig()
	{
		$paginas = DB::table('pages')->where('status','=',true)->get();
		$config = DB::table('config')->get();
		return View::make('configure')->with(['pagesLoad'=>$paginas])->with(['fillData'=>$config]);				
	}

	public function saveConfig()
	{

		if (Input::hasFile('favicon')) {

<<<<<<< HEAD
			$favicon = Input::file('favicon');

			if ($favicon->getClientOriginalExtension() != 'ico') {
			
				$favicon->move('img/', 'favicon.ico')
				;

				$mythumb = new thumb();
				$mythumb->loadImage('img/favicon.ico');
				
				$mythumb->crop(32,32);
				$mythumb->save('img/favicon.ico');

			}elseif ($favicon->getClientOriginalExtension() == 'ico' && !empty($favicon)) {
				$favicon->move('img', 'favicon.ico');
			}
=======
			Image::make(Input::file('favicon')->getRealPath())->grab(32)->save('img/favicon.ico',100);
>>>>>>> dev
		}

		$descripcion = Input::get('descripcion');	

		if (!empty($descripcion)) {
			$id_conf = DB::table('config')->get();
			DB::table('config')->where('description', '=',$id_conf[0]->description)->update([
				'description' => $descripcion
			]);		
		}

		$paginas = DB::table('pages')->where('status','=',true)->get();
		$lenghtR = count($paginas);

		DB::table('nav')->truncate();
		for ($i=1; $i <= $lenghtR ; $i++) { 
			DB::table('nav')->insert([
				'page_id' => $_POST['hideId'.$i]
			]);
		}

		return Redirect::to('crawl/paginas');
	}

}
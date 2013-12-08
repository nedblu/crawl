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

		if (Input::hasFile('favicon') == true) {

			$favicon = Input::file('favicon');

			if ($favicon->getClientOriginalExtension() != 'ico') {
			
				$favicon->move('public', 'favicon.ico');

				$mythumb = new thumb();
				$mythumb->loadImage('public/favicon.ico');
				
				$mythumb->crop(32,32);
				$mythumb->save('public/favicon.ico');

			}elseif ($favicon->getClientOriginalExtension() == 'ico' && !empty($favicon)) {
				$favicon->move('public', 'favicon.ico');
			}

		}

		$descripcion = Input::get('descripcion');	

		if (!empty($descripcion)) {
			$id_conf = DB::table('config')->get();
			DB::table('config')->where('description', '=',$id_conf[0]->description)->update([
				'description' => $descripcion
			]);		
		}

		
		//$paginas = DB::table('pages')->where('status','=',true)->get();
		//$lenghtR = count($paginas);
				
		/*$navOrder = Input::get();
		var_dump($navOrder);
		$navOrder2 = $_POST;
		echo "<br><br><br>";
		var_dump($navOrder2);*/


		
	}

}
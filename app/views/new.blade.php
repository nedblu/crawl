@extends('templates.default.new')

@section('contenido')
	<div id="site_map">
		<a href=""><h1 class="h1_link">Páginas </h1></a> <span class="icon-pagesuniE604"></span> <h1> Nueva Página</h1>
	</div>

	{{ Form::open(['url' => 'crawl/paginas/new']) }}
		<section class="conf_item">
			<h2>Nombre</h2>
			<p>
				<label for="nombre">¿Qué nombre tendrá tu página en el menú?</label><input type="text" name="name" autofocus placeholder="nombre">
			</p>
		</section>
		<section class="conf_item">
			<h2>Titulo</h2>
			<p>
				<label for="nombre">¿Cual será el titulo de tu página?</label><input type="text" name="title" placeholder="titulo">
			</p>
		</section>
		<section class="conf_item">
			<h2>Palabras Clave</h2>
			<p>
				<label for="nombre">¿Qué palabras definen tu sitio?</label><input type="text" name="keywords" placeholder="keywords">
			</p>
		</section>
		<section class="conf_item">
			<h2>Layouts</h2>
			<p>
				Elije la distribución de tu nueva página.
			</p>
			<div class="layout_box">
				<div class="layout_item">
					<p>
						<input type="radio" name="layout" id="1" value="1" checked>
						Uno
					</p>
					<img src="" alt="">
				</div><!--
				--><div class="layout_item">
					<p>
						<input type="radio" name="layout" id="2" value="2">
						Dos
					</p>
					<img src="" alt="">
				</div><!--
				--><div class="layout_item">
					<p>
						<input type="radio" name="layout" id="3" value="3">
						Tres
					</p>
					<img src="" alt="">
				</div>
			</div>
		</section>
		<section class="conf_item">
			<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
			<script type="text/javascript">
				bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
			</script>

			<h2>Contenido</h2>
			<textarea name="content" style="width: 100%;background-color: white;height: 400px;"></textarea>
		</section>
		<div id="data_actions">
			<a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
			<button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
		</div>
	{{ Form::close() }}

@endsection
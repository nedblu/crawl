@extends('templates.default.new')

@section('contenido')
	<div id="site_map">
		<a href=""><h1 class="h1_link">Páginas </h1></a> <span class="icon-pagesuniE604"></span> <h1> Nueva Página</h1>
	</div>

	{{ Form::open(['url' => 'crawl/paginas/edit']) }}

		{{ Form::hidden('id', $page->id) }}
		<section class="conf_item">
			<h2>Nombre</h2>
			<p>
				<label for="nombre">¿Qué nombre tendrá tu página en el menú?</label><input type="text" name="name" autofocus placeholder="nombre" value="{{ $page->name }}"> {{ $errors->first('name') }}
			</p>
		</section>
		<section class="conf_item">
			<h2>Titulo</h2>
			<p>
				<label for="nombre">¿Cual será el titulo de tu página?</label><input type="text" name="title" placeholder="titulo" value="{{ $page->title }}"> {{ $errors->first('title') }}
			</p>
		</section>
		<section class="conf_item">
			<h2>Palabras Clave</h2>
			<p>
				<label for="nombre">¿Qué palabras definen tu sitio?</label><input type="text" name="keywords" placeholder="keywords" value="{{ $page->keywords }}"> {{ $errors->first('keywords') }}
			</p>
		</section>
		<section class="conf_item">
			<h2>Layouts</h2>
			<p>
				Elije la distribución de tu nueva página.
			</p>
			<div class="layout_box">
			<?php 
				$posit = [1 => 'Izquierdo', 2 => 'Centrado', 3 =>'Derecho'];
			?>

			@for( $i=1; $i<=3; $i++)
				@if($page->layout == $i)
			<div class="layout_item">
				<p>
					<input type="radio" name="layout" id="{{ $i }}" value="{{ $i }}" checked>
					{{ $posit[$i] }}
				</p>
				<img src="" alt="">
			</div><!--
			-->
				@else
			<div class="layout_item">
				<p>
					<input type="radio" name="layout" id="{{ $i }}" value="{{ $i }}">
					{{ $posit[$i] }}
				</p>
				<img src="" alt="">
			</div><!--
			-->
				@endif
			@endfor
			</div>
		</section>
		<section class="conf_item">
			<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
			<script type="text/javascript">
				bkLib.onDomLoaded(function() { 
					new nicEditor({buttonList : ['bold', 'italic','underline','left','center', 'right','justify','ol','ul','fontSize','fontFormat','xhtml','image','upload','link','unlink','forecolor','bgcolor']}).panelInstance('area');
				});
			</script>

			<h2>Contenido</h2>
			{{ $errors->first('content') }}
			<textarea name="content" id="area" style="width: 100%;background-color: white;height: 400px;">
				{{ $page->content }}
			</textarea>
		</section>
		<div id="data_actions">
			<a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
			<button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
		</div>
	{{ Form::close() }}

@endsection
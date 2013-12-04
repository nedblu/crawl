<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Este es el tamplate de configuraciones</title>
	{{ HTML::style('css/template.css') }}
	{{ HTML::style('css/pages.css') }}
	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/template.js') }}
</head>
<body>
	<header>
		<div id="logo">
			<figure>
				{{ HTML::image('crawlCMS_logo.png','Logo') }}
			</figure>
		</div>
		<div id="action">
			<div id="account">
				<ul>
					<li>{{ Auth::user()->username }}</li>
					<li>{{ HTML::link('crawl/perfil','Mi cuenta') }}</li>
					<li>{{ HTML::link('crawl/logout', 'Salir') }}</li>
				</ul>
			</div>
			<div id="user">
				<figure>
					<?php $image = Auth::user()->image ?>
					{{ HTML::image( $image,'Profile Picture') }}
				</figure>
			</div>
		</div>
	</header>

	<section id="main">
		<section id="menu">
			<nav>
				<ul>
					<li>{{ HTML::link('crawl/config', 'Configuracion') }}</li>
					<li>{{ HTML::link('crawl/paginas','Páginas') }}</li>
					<li><a href="">Widgets</a></li>
					<li><a href="">Usuarios</a></li>
				</ul>
			</nav>
		</section>
		<section id="content">
			@yield('contenido')
		</section>
	</section>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Este es el tamplate principal</title>
	{{ HTML::style('css/template.css') }}
	{{ HTML::style('css/pages.css') }}
	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/template.js') }}
	<link rel="shortcut icon" href="{{ URL::to('img/favicon.ico') }}">
</head>
<body>
	<header>
		<div id="logo">
			<figure>
				{{ HTML::image('img/crawlCMS_logo.png','Logo') }}
			</figure>
		</div>
		<div id="action">
			<div id="account">
				<ul>
					<li>{{ Auth::user()->fullname }}</li>
					<li>{{ HTML::link('crawl/perfil','Mi cuenta') }}</li>
					<li>{{ HTML::link('crawl/logout', 'Salir') }}</li>
				</ul>
			</div>
			<div id="user">
				<figure>
					{{ HTML::image( 'assets/profile_imgs/' . 'thumb48-' . Auth::user()->image,'Profile Picture') }}
				</figure>
			</div>
		</div>
	</header>

	<section id="main">
		<section id="menu">
			<nav>
				<ul>
					<li>{{ HTML::link('crawl/configuracion', 'Configuracion') }}</li>
					<li>{{ HTML::link('crawl/paginas','Páginas') }}</li>
					<li><a href="">Widgets</a></li>
					<li>{{ HTML::link('crawl/users','Usuarios') }}</li>
				</ul>
			</nav>
		</section>
		<section id="content">
			@yield('contenido')
		</section>
	</section>
</body>
</html>
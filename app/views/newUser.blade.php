@extends('templates.default.new')

@section('contenido')
	<div id="site_map">
		<a href=""><h1 class="h1_link">Usuarios </h1></a> <span class="icon-pagesuniE604"></span> <h1> Nuevo Usuario</h1>
	</div>

	{{ Form::open(['url' => 'crawl/usuarios/create']) }}
		<section class="conf_item">
			<h2>Nombre</h2>
			<p>
				<label for="nombre">¿Cómo se llama el nuevo integrante?</label><input type="text" name="name" autofocus placeholder="nombre" required>
			</p>
		</section>
		<section class="conf_item">
			<h2>Username</h2>
			<p>
				<label for="username">¿Cómo le gusta que te llame?</label><input type="text" name="username" placeholder="username" required>
			</p>
		</section>
		<section class="conf_item">
			<h2>Contraseña</h2>
			<p>
				<label for="password">Escribe tu llave de acceso</label><input type="password" name="password" placeholder="Password" required>
			</p>
		</section>
		<section class="conf_item">
			<h2>Correo electrónico</h2>
			<p>
				<label for="email">¿Dónde te enviamos información de tu cuenta?</label><input type="email" name="email" placeholder="as@as.com" required>
			</p>
		</section>
		<section class="conf_item">
			<h2>Tipo de usuario</h2>
			<p>
				<label for="userlevel">Nivel de permisos</label>
				{{ Form::select('userlevel', [0 => 'Seleccionar', 2=> 'Moderador', 3 => 'Editor']) }}
			</p>
		</section>
		
		
		<div id="data_actions">
			<a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
			<button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
		</div>
	{{ Form::close() }}

@endsection
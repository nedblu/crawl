@extends('templates.default.profile')

@section('contenido')
	<div id="profile_title">
		<h1>Mi Cuenta</h1>
	</div>


	{{ Form::open(['url' => 'crawl/perfil/update', 'files' => true]) }}
	<div class="data_item">
		<h2>Nombre</h2>
		<p>
			<label for="nombre">Dinos ¿Cual es tu nombre?</label><input type="text" name="nombre" autofocus placeholder="nombre" value="{{ $fullname }}">{{ $errors->first('name') }}
		</p>
	</div>
	<div class="data_item">
		<h2>Correo Electrónico</h2>
		<p>
			<label for="nombre">¿A donde te enviaremos notificaciones?</label><input type="email" name="email" value="{{ $email }}" placeholder="email@crawl.com">
			{{ $errors->first('email') }}
		</p>
	</div>
	<div class="data_item">
		<h2>Contraseña</h2>
		{{ '<span style="color:red; font-size:.7em;">' . $errors->first('password') .'</span>'}}
		<p>
			<label for="nombre">¿Cual será tu contraseña de acceso?</label><input name="password" type="password" placeholder="contraseña">
		</p>
		<h2 class="second_h2">Confirmar Contraseña</h2>
		<p>
			<label for="nombre">Vamos, sólo reescribela</label><input name="password_confirmation" type="password" placeholder="contraseña otra vez">
		</p>
	</div>
	<div class="data_item">
		<h2>Foto</h2>
		<p>
			Selecciona la imagen para tu perfil
		</p>
		<div class="up_load_box">
			{{ HTML::image( '/assets/profile_imgs/' . Auth::user()->username . '/thumb100-' . Auth::user()->image,'Profile Picture') }}<!--
			--><div class="up_load_section">
				<div class="up_load_button">
					<input type="file" name="pic" accept="image/*">
				</div>
			</div>
		</div>
	</div>
	<div id="data_actions">
		<a href=""><span class="icon-pagesclose"> Cancelar</a>
		<button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
	</div>
	{{ Form::close() }}
@stop
@extends('templates.default.profile')

@section('contenido')
	<div id="profile_title">
		<h1>Mi Cuenta</h1>
	</div>
	<div class="data_item">
		<h2>Nombre</h2>
		<p>
			<label for="nombre">Dinos ¿Cual es tu nombre?</label><input type="text" autofocus placeholder="nombre">
		</p>
	</div>
	<div class="data_item">
		<h2>Correo Electrónico</h2>
		<p>
			<label for="nombre">¿A donde te enviaremos notificaciones?</label><input type="email" placeholder="email@crawl.com">
		</p>
	</div>
	<div class="data_item">
		<h2>Contraseña</h2>
		<p>
			<label for="nombre">¿Cual será tu contraseña de acceso?</label><input type="password" placeholder="contraseña">
		</p>
		<h2 class="second_h2">Confirmar Contraseña</h2>
		<p>
			<label for="nombre">Vamos, sólo reescribela</label><input type="password" placeholder="contraseña otra vez">
		</p>
	</div>
	<div class="data_item">
		<h2>Foto</h2>
		<p>
			Selecciona la imagen para tu perfil
		</p>
		<div class="up_load_box">
			{{ HTML::image('emilmdos.png','Perfil') }}<!--
			--><div class="up_load_section">
				<div class="up_load_button">
					<input type="file" name="pic" accept="image/*">
				</div>
			</div>
		</div>
	</div>
	<div id="data_actions">
		<a href=""><span class="icon-pagesclose"> Cancelar</a>
		<a href=""><span class="icon-pagesdisk"> Guardar Cambios</a>
	</div>
@stop
@extends('templates.default.main')

@section('contenido')
	<h1>Usuarios</h1>

	<div id="pages_box">
		<div id="table_box">
			{{ $errors->first('type') }}
			<div id="new_page">
				<a href="{{ URL::to('crawl/usuarios/new') }}"><span class="icon-pagesplus"></span> Nuevo Usuario</a>
			</div>
			<table>
				<thead>
					<tr class="tr_first">
						<th>Nombre</th>
						<th>Acciones</th>
						<th>Username</th>
						<th>Email</th>
						<th>Tipo</th>
					</tr>
				</thead>
				<tbody>
					@if($users)
						@foreach($users as $user)
							<tr>
								<td>{{ $user->fullname }}</td>
								<td>
									 <a href="{{ URL::to('crawl/usuarios/del/' . $user->id) }}"><span class="icon-pagesremove"></span></a>
								</td>
								<td>
									{{ $user->username }}
								</td>
								<td> {{ $user->email }} </td>
								<td> {{ $user->userlevel }} </td>
							</tr>
						@endforeach

					@else*/
					<tr>
						<td colspan="3"> Aun no hay páginas hechas... ¿Por qué no creas una?</td>
					</tr>

					@endif
				</tbody>
			</table>
		</div>
	</div>
@stop
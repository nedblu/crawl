@extends('templates.default.main')

@section('contenido')
	<h1>Páginas</h1>

	<div id="pages_box">
		<div id="table_box">
			<div id="new_page">
				<a href=""><span class="icon-pagesplus"></span> Nueva Página</a>
			</div>
			<table>
				<thead>
					<tr class="tr_first">
						<th>Páginas</th>
						<th>Acciones</th>
						<th>Estatus</th>
					</tr>
				</thead>
				<tbody>
					@if($pages)
					{{ Form::open(['url'=> 'crawl/paginas/update']) }}
						@foreach($pages as $page)
							<tr>
								<td>{{ $page->name }}</td>
								<td>
									<a href=""><span class="icon-pagespencil"></span></a> | <a href="{{ URL::to('crawl/paginas/del/' . $page->id) }}"><span class="icon-pagesremove"></span></a>
								</td>
								<td>
									@if($page->status == 1)
										{{ Form::checkbox($page->id, 'status' , 'checked') }}
									@else
										{{ Form::checkbox($page->id, 'status') }}
									@endif
								</td>
							</tr>
						@endforeach

					@else
					<tr>
						<td colspan="3"> Aun no hay páginas hechas... ¿Por qué no creas una?</td>
					</tr>

					@endif
				</tbody>
			</table>
			<div id="save_changes">
				<a href=""><span class="icon-pagesclose"> Cancelar</a>
				<a href=""><span class="icon-pagesdisk"> Guardar Cambios</a>
			</div>
				{{ Form::submit('actualizar') }}
			{{ Form::close() }}
		</div>
	</div>
@stop
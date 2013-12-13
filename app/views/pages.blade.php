@extends('templates.default.main')

@section('contenido')
	<h1>Páginas</h1>

	<div id="pages_box">
		<div id="table_box">
			<div id="new_page">
				<a href="{{ URL::to('crawl/paginas/new') }}"><span class="icon-pagesplus"></span> Nueva Página</a>
			</div>
			{{ $errors->first('id') }}
			<table>
				<thead>
					<tr class="tr_first">
						<th>Páginas</th>
						<th>Acciones</th>
						<th>Estatus</th>
					</tr>
				</thead>
				<tbody>
					
					{{ Form::open(['url'=> 'crawl/paginas/update']) }}
					
					@if($pages)
						@foreach($pages as $page)
							<tr>
								<td>{{ $page->name }}</td>
								<td>
									<a href="{{ URL::to('crawl/paginas/edit/' . $page->id) }}"><span class="icon-pagespencil"></span></a> | <a href="{{ URL::to('crawl/paginas/del/' . $page->id) }}"><span class="icon-pagesremove"></span></a>
								</td>
								<td>
									@if($page->status == 1)
										{{ Form::checkbox('page[]', $page->id , 'checked') }}
									@else
										{{ Form::checkbox('page[]', $page->id) }}
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
				<button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
			</div>
				
			{{ Form::close() }}
		</div>
	</div>
@stop
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
					<tr>
						<td>Home</td>
						<td>
							<a href=""><span class="icon-pagespencil"></span></a> | <a href=""><span class="icon-pagesremove"></span></a>
						</td>
						<td>
							<p>
							    <input type="checkbox"/>
							</p>
						</td>
					</tr>
					<tr>
						<td>Misión</td>
						<td>
							<a href=""><span class="icon-pagespencil"></span></a> | <a href=""><span class="icon-pagesremove"></span></a>
						</td>
						<td>
							<p>
							    <input type="checkbox" checked/>
							</p>
						</td>
					</tr>
					<tr>
						<td>Visión</td>
						<td>
							<a href=""><span class="icon-pagespencil"></span></a> | <a href=""><span class="icon-pagesremove"></span></a>
						</td>
						<td>
							<p>
							    <input type="checkbox"/>
							</p>
						</td>
					</tr>
					<tr class="tr_last">
						<td>About</td>
						<td>
							<a href=""><span class="icon-pagespencil"></span></a> | <a href=""><span class="icon-pagesremove"></span></a>
						</td>
						<td>
							<p>
							    <input type="checkbox" checked/>
							</p>
						</td>
					</tr>
				</tbody>
			</table>
			<div id="save_changes">
				<a href=""><span class="icon-pagesclose"> Cancelar</a>
				<a href=""><span class="icon-pagesdisk"> Guardar Cambios</a>
			</div>
		</div>
	</div>
@stop
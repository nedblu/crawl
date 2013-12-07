@extends('templates.default.config')

@section('contenido')
	<div id="profile_title">
		<h1>Configuración</h1>
	</div>
   
	<div class="data_item">
		<h2>¿Tienes un favicon?</h2>
		<p>
			<label for="favicon">Recuerda que debe ser una imagen de 16x16 pixeles y en formato .ico</label><input type="file" autofocus placeholder="nombre">
		</p>
	</div>
	<div class="data_item">
		<h2>Ordena tu menú</h2>
		<p>	
			Acomoda tus páginas según quieras se muestren en el menú
		</p>
		<div class="gridster">
	        <ul>
	        	@if ($pagesLoad)
                    <?php $i=1; ?>
	        		@foreach ($pagesLoad as $pageData)
	        			<li data-row="{{ $i }}" data-col="1" data-sizex="1" data-sizey="1" data-name="{{ $pageData->id}}">{{ $pageData->name}}</li>
                         {{ Form::hidden('hideId'.$i,'', ['id'=>'hideId'.$i]) }}
                        <?php $i++; ?>
	        		@endforeach
	        	@else
	        		<span>No tienes páginas aún creadas... ¿Por qué no creas una aquí? {{ HTML::link('crawl/paginas/new', 'Nueva Página')}}</span>
	        	@endif           
	        </ul>
    	</div>
    </div>

    <div class="data_item">
    	<h2>Escribe un pie de tu página</h2>
    	<p>
    		<label for="textDescription">Aqui podrás especificar brevemente tu sitio web :)</label><textarea col="50" row="150"></textarea>
    	</p>
    </div>
    <div class="">
        <div class="js-seralize">Serialize</div>
    </div>

    <textarea id="log"></textarea>
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/dnd.js') }}
    <script type="text/javascript">
    var gridster;
        $(function(){

            gridster = $(".gridster ul").gridster({
                widget_base_dimensions: [110, 55],
                widget_margins: [5, 5]
            }).data('gridster');

            $('.js-seralize').on('click', function() {
                var s = gridster.serialize();
                //var tis = '1';
                //document.getElementById('hideId'+tis).value = s[0].row;
                for (var i = 0; i < s.length; i++) {
                    var pos = s[i].row;
                    alert(pos);
                    document.getElementById('hideId'+pos).value =s[i].data_name;
                };
            
            });
        });
    </script>
    
@stop
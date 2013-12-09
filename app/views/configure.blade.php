@extends('templates.default.config')

@section('contenido')
	<div id="profile_title">
		<h1>Configuración</h1>
	</div>
   {{ Form::open(['url' => 'crawl/configuracion/save', 'files' => true]) }}
	<div class="data_item">
		<h2>¿Tienes un favicon?</h2>
		<p class="favicon"> 
            @if ($fillData)
                {{ HTML::image('favicon.ico', 'YOlO') }}
            @endif
			<label for="favicon">Recuerda que debe ser una imagen de 16x16 pixeles y en formato .ico</label><input type="file" name="favicon" accept="image/*">
		</p>
	</div>
	<div class="data_item">
		<h2>Ordena tu menú</h2>
		<p>	
			Acomoda tus páginas según quieras se muestren en el menú
		
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
        </p>
    </div>

    <div class="data_item">
    	<h2>Escribe un pie de tu página</h2>
    	<p>@if (empty($fillData[0]->description))
    		  <label for="descripcion">Aqui podrás especificar brevemente tu sitio web :)</label><textarea col="50" row="150" name="descripcion" required></textarea>
            @else
                <label for="descripcion">Aqui podrás especificar brevemente tu sitio web :)</label><textarea col="50" row="150" name="descripcion">{{ $fillData[0]->description }}</textarea>
            @endif
    	</p>
    </div>
    <div id="data_actions">
            <a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
            <button type="submit" onclick="sendTo()"><span class="icon-pagesdisk"> Guardar Cambios</button>
    </div>
   
    {{ Form::close() }}
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script('js/dnd.js') }}
    <script type="text/javascript">
    var gridster;
        $(function(){

            gridster = $(".gridster ul").gridster({
                widget_base_dimensions: [110, 20],
                widget_margins: [5, 5]
            }).data('gridster');

            //$('.js-seralize').on('click', function() {
                  //the rest of code     
            //});
        });
        function sendTo(){
            var s = gridster.serialize();
            for (var i = 0; i < s.length; i++) {
                var pos = s[i].row;
                //alert(i);
                document.getElementById('hideId'+pos).value =s[i].data_name;
            }; 
        };
    </script>
    
@stop
@extends('templates.default.widget')

@section('contenido')
	<div id="profile_title">
		<h1>Widgets</h1>
	</div>
	<div class="data_item">

        <h2>Widgets disponibles</h2>
    	<p>
           Arrastra un elemento hasata la columna de la derecha para agregar un widget a tu sitio. Para no tener un widget en tu sitio solo devuelvelo a la columna de la izquierda.
    	</p>

        <style type="text/css">
            .block{
                margin-top: 30px;
                display: inline-block;
                vertical-align: top;
                width:450px;
            }
            .sortable{border:1px solid black;
                width: 100px; 
                min-height: 100px;
                padding: 5px; 
                width: 300px;
            }
            .sortable li{
                border:1px dashed red;
                margin:5px;
                list-style: none; 
                height: 80px; 
                text-align: center;
            }
            .sortable-placeholder{
                background: rgba(60,150,234,0.5);
                height: 20px;
            }
            .sortable-draggin{
                border:1px solid green;
            }
            #widgetSave{
                min-height:  
                width: 14;
                padding: 5px;
            }
        </style>
        <div class="block">
            {{ Form::open(['url' => 'crawl/widgets/save'])}}
            <ul id="dbDrop" class="sortable">
                @if ($widgets)
                    @foreach ($widgets as $widget)
                        <li id="{{$widget->id}}">{{ HTML::image( $widget->image, 'widget'.$widget->name) }} {{$widget->name}}</li>
                    @endforeach
                @endif
           </ul>
            {{ Form::hidden('wid1', '', ['id' => 'wid1']) }}{{ Form::hidden('set1', '', ['id' => 'set1']) }}
            {{ Form::hidden('wid2', '', ['id' => 'wid2']) }}{{ Form::hidden('set2', '', ['id' => 'set2']) }}
            {{ Form::hidden('wid3', '', ['id' => 'wid3']) }}{{ Form::hidden('set3', '', ['id' => 'set3']) }}
            {{ Form::hidden('size', '', ['id' => 'size']) }}
         </div>
        <div class="block">
           
            <ul id="widgetSave" class="sortable">
                 @if ($widgetF)
                    @foreach ($widgetF as $widget)
                        <li id="{{$widget->id}}">{{ HTML::image( $widget->image, 'widget'.$widget->name) }}{{$widget->name}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/jquery.sortable.js"></script>
    <script type="text/javascript">
        $('.sortable').sortable({
            connectWith: '.connected'
        });
        function widget(){
            var numOfLi = $('#widgetSave li').size();
            document.getElementById('size').value = numOfLi;
        };
        setInterval(widget, 100);
        widget();

        function sendTo(){
            var numOfLi = $('#widgetSave li').size();
            var elementsLi = $('#widgetSave').children();
            document.getElementById('size').value = numOfLi;
            for (var i = 0; i < numOfLi; i++) {
                document.getElementById('wid'+String(i+1)).value = elementsLi[i].id;
            };
            numOfLi = $('#dbDrop li').size();
            elementsLi = $('#dbDrop').children();
            for (var i = 0; i < numOfLi; i++) {
                document.getElementById('set'+String(i+1)).value = elementsLi[i].id;
            };
        }
    </script>

    <div id="data_actions">
            <a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
            <button type="submit" onclick="sendTo()"><span class="icon-pagesdisk"> Guardar Cambios</button>
    </div>

    {{ Form::close(); }}
    
@stop
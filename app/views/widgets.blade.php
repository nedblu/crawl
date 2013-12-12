@extends('templates.default.widget')

@section('contenido')
	<div id="profile_title">
		<h1>Widgets</h1>
	</div>
	<div class="data_item">
		<h2>Widgets disponibles</h2>
		<p>
           Arrastra un elemento hasta el recuadro de "Vista en la página" para añadir un widget a tu sitio.
		</p>
        

<!--OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
           <style type="text/css">
    .sortable{border:1px solid black;width: 100px; display: inline-block;vertical-align: middle;min-height: 15px;}
    .sortable li{border:1px dashed red;list-style: none;}
    .sortable div{height: 20px;border:1px solid red;}

</style>
<body>
    <ul class="sortable">
        @if ($widgets)
            @foreach ($widgets as $widget)
                <li>{{$widget->name}}</li>
            @endforeach
        @endif
    </ul>

    <ul class="sortable">
        <div></div>
        <div></div>
        <div></div>
    </ul>

<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery.sortable.js"></script>
<script type="text/javascript">
    $('.sortable').sortable({
        connectWith: '.connected'
    });
</script>

<!--OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
	</div>

    <div id="data_actions">
            <a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
            <button type="submit"><span class="icon-pagesdisk"> Guardar Cambios</button>
    </div>
    
@stop
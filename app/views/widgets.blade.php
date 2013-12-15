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
    .sortable{border:1px solid black;width: 100px; display: inline-block;vertical-align: middle;min-height: 80px;padding: 5px;}
    .sortable li{border:1px dashed red;list-style: none;}
    .sortable div{height: 20px;border:1px solid red;}
    .sortable-placeholder{background: rgba(60,150,234,0.5);height: 20px;}
    .sortable-draggin{border:1px solid green;}
    #widgetSave{min-height: 80px;padding: 5px;}

</style>
    {{ Form::open(['url' => 'crawl/widgets/save'])}}
    <ul class="sortable">
        @if ($widgets)
            @foreach ($widgets as $widget)
                <li id="{{$widget->id}}">{{$widget->name}}</li>
            @endforeach
        @endif
    </ul>
    {{ Form::hidden('wid1', '', ['id' => 'wid1']) }}
    {{ Form::hidden('wid2', '', ['id' => 'wid2']) }}
    {{ Form::hidden('wid3', '', ['id' => 'wid3']) }}
    {{ Form::hidden('size', '', ['id' => 'size']) }}
    <ul id="widgetSave" class="sortable">
    </ul>

<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery.sortable.js"></script>
<script type="text/javascript">
    $('.sortable').sortable({
        connectWith: '.connected'
    });
    function widget(){
    //$('#widgetSave').bind('mouseenter mouseleave', function(event){
        var numOfLi = $('#widgetSave li').size();
        document.getElementById('size').value = numOfLi;
        //alert('there are '+numOfLi+' elements in WidgetSave');
    //});
};
    setInterval(widget, 100);
    widget();

    function sendTo(){
        var numOfLi = $('#widgetSave li').size();
        //alert('there are '+numOfLi+' elements in WidgetSave');
        var elementsLi = $('#widgetSave').children();
        document.getElementById('size').value = numOfLi;
        for (var i = 0; i < numOfLi; i++) {
            alert(elementsLi[i].id);
            document.getElementById('wid'+String(i+1)).value = elementsLi[i].id;
        };
        alert('revisar');
    }
</script>

<!--OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO-->
	</div>

    <div id="data_actions">
            <a href="{{ URL::to('crawl/paginas')}}"><span class="icon-pagesclose"> Cancelar</a>
            <button type="submit" onclick="sendTo()"><span class="icon-pagesdisk"> Guardar Cambios</button>
    </div>
    {{ Form::close(); }}
    
@stop
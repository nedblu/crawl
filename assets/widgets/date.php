<div id="widget">
	<span id="big_day"></span>
	<span id="month" class="block">month</span><span id="year" class="block"></span>
</div>
<style type="text/css">

	#widget{color: #FFFFFF;background: rgb(60,179,230);
		font-family: helvetica;
		width: 132px;
		height: 135px;	
		border-radius: 10px;
	}
	#big_day{
		display: block;
		text-align: center;
		font-size: 5em;
	}
	
	.block{
		display: block;
		vertical-align: middle;
		text-align: center;
	}
</style>

<script type="text/javascript">

	var months = ['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];
	var weekDay = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
	var current = new Date();

	document.getElementById('big_day').innerHTML = current.getDate();
	document.getElementById('month').innerHTML = months[current.getMonth()];
	document.getElementById('year').innerHTML = current.getFullYear();
</script>





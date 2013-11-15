<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<title>Iniciar Sesión</title>
	{{ HTML::style('css/login.css') }}
</head>

<body>
	<div id="logo">
		{{ HTML::image('crawlCMS_logo.png') }}
	</div>

	{{ Form::open(['url' => 'crawl/login','method'=>'post']) }}

		{{ Form::label('username') }}
		{{ Form::text('username','',['placeholder' =>'username']) }}
		
		{{ Form::label('password') }}
		{{ Form::password('password','',['placeholder' => 'password']) }}
    	
    	{{ Form::submit('Log In') }}
	{{ Form::close() }}
</body>
</html>
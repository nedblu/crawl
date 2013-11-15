<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Este es el tamplate principal</title>
	{{ HTML::style('css/template.css')}}
</head>
<body>
	<p>Esta es una prueba.</p>

	@yield('section')

</body>
</html>
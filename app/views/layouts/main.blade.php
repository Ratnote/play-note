<!DOCTYPE html>

<html>
<head>
	<meta charset = 'UTF-8'>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
	<meta name='viewport' content='width=1190'>
</head>
<body>

	@include('layouts.header')
	<div class = 'container wrapper'>
	@yield('content')
	@include('layouts.right-side-bar')
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src = 'js/bootstrap.min.js'></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>

</html>
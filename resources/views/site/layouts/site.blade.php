
<!-- saved from url=(0018)http://warmech.ru/ -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>МЕХАНИЗМЫ ВОЙНЫ - здесь можно узнать все о войне и о том что сней связано...</title>
    <link href="{{ asset(env('THEME')) }}/css/index.css" rel="stylesheet" type="text/css">
    <link href="{{ asset(env('THEME')) }}/css/all.css" rel="stylesheet" type="text/css">
    <meta content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width">
</head>


<body>

    @yield('nav-pull-down')

    @yield('header')
<div id = "content">
	<div class="wrapper">
		@yield('nav')

        @yield('main')

		@yield('aside')
	</div>
</div>
@yield('footer')
<script src="{{ asset(env('THEME')) }}/js/slideout.min.js"></script>
<script>
	var slideout = new Slideout({
	'panel': document.getElementById('panel'),
	'menu': document.getElementById('menu'),
	'padding': 256,
	'tolerance': 70
	});

	// Toggle button
	document.querySelector('.toggle-button').addEventListener('click', function() {
	slideout.toggle();
	});
</script>
<script>
	function myFunction(x) {
		x.classList.toggle("change");
	}
</script>
</body>
</html>
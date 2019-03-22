<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="">
		<title></title>
        <link href="{{ asset(env('THEME')) }}/nav.css" rel="stylesheet" type="text/css">
        <link href="{{ asset(env('THEME')) }}/css/admin.css" rel="stylesheet" type="text/css">
		<script src="js.js"></script>
		
	</head>
	<body>
		<header>
				<div class="wrapper">
                    <!--@yield('nav')-->
				</div>
		</header>
		<main>
			<div>
				@yield('main')
			</div>
		</main>
		<footer>
			<div class="wrapper">
				<p class="pull-left">© 2017 Все права защищены</p>
				<p><a href="tel:+79219060183">+7-921-90-60-183</a></p>
			</div>
		</footer>
	</body>
</html>
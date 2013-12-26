<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{{ Config::get('bloggy.website.name') }} | {{ Session::get('title') }}</title>
		<link rel="stylesheet" type="text/css" href="{{ Bloggy::asset('css/main.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ Bloggy::asset('css/normalize.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ Bloggy::asset('css/fourteen.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ Bloggy::asset('css/font-awesome.min.css') }}">
		{{ Bloggy::scripts() }}
		@yield('head')
	</head>
	<body>
		<section id="parallax" data-speed="10"></section>
		<header id="head">
			<div class="image-circle">
				<div class="image" style="background: url({{ Bloggy::asset('images/adam.jpg') }})"></div>
			</div>
			<a href="{{ URL::to('/') }}" class="website">Bloggy 14</a>
			<a href="{{ URL::to('/') }}" class="slogan">Welcome to my blog</a>
			{{ Bloggy::toolbar((isset($blog)) ? $blog : null) }}
		</header>
		<section id="page">
			<div class="bloggy-hr top"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
			<div class="bloggy-hr bottom"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
			@yield('content')
		</section>
		<footer id="feet">
			<a href="http://bloggy.io" target="_blank" class="poweredBy"></a>
		</footer>
	</body>
</html>
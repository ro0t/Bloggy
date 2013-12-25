<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{{ Config::get('bloggy.website.name') }} | {{ Session::get('title') }}</title>
		<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettify.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettifytheme.css') }}">
		{{ Bloggy::scripts() }}
		@yield('head')
	</head>
	<body>
		<header id="head">
			<div class="bloggy-hr five"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
			<a href="{{ URL::to('/') }}" class="website">Theme 14</a>
			{{ Bloggy::toolbar((isset($blog)) ? $blog : null) }}
		</header>
		@yield('content')
		<script type="text/javascript">prettyPrint();</script>
	</body>
</html>
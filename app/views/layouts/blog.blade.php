<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@dam nv</title>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<<<<<<< HEAD
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/wee.css') }}" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
=======
		<link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettify.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettifytheme.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/sublimeScroll.css') }}">
		{{ Bloggy::scripts() }}
		<script src="{{ asset('js/sublimeScroll.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
        // Only run on browsers that support css transitions
        // See also example.css:15
        $(document).ready(function() {
            $.sublimeScroll({
                top: 0, // px to top
                bottom: 0, // px to bottom
                scrollWidth: 160, // Width of scrollbar
                removeElements: 'script',
                fixedElements: 'header.top, footer.bottom',
                contentWidth: 860, // Scroll viewport width
                minWidth: 1000, // Min width of window to display scroll
            });
        });
    
		</script>
		@yield('head')
>>>>>>> master
	</head>
	<body class="init">
		<header unselectable="on">
			<h1>Hello, my name is Adam</h1>
			<p id="scroll">Welcome to my blog, hmm.. what's below today?</p>
			<a href="http://flump.us" target="_blank">Creator of Flump</a>
			<a href="mailto:adam@stokkur.is"><i class="fa fa-envelope icon"></i> adam@stokkur.is</a>
		</header>
		<div id="blog">
			@yield('content')
		</article>
		</div>
	</body>
</html>
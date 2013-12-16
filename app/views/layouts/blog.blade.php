<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>adam nv | {{ Session::get('title') }}</title>
		<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettify.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/prettifytheme.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/sublimeScroll.css') }}">
		<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/prettify.js') }}" type="text/javascript"></script>
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
	</head>
	<body>
		@yield('content')
		<script type="text/javascript">
			prettyPrint();
		</script>
	</body>
</html>
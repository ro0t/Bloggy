<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>admin | {{ Session::get('title') }}</title>
		@yield('head')
	</head>
	<body>
		@yield('content')
	</body>
</html>
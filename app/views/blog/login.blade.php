@extends('layouts.blog')

@section('content')
	<div id="login">
		<form method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit">Login</button>
		</form>
	</div>
@stop
@extends('layouts.blog')

@section('content')
	<div id="login">
		<h3>Lets Blogin</h3>
		<form method="post">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="password" placeholder="Password">
			<button type="submit">Login</button>
		</form>
	</div>
@stop
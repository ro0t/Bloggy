@extends('layouts.blog')

@section('content')
	<form method="post">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="password" placeholder="password">
		<button type="submit">Login</button>
	</form>
@stop
@extends('layouts.admin')

@section('content')
	<h1>Edit post</h1>
	@if(Session::has('error'))
	<p style="color:red;">{{ Session::get('error') }}</p>
	@endif
	<form method="post">
		<div>
			<input type="text" name="title" value="{{ $blog->title }}">
		</div>
		<div>
			<textarea name="content" rows="10" cols="50">{{ $blog->content }}</textarea>
		</div>
		<div>
			<button type="submit">Submit</button>
		</div>
	</form>
	<a href="{{ URL::to('logout') }}">Logout</a>
@stop
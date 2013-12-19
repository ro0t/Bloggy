@extends('layouts.blog')

@section('content')
	{{ Blog::edit($blog) }}
@stop
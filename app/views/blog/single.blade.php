@extends('layouts.blog')

@section('content')
	{{ Blog::post($blog) }}
@stop
@extends('layouts.blog')

@section('content')
	@if(isset($blog))
		<article>
			<hgroup>
				<h1>{{ $blog->title }}</h1>
			</hgroup>
			<section id="content">
				{{ $blog->content }}
			</section>
			<footer>
				@if(isset($prev))
				<a href="{{ URL::to('blog/' . (isset($prev->slug) ? $prev->slug : $prev->id)) }}">Prev<span>{{ $prev->title }}</span></a>
				@endif
				@if(isset($next))
				<a href="{{ URL::to('blog/' . (isset($next->slug) ? $next->slug : $next->id)) }}"><span>{{ $next->title }}</span>Next</a>
				@endif
			</footer>
		</article>
	@else
		<article>
			<hgroup>
				<h1>No blog posts to be seen here.</h1>
			</hgroup>
			<section id="content">
				<p>404 errors are awesome, so we decided to have none.</p>
			</section>
			<footer class="centered">
				<a href="javascript:history.back();">Go back!</a>
			</footer>
		</article>
	@endif
@stop
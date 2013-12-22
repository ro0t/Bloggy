<article>
	<hgroup>
		<h1>{{ $blog->title }}</h1>
	</hgroup>
	<div class="bloggy-hr two"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
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
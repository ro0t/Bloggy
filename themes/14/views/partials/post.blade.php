<article>
	<hgroup>
		<a href="{{ URL::to('blog/' . $blog->slug) }}"><h1>{{ $blog->title }}</h1></a>
	</hgroup>
	<div class="bloggy-hr two"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
	<section id="content">
		{{ $blog->content }}
	</section>
	<footer>
		@if(isset($prev))
		<a class="prev" href="{{ URL::to('blog/' . (isset($prev->slug) ? $prev->slug : $prev->id)) }}">Prev<span>{{ $prev->title }}</span></a>
		@endif
		@if(isset($next))
		<a class="next" href="{{ URL::to('blog/' . (isset($next->slug) ? $next->slug : $next->id)) }}"><span>{{ $next->title }}</span>Next</a>
		@endif
	</footer>
</article>
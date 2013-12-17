<article>
	@if(Auth::check())
	<div class="edit"><a href="{{ URL::to('admin/edit/' . $blog->id) }}">Edit</a> &bull; <a href="{{ URL::to('admin/delete/' . $blog->id) }}" onclick="return confirm('Are you sure you want to delete this post?');" >Delete</a></div>
	@endif
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
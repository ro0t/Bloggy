<article>
	@if(Auth::check())
	<div class="edit"><button type="button" data-click="publish">Publish</button></div>
	@endif
	<hgroup>
		<h1 id="title" contenteditable></h1>
	</hgroup>
	<section id="content" contenteditable></section>
</article>
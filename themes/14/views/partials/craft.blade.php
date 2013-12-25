<article>
	@if(Auth::check())
	<div class="edit"><button type="button" data-click="publish">Publish</button></div>
	@endif
	<hgroup>
		<h1 id="title" contenteditable></h1>
	</hgroup>
	<div class="bloggy-hr two"><div class="first"></div><div class="second"></div><div class="third"></div><div class="fourth"></div></div>
	<section id="content" contenteditable></section>
</article>
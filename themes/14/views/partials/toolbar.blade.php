@if(Auth::check())
<div class="edit">
	<a href="{{ URL::to('dashboard') }}" {{ Request::is('dashboard') ? 'class="active"' : '' }} data-target="dashboard">
		<i class="fa fa-tachometer"></i>
	</a>
	<a href="{{ URL::to('create') }}" {{ (Request::is('create') ? 'class="active"' : '') }} data-target="create">
		<i class="fa fa-pencil"></i>
	</a>
	@if(isset($blog))
	<a href="{{ URL::to('edit/' . $blog->id) }}" {{ (Request::is('edit/*') ? 'class="active"' : '') }} data-target="edit">
		<i class="fa fa-file-text-o"></i>
	</a>
	<a href="{{ URL::to('delete/' . $blog->id) }}" onclick="return confirm('Are you sure you want to delete this post?');" data-target="delete">
		<i class="fa fa-times-circle-o"></i>
	</a>
	@endif
	<a href="{{ URL::to('logout') }}" data-target="logout">
		<i class="fa fa-sign-out"></i>
	</a>
</div>
@endif
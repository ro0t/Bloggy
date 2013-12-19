@if(Auth::check())
<div class="edit"><a href="{{ URL::to('create') }}">Write</a>
@if(isset($blog))
 &bull; <a href="{{ URL::to('edit/' . $blog->id) }}">Edit</a>
  &bull; <a href="{{ URL::to('delete/' . $blog->id) }}" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
@endif
</div>
@endif
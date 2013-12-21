<?php

class Blog extends Eloquent {
	
	protected $table = 'blog';
	protected $guarded = array('id');
	public $timestamps = true;

	public static function next($id) {
		$blog = Blog::select('id','slug','title')
					->where('id', '>', $id)
					->take(1)
					->orderBy('id', true)
					->first();

		return $blog;
	}

	public static function prev($id) {
		$blog = Blog::select('id','slug','title')->where('id', '<', $id)
					->take(1)
					->orderBy('id', true)
					->first();
					
		return $blog;
	}

	public static function post($blog) {
		if($blog != null)
			return View::make('partials.post')->with('blog', $blog)->with('next', $blog->next)->with('prev', $blog->prev);
		else
			return View::make('partials.empty');
	}

	public static function edit($blog) {
		if(isset($blog) && $blog != null)
			return View::make('partials.edit')->with('blog', $blog);
		else
			return View::make('partials.empty');
	}

	public static function craft() {
		return View::make('partials.craft');
	}

}
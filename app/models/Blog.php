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

}
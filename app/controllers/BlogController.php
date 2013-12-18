<?php

class BlogController extends BaseController {
	
	protected function index() {

		$blog = null;
		$next = null;
		$prev = null;
		$blog = Blog::take(1)->orderBy('id', true)->first();

		if(isset($blog)) {
			$next = Blog::next($blog->id);
			$prev = Blog::prev($blog->id);
		}

		$blog->next = $next;
		$blog->prev = $prev;

		return View::make('blog.index')->with('blog', $blog);

	}

	protected function single($id) {

		$blog = null;
		$next = null;
		$prev = null;

		if(is_numeric($id)) {
			$blog = Blog::find($id);
		} else {
			// Allow slug queries
			$blog = Blog::where('slug', $id)->first();
		}

		if(isset($blog)) {
			$next = Blog::next($blog->id);
			$prev = Blog::prev($blog->id);
		}

		$blog->next = $next;
		$blog->prev = $prev;

		return View::make('blog.single')->with('blog', $blog);

	}

	protected function login() {
		return View::make('blog.login');
	}

	protected function auth() {
		$data = Input::all();

		Auth::attempt(array('username' => $data['username'], 'password' => $data['password']));
		return Redirect::to('admin');

	}

	protected function logout() {
		Auth::logout();

		return Redirect::to('/');
	}

}
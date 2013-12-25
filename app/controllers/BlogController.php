<?php

class BlogController extends BaseController {
	
	protected function index() {

		$blog = Blog::take(1)->orderBy('id', true)->first();

		if(isset($blog)) {
			$blog->next = Blog::next($blog->id);
			$blog->prev = Blog::prev($blog->id);
		}

		return View::make('blog.index')->with('blog', $blog);

	}

	protected function single($id) {

		$blog = null;

		if(is_numeric($id)) {
			$blog = Blog::find($id);
		} else {
			// Allow slug queries
			$blog = Blog::where('slug', $id)->first();
		}

		if(isset($blog)) {
			$blog->next = Blog::next($blog->id);
			$blog->prev = Blog::prev($blog->id);
		}

		return View::make('blog.single')->with('blog', $blog);

	}

	protected function create() {
		return View::make('blog.create');
	}

	protected function edit($id) {
		$blog = Blog::find($id);
		return View::make('blog.edit')->with('blog', $blog);
	}

	protected function delete($id) {
		$blog = Blog::find($id);
		$blog->delete();

		return Redirect::to('/');
	}

	protected function login() {
		return View::make('blog.login');
	}

	protected function auth() {
		$data = Input::all();

		Auth::attempt(array('username' => $data['username'], 'password' => $data['password']));
		return Redirect::to('/');

	}

	protected function logout() {
		Auth::logout();

		return Redirect::to('/');
	}

}
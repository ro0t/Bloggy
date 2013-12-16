<?php

class AdminController extends BaseController {
	
	protected function index() {
		return View::make('admin.index');
	}

	protected function createBlog() {

		$data = Input::all();

		$data['slug'] = Str::slug($data['title']);
		$blog = Blog::create($data);

		if($blog->id)
			return Redirect::to('blog/' . $blog->id);
		else
			return Redirect::to('admin')->with('error', 'Gat ekki stofnað blog lulz.');

	}

	protected function edit($id) {

		$blog = Blog::find($id);
		return View::make('admin.edit')->with('blog', $blog);

	}

	protected function postEdit($id) {

		$data = Input::all();

		$blog = Blog::find($id);
		$blog->update($data);

		return Redirect::to('blog/' . $blog->id);
	}

	protected function delete($id) {
		$blog = Blog::find($id);
		$blog->delete();

		return Redirect::to('/');
	}

}
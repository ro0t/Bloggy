<?php

class ApiController extends Controller {
	
	protected function create() {

		$data = Bloggy::post();
		$data['slug'] = Str::slug($data['title']);

		$attempt = Blog::create($data);

		if(isset($attempt->id)) {
			return Bloggy::json(true, $attempt->id);
		} else {
			return Bloggy::json(false, 'Failed creating your blog post.');
		}

	}

	protected function edit($id) {

		if(is_numeric($id)) {

			$data = Bloggy::post();
			$blog = Blog::find($id);

			$blog->title = $data['title'];
			$blog->slug = Str::slug($data['title']);
			$blog->content = $data['content'];

			if($blog->save()) {
				return Bloggy::json(true);
			} else {
				return Bloggy::json(false, 'Unable to edit this blog item.');
			}

		}

	}

}
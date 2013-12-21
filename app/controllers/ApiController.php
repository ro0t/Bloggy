<?php

class ApiController extends Controller {
	
	protected function create() {

		$data = Bloggy::post();
		$data['slug'] = Str::slug($data['title']);

		try {
			$attempt = Blog::create($data);
			return Bloggy::json(true, $attempt->slug);
		} catch(Exception $e) {
			return Bloggy::json(false, $e);
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
				return Bloggy::json(true, $blog->slug);
			} else {
				return Bloggy::json(false, 'Unable to edit this blog item.');
			}

		}

	}

}
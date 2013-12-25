<?php

class Bloggy {
	
	public static function preload($function) {
		$function();
	}

	public static function scripts() {
		return View::make('partials.scripts');
	}

	public static function toolbar($blog = null) {
		return View::make('partials.toolbar')->with('blog', $blog);
	}

	public static function post() {
		$data = array();

		foreach($_POST as $k => $v)
			$data[$k] = Input::get($k);

		return $data;
	}

	public static function json($status, $return = null) {
		$json = array('response' => $status);

		if($status) {
			$json['id'] = $return;
		} else {
			$json['message'] = $return;
		}

		return json_encode($json);
	}

	public static function theme() {

		$theme = Config::get('bloggy.theme');
		return ($theme != 'default' && $theme != null) ? $theme : 'default';
	
	}

	public static function asset($file) {

		$path = base_path() . '/themes/' . Config::get('bloggy.theme') . '/public/' . $file;

		if(file_exists($path)) {
			return asset('asset/' . $file);
		} else {
			return asset($file);
		}

	}

	public static function output($path) {
		
		$path = base_path() . '/themes/' . Config::get('bloggy.theme') . '/public/' . $path;

		if(File::exists($path)) {

			$mime = mimetype($path);
			
			$response = Response::make(file_get_contents($path), 200);
			$response->header('Content-Type', $mime);

			return $response;
		}

		return App::abort('404');

	}

}
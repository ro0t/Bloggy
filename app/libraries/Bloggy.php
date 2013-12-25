<?php

class Bloggy {
	
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

}
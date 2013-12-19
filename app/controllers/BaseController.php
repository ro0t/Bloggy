<?php

class BaseController extends Controller {

	public function __construct() {
		self::title(Config::get('bloggy.defaultTitle'));
	}

	public static function title($title) {
		Session::set('title', $title);
	}


}
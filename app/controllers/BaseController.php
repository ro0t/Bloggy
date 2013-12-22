<?php

class BaseController extends Controller {

	public function __construct() {
		self::title(Config::get('bloggy.website.title'));
	}

	public static function title($title) {
		Session::set('title', $title);
	}


}
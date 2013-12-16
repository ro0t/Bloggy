<?php

class BaseController extends Controller {

	public function __construct() {
		self::title('Default title..');
	}

	public static function title($title) {
		Session::set('title', $title);
	}


}
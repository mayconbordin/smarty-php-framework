<?php

class Request {
	private $post;
	private $get;
	
	public function __construct() {
		$this->post = $_POST;
		$this->get	= $_GET;
	}
	
	public function getParam($key, $method = 'post') {
		$params = ($method == 'post') ? $this->post : $this->get;
		
		if (isset($params[$key])) {
			return $params[$key];
		} else {
			return null;
		}
	}
	
	public function isPost() {
		return ($this->post == null) ? false : true;
	}
	
	public function isGet() {
		return ($this->get == null) ? false : true;
	}
}
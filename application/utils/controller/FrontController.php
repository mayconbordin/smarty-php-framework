<?php

class FrontController extends Controller {
	public static function createInstance() {
    	$instance = new self();
    	return $instance;
  	}
  	
	//... snip ...
  	public function dispatch() {
    	$page = !empty($_GET["page"]) ? $_GET["page"] : "index";
    	$action = !empty($_GET["action"]) ? $_GET["action"] : "index";
    	$this->forward($page, $action);
  	}
}

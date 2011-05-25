<?php

abstract class Controller {
	private $request;
	
	public function getRequest() {
		if ($this->request == null) {
			$this->request = new Request();
		}
		return $this->request;
  	}
  
  	//public function getResponse() {}
  
  	public function getSession() {
    	return Session::getInstance();
  	}
	
  	public function forward($page, $action) {
    	//e.g. HomeController
    	$class = ucfirst($page) . "Controller";
    	    
    	//e.g. pages/home/HomeActions.php
    	$file = APP_ROOT . "application/controller/" . $class . ".php";  	
    	if (!file_exists($file)) {
      		$this->forward("error", "notFound");
      		exit();
    	}
        	
    	require_once $file;
    	$controller = new $class();
    	$controller->setName($page);
    	$controller->dispatchAction($action);
    	exit(0);
  	}
  	
  	public function redirect($page, $action) {
  		$location = APP_URL . 'index.php?page=' . $page . '&action=' . $action;
  		header('Location: ' . $location);
  	}
}

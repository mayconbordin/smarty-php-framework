<?php

require_once APP_ROOT . 'application/view/plugins/plugins.php';

abstract class ActionController extends Controller {
	protected $name;
  	protected $viewData = array();
  	protected $smarty;
  	protected $displayView = true;
  	
	public function __set($key, $value)  {
    	$this->setVar($key, $value);
  	}
  
  	public function __get($key) {
    	return $this->getVar($key);
  	}
  
  	public function setName($name) {
    	$this->name = $name;
  	}
  	
  	public function getName() {
    	return $this->name;
  	}
  
  	public function setVar($key, $value) {
    	$this->viewData[$key] = $value;
  	}
  
  	public function getVar($key) {
    	if (array_key_exists($key, $this->viewData)) {
      		return $this->viewData[$key];
    	}
  	}
  
  	public function dispatchAction($action) {
    	$actionMethod = lcfirst($action) . "Action";
    	if (!method_exists($this, $actionMethod)) {
      		$this->forward("error", "notFound");
      		exit();
    	}
    	$this->$actionMethod();
    	if ($this->displayView) $this->displayView($action);
    	$this->cleanUp();
  	}
  
  	public function displayView($action) {
  		$this->loadSmarty();

    	//Create variables for the template
    	foreach ($this->viewData as $key => $value) {
      		$this->smarty->assign($key, $value);
   	 	}
   	 	
   	 	$this->smarty->display($this->getName() . "/" . $action . '.tpl');
  	}
  	
  	protected function cleanUp() {
  		if (MySQLConnection::isOpen()) {
  			MySQLConnection::close();
  		}
  	}
  	
  	protected function loadSmarty() {
  		$this->smarty = new Smarty();
  		$this->smarty->debugging = (APP_ENV == "dev") ? true : false;
		$this->smarty->caching = SMARTY_CACHE;
		$this->smarty->cache_lifetime = SMARTY_CACHE_LIFE;

  		$this->smarty->setTemplateDir(APP_ROOT . 'application/view/templates');
		$this->smarty->setCompileDir(APP_ROOT . 'application/view/templates_c');
		$this->smarty->setCacheDir(APP_ROOT . 'application/view/cache');
		$this->smarty->setConfigDir(APP_ROOT . 'application/view/configs');

		// Register Smarty Plugins
		$this->smarty->registerPlugin("function", "url", "url");
		$this->smarty->registerPlugin("function", "action", "action");
  	}
}

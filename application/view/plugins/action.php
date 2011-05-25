<?php

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     action.php
 * Type:     function
 * Name:     action
 * Purpose:  add an action
 * -------------------------------------------------------------
 */
function action($params, $template)
{
	$page = $params['controller'];
	$action = $params['name'];
	
	//e.g. HomeController
    $class = ucfirst($page) . "Controller";
    	    
    //e.g. pages/home/HomeActions.php
    $file = APP_ROOT . "application/controller/" . $class . ".php";  	
    if (!file_exists($file)) {
      	return null;
    }
        	
    require_once $file;
    $controller = new $class();
    $controller->setName($page);
    $controller->dispatchAction($action);
}
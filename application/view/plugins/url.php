<?php

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     url.php
 * Type:     function
 * Name:     url
 * Purpose:  parses an url
 * -------------------------------------------------------------
 */
function url($params, $template)
{
    $controller = $params['controller'];
    $action = $params['action'];
    
    $url = APP_URL . 'index.php?page=' . $controller . '&action=' . $action;
    
    return $url;
}
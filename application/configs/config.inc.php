<?php

/* Application folder name and root path */
define("APP_NAME", "geo");
define("APP_ROOT", $_SERVER['DOCUMENT_ROOT']
				   . implode('/',array_slice(explode('/',$_SERVER['PHP_SELF']),0,-2)) 
				   . '/'
);
define("APP_URL", "http://localhost/geo/public/");

require_once APP_ROOT . '/application/configs/autoloader.php';
				   
/* Database configuration */
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "geo");

/* Application Environment:
 * 
 * dev = development
 * prod = production
 */
define("APP_ENV", "prod");

/* Smarty configuration */
define("SMARTY_CACHE", false);
define("SMARTY_CACHE_LIFE", 120);

/* Facebook API */
define("FB_APP_ID", "");
define("FB_APP_SECRET", "");

/* Cookies and Sessions */
define("USER_SESSION", "user_session");
define("REMEMBER_COOKIE", "remember_me");
define("REMEMBER_EXPIRE", 3600);

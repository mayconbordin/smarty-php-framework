<?php

spl_autoload_register('spl_autoload_custom');

/**
 * Does the same as spl_autoload, but without lowercasing
 */
function spl_autoload_custom($name)
{
	$rc = FALSE;
	
	$exts = explode(',', spl_autoload_extensions());
	$sep = (substr(PHP_OS, 0, 3) == 'Win') ? ';' : ':';
	$paths = explode($sep, ini_get('include_path'));
	foreach($paths as $path) {
		foreach($exts as $ext) {
			$file = $path . DIRECTORY_SEPARATOR . $name . $ext;
			if(is_readable($file)) {
				require_once $file;
				$rc = $file;
				break;
			}
		}
	}
	
	return $rc;
}

class autoloader {

    public static $loader;

    public static function init()
    {
        if (self::$loader == NULL)
            self::$loader = new self();

        return self::$loader;
    }

    public function __construct()
    {    	
    	set_include_path(
    		get_include_path()
    		. PATH_SEPARATOR . APP_ROOT . 'library/'
    		. PATH_SEPARATOR . APP_ROOT . 'library/smarty/'
    		. PATH_SEPARATOR . APP_ROOT . 'library/facebook/'
    		. PATH_SEPARATOR . APP_ROOT . 'library/canvas/'
    		. PATH_SEPARATOR . APP_ROOT . 'library/gravatar/'
    		. PATH_SEPARATOR . APP_ROOT . 'application/controller/'
    		. PATH_SEPARATOR . APP_ROOT . 'application/controller/helpers/'
    		. PATH_SEPARATOR . APP_ROOT . 'application/utils/auth'
    		. PATH_SEPARATOR . APP_ROOT . 'application/utils/controller'
    		. PATH_SEPARATOR . APP_ROOT . 'application/utils/database'
    		. PATH_SEPARATOR . APP_ROOT . 'application/utils/datamapper'
    		. PATH_SEPARATOR . APP_ROOT . 'application/model/'
    	);
    	
    	spl_autoload_extensions(".inc,.php,.lib,.lib.php,.class.php");
    	spl_autoload_register(array($this,'loader'));
        
    }

    public function loader($class)
    {
        spl_autoload($class);
    }
}

//call
autoloader::init();

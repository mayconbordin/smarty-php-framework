<?php

class Cookie
{
	public static function setCookie($name, $value = null, $expire = 0, $path = null, $domain = null, $secure = false, $httponly = false)
	{
		return setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
	}
	
	/**
	 * Get an existent cookie.
	 * 
	 * @param string $name The name of the cookie.
	 * @return string|null
	 */
	public static function getCookie($name)
	{
		if (isset($_COOKIE[$name])) {
			return $_COOKIE[$name];
		} else {
			return null;
		}
	}
	
	/**
	 * Checks if an cookie exists.
	 * 
	 * @param string $name
	 * @return bool
	 */
	public static function cookieExists($name)
	{
		if (isset($_COOKIE[$name])) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Delete an existent cookie.
	 * 
	 * @param string $name
	 * @return bool
	 */
	public static function deleteCookie($name)
	{
		return setcookie ($name, "", time() - 3600);
	}
}
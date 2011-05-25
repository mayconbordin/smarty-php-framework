<?php

class FacebookManager {
	private $api;
	private static $instance;
	
	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function __construct() {
		$this->api = new Facebook(array(
  			'appId'  => FB_APP_ID,
  			'secret' => FB_APP_SECRET,
  			'cookie' => true,
		));
	}
	
	public function getApi() {
		return $this->api;
	}
	
	public function getApiSession() {
		return $this->api->getSession();
	}
	
	public function getLoggedUser() {
		$session = $this->api->getSession();
		
		if ($session) {
  			try {
    			return $this->api->api('/me');
  			} catch (FacebookApiException $e) {
    			return null;
  			}
		} else {
			return null;
		}
	}
	
	public function getLoginUrl() {
		return $this->api->getLoginUrl(array('req_perms' => 'email'));
	}
	
	public function getLogoutUrl() {
		return $this->api->getLogoutUrl();
	}
}

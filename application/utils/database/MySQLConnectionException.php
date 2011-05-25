<?php

class MySQLConnectionException extends Exception {
	public function __construct($message) {
		$this->message = $message;
	}
}
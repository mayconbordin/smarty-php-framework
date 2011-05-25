<?php

class DataMapperException extends Exception {
	public function __construct($message) {
		$this->message = $message;
	}
}
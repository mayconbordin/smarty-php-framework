<?php

class MySQLConnection {
	private static $connection;

	public static function getConnection() {
		if (!self::$connection){ 
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		}
		
		if (mysqli_connect_errno()) {
			throw new MySQLConnectionException("Connect failed: " . mysqli_connect_error());
		}
		
		if (!self::$connection->set_charset("utf8")) {
		    printf("Error loading character set utf8: %s\n", self::$connection->error);
		}

		return self::$connection; 
	}
	
	public static function isOpen() {
		return (self::$connection) ? true : false;
	}
	
	public static function close() {
		self::$connection->close();
		self::$connection = null;
	}
}

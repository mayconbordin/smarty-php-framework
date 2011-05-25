<?php

abstract class AbstractDataMapper {
	protected $db;
	
	public function AbstractDataMapper() {
		$this->db = MySQLConnection::getConnection();
	}
	
	protected function cleanInputs() {
		$inputs = array();
		
		$arg_count = func_num_args();
		$counter = 0;
		while ($counter < $arg_count) {
			$inputs[$counter] = $this->db->real_escape_string(func_get_arg($counter));
			$counter++;
		}
		return($inputs);
	}
}

<?php

/**
Author : 	Anthony Domps
Version :	1
Date :		24/03/2021
**/

class SQLInsert {

	private $table = null;
	private $values = [];

	public function setTable(string $tableName):void {
		
		$this->table = $tableName;
		
	}

	public function addValues(array $values):void {
		
		foreach($values as $key=>$value) {
			if(is_string($value)) $values[$key]="'$value'";
		}
		$this->values=$values;
		
	}

	public function getSQL():string {
		
		$fields = implode(",", array_keys($this->values));
		$values = implode(",", $this->values);
		
		return "INSERT INTO {$this->table} ($fields) VALUES ($values)";
		
	}
	
}

?>

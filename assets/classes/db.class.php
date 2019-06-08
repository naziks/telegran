<?php

class xDB{
	private $d;

	public function __construct($config){
		$this->d = new PDO('mysql:host='.$config['host'].';dbname='.$config['database_name'], $config['username'], $config['password']);
		$this->d->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function runQuery($query = "", $params = [], $return = false){
		if(empty($query)) return false;

		$res = $this->d->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$res->execute($params);
		
		if($return == false) return true;
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

}
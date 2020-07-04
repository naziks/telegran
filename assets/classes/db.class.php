<?php
/**
 * Database Class
 *
 * @author     Naziks <mail4nazarko@gmail.com>
 * @copyright  2019 - Naziks
 * @version    1.1
 * @link       https://github.com/naziks/TGbot-template
 */


<?php

class xDB{
	private $d;
	private $last_query_error;

	// Init
	public function __construct($config, $debug = true){
		if(!!array_diff(["hostname", "db", "username", "password"], array_keys($config))) return die('ERROR:0:INVALID DB CONFIG');
		$config_string = sprintf('mysql:host=%s;dbname=%s', $config['hostname'], $config['db']);

		if($debug){$debug=Array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);}else{$debug=Array();}

		$this->d = new PDO($config_string, $config['username'], $config['password'], $debug);
		$this->d->exec("set names utf8");
	}

	// Processor
	private function runQuery($q, $params = [], $return = false){
		$res = $this->d->prepare($q, Array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$res->execute($params);
		$this->last_query_error = $res->errorInfo();

		if($return == false) return ["return"=>false];
		return $res->fetchAll(PDO::FETCH_ASSOC);
	}

	// Get last error
	public function getLastError(){
		return $this->last_query_error;
	}

	// Get db
	public function getDB(){
		return $this->d;
	}

	// NOT RETURN ANYTHING | Insert/update/etc
	public function setQuery($q, $params = []){
		return $this->runQuery($q, $params);
	}

	// RETURN ARRAY | Update
	public function getQuery($q, $params = []){	
		return $this->runQuery($q, $params, true);
	}
}

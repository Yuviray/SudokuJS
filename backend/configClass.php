<?php

namespace Tester;
class ConfigClass {
 
	private $host;
    private $root;
	private $pass;
	private $db;
 
	function __construct( $host, $root, $pass, $db) {
		$this->host = $host;
		$this->root = $root;
		$this->pass = $pass;
        $this->db = $db;
	}
 
	function getHost() {
		return $this->host;
	}
    function getRoot() {
		return $this->root;
	}
	function getPass() {
		return $this->pass;
	}
    function getDb() {
		return $this->db;
	}
 
	
 
}
?>
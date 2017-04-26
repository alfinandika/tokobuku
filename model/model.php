<?php
class model {
	function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=tokobuku', 'root', '');
	}
}
?>
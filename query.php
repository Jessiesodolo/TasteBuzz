<?php
	
	require '/config.php';
	
	function getDBConn(){
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	function getRandomDrink(){
		$dbconn = getDBConn();
		$id_range = $dbconn->query("SELECT COUNT(*) FROM `dnames`")->rowCount();
		$to_select = rand(0,$id_range);
		$drink = $dbconn-query("SELECT `dname` FROM `dnames` WHERE `id` = $to_select")->fetch();
		echo "{\"drink_name\" : \"$drink[\"dname\"]\"}";
	}
	
	function getBestDrink(){
	}
	
	function getSortedDrinks(){
	}
	
	function addPref(){
	}
	
	function removePref(){
	}
	
	function getAllDrinks(){
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_SESSION['login'] == true){
			switch($_POST["action"]){
				case "getRandomDrink":
					getRandomDrink();
					break;
				case "getBestDrink"
					getBestDrink();
					break;
				case "getSortedDrinks"
					getSortedDrinks();
					break;
				case "addPref"
					addPref();
					break;
				case "removePref"
					removePref();
					break;
				case "getAllDrinks"
					getAllDrinks();
					break;
			}
		}
	}
?>
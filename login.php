<?php
	
	require '/config.php';
	
	function getDBConn(){
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	function doLogin(){
		$dbcon = getDBConn();
	}
	
	function doRegister(){
	}
	
	function validatePost(){
		switch($_POST["action"]){
			case "login":
				if(isset($_POST["email"]) && isset($_POST["password"]))
					return true;
				return false;
			case "register":
				if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["password"]) && isset($_POST["email"]))
					return true;
				return false;
		}
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(validatePost()){
			switch($_POST["action"]){
				case "login":
					doLogin();
					break;
				case "register"
					doRegister();
					break;
			}
		}
	}
?>
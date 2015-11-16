<?php
	
	require '/config.php';
	
	function getDBConn(){
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	function doLogin(){
		$dbcon = getDBConn();
		stmt = $dbcon->prepare("SELECT `pword` from `users` WHERE `email` = :email");
		$stmt->bindParam(':email', $_POST["email"]);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			//There should only ever be one row retrieved since no user should be able to
			//register with the same email
			$row = $stmt->fetch();
			if(password_verify($_POST["password"],$row["pword"])){
				//WE did it fam
			} else {
				//Invalid password
			}
		} else {
			//That email was not found since no rows were returned
		}
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
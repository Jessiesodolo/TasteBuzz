<?php
	
	
	
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config["DB_NAME"],$config["DB_USERNAME"],$config["DB_PASSWORD"]);
	}
	
	function doLogin(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("SELECT `id`,`pword`,`fname`,`admin` from `users` WHERE `email` = :email");
		$stmt->bindParam(':email', $_POST["email"]);
		$stmt->execute();
		if($stmt->rowCount() == 1) {
			//There should only ever be one row retrieved since no user should be able to
			//register with the same email
			$row = $stmt->fetch();
			if(password_verify($_POST["password"],$row["pword"])){
				//WE did it fam
				$_SESSION['login'] = true;
				$_SESSION['fname'] = $row["fname"];
				$_SESSION['uid'] = $row["id"];
				$_SESSION['admin'] = $row["admin"];
				header('Location: index.php');
				die();
			} else {
				//Invalid password
				$_SESSION['login'] = false;
				header('Location: index.php');
			}
		} else {
			//That email was not found since no rows were returned
			$_SESSION['login'] = false;
			header('Location: index.php');
		}
	}
	
	function doLogout(){
		if(isset($_SESSION["login"]){
			if($_SESSION["login"] == true){
				session_destroy();
			}
		}
		header("Location: index.php");
	}
	
	function doRegister(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("SELECT `fname` from `users` WHERE `email` = :email");
		$stmt->bindParam(':email', $_POST["email"]);
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			//A user with that email already exists
			$_SESSION['registered'] = false;
			header('Location: index.php');
		} else {
			//No user exists so we can register
			$pword_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
			$stmt = $dbcon->prepare("INSERT INTO `users` (fname,lname,email,pword,admin) VALUES (:fname,:lname,:email,:pword,FALSE)");
			$stmt->bindParam(':fname', $_POST["fname"]);
			$stmt->bindParam(':lname', $_POST["lname"]);
			$stmt->bindParam(':email', $_POST["email"]);
			$stmt->bindParam(':pword', $pword_hash);
			$stmt->execute();
			$_SESSION['registered'] = true;
			header('Location: index.php');
		}
	}
	
	function validatePost(){
		switch($_POST["function"]){
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
			session_start();
			switch($_POST["function"]){
				case "login":
					doLogin();
					break;
				case "register":
					doRegister();
					break;
				case "logout":
					doLogout();
					break;
			}
		}
	}
?>
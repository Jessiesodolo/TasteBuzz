<?php
	
	/*
		This is a method to retrieve a PDO connection to the database specified in the config.php file
	*/
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config["DB_NAME"],$config["DB_USERNAME"],$config["DB_PASSWORD"]);
	}
	
	/*
		This function is used when a user attempts to login.  This function assumes that a form POST request was used to access this page.
		-It draws the user's email and password from the post body
		-It uses prepared statements to avoid SQL injection
		-It uses the session super global to store relevent data about the user's session
		-It uses header redirection to redirect the user back to index.php
		-No die() is needed after the header redirect since the script simply terminates directly afterward anyway
	*/
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
				$_SESSION['login'] = true; //Set the login state to true
				$_SESSION['fname'] = $row["fname"]; //Used to personalize various pages
				$_SESSION['uid'] = $row["id"]; //Used in queries later to quickly retrieve user prefs
				$_SESSION['admin'] = $row["admin"]; //A flag for whether or not the user is an admin
				header('Location: index.php');
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
	
	/*
		This function handles logging the user out
		-Resets all session globals
		-Destroys the session
		-It uses header redirection to redirect the user back to index.php
		-No die() is needed after the header redirect since the script simply terminates directly afterward anyway
	*/
	function doLogout(){
		if(isset($_SESSION["login"])){
			if($_SESSION["login"] == true){
				$_SESSION = array();
				$_SESSION['login'] = false;
				session_destroy();
			}
		}
		header("Location: index.php");
	}
	
	/*
		This function is used to register a new user
		-It expects the user's first name, last name, email, and password to be supplied in the post body
		-It uses PHP's builtin password_hash() function to safely salt and hash the password
		-It uses prepared statements to avoid SQL injection
		-It uses header redirection to redirect the user back to index.php
		-No die() is needed after the header redirect since the script simply terminates directly afterward anyway
	*/
	function doRegister(){
		if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			$_SESSION['registered'] = false;
			$_SESSION['msgToUser'] = "Please enter a valid email!";
			header('Location: register.php');
			die();
		}
		if($_POST["password"] != $_POST["password2"]){
			$_SESSION['registered'] = false;
			$_SESSION['msgToUser'] = "Please make sure your passwords match!";
			header('Location: register.php');
			die();
		}
		if(strlen($_POST["password"]) < 8){
			$_SESSION['registered'] = false;
			$_SESSION['msgToUser'] = "Make sure your password is at least 8 characters";
			header('Location: register.php');
			die();
		}
		
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
	
	/*
		This is a safety check function to make sure the various POST parameters used in whichever above function
		was requested is set.
	*/
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
			case "logout":
				return true;
		}
	}
	
	/*
		Switchboard block for the login script.
		-Checks to make sure the POST request is valid
		-Switches to the correct function, expects the "function" flag to be set in the POST body
		-Generally methods in this script are accessed via a form POST request
	*/
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
<?php
	
	/*
		This is a method to retrieve a PDO connection to the database specified in the config.php file
	*/
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	/*
		This is an admin function to add a drink to the database
		-It expects a drink name, a drink descrption, and a uri/url to a image of the drink
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function addDrink(){
		$drinkName = $_POST["drinkName"];
		$drinkDesc = $_POST["drinkDesc"];
		$drinkURL = $_POST["drinkURL"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("INSERT INTO `dinfo` (dname,description,img_addr) VALUES (:dname,:description,:img_addr)");
		$stmt->bindParam(':dname', $drinkName);
		$stmt->bindParam(':description', $drinkDesc);
		$stmt->bindParam(':img_addr', $drinkURL);
		$stmt->execute();
		$count = $stmt->rowCount();
		header("Location: admin.php");
	}
	
	/*
		This is an admin function to add a drink trait to the database
		-It expects a drink id and a drink trait
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function addDrinkTrait(){
		$drinkTrait = $_POST["drinkTrait"];
		$drinkID = $_POST["drinkID"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("INSERT INTO `dtraits` (id,trait) VALUES (:id,:trait)");
		$stmt->bindParam(':id', $drinkID);
		$stmt->bindParam(':trait', $drinkTrait);
		$stmt->execute();
		$count = $stmt->rowCount();
		header("Location: admin.php");
	}
	
	/*
		This is an admin function to remove a drink trait from the database
		-It expects a drink trait num (the primary key in the dtraits table)
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function removeDrinkTrait(){
		$drinkTraitNum = $_POST["drinkTraitNum"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dtraits` WHERE traitnum = :tnum");
		$stmt->bindParam(':tnum', $drinkTraitNum);
		$stmt->execute();
		$count = $stmt->rowCount();
		header("Location: admin.php");
	}
	
	/*
		This is an admin function to get a list of user data		
		-Accessed via AJAX call
	*/
	function getUsers(){
		$dbconn = getDBConn();
		$sql = "SELECT * FROM `users`";
		$result = $dbconn->query($sql);
		echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
	}

	/*
		This is an admin function to get a list drink data		
		-Accessed via AJAX call
		-Avoids getting descriptions to not overflow string length
	*/
	function getDrinks(){
		$dbconn = getDBConn();
		$sql = "SELECT `id`,`dname` FROM `dinfo`";
		$toRet = array();
		foreach($dbconn->query($sql) as $dnameRow){
			$dID = $dnameRow["id"];
			$sql2 = "SELECT * FROM `dtraits` WHERE id = ".$dID;
			$traitsQ = $dbconn->query($sql2);
			array_push($toRet,array($dID,$dnameRow["dname"],$traitsQ->fetchAll(PDO::FETCH_ASSOC)));
		}
		echo json_encode($toRet);
	}
	
	/*
		This is an admin function to remove a user from the database, as well as their prefs
		-It expects a user id (primary key in users table)
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function removeUser(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `users` WHERE  id = :id");
		$stmt->bindParam(':id', $_POST['Userid']);
		$stmt->execute();
		$stmt2 = $dbcon->prepare("DELETE FROM `userprefs` WHERE id = :id");
		$stmt2->bindParam(':id', $_POST['Userid']); 
		$stmt2->execute();
		header("Location: admin.php");
	}

	/*
		This is an admin function to remove a drink from the database, as well as its traits
		-It expects a drink id (primary key in dinfo table)
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function removeDrink(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dinfo` WHERE id = :id");
		$stmt->bindParam(':id', $_POST["drinkID"]);
		$stmt->execute();
		$stmt2 = $dbcon->prepare("DELETE FROM `dtraits` WHERE id = :id");
		$stmt2->bindParam(':id',$_POST["drinkID"]);
		$stmt2->execute();
		header("Location: admin.php");
	}

	/*
		This is an admin function to make a user an admin
		-It expects a user id (primary key in users table)
		-It uses prepared statements to avoid sql injection
		-Accessed via form POST
	*/
	function addAdmin(){
		$dbconn = getDBConn();
		$stmt = $dbconn->prepare("UPDATE `users` SET admin= 1 WHERE id = :id");
		$stmt->bindParam(':id', $_POST['addadmin']);
		$stmt->execute();
		header("Location: admin.php");
	}

	/*
		Switchboard block for the admin script.
		-Checks to make sure the user is logged in and an admin
		-Switches to the correct function, expects the "action" flag to be set in the POST body
		-Generally methods in this script are accessed via a form POST request, but some are built to be used via AJAX
	*/
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		if(isset($_SESSION['login']) && $_SESSION['login'] == true && $_SESSION['admin'] == 1){
			switch($_POST["action"]){
				case "addDrink":
					addDrink();
					break;
				case "addDrinkTrait":
					addDrink();
					break;
				case "removeDrink":
					removeDrink();
					break;
				case "removeDrinkTrait":
					removeDrinkTrait();
					break;
				case "removeUser":
					removeUser();
					break;
				case "getUsers":
					getUsers();
					break;
				case "AddAdmin":
					AddDrink();
					break;
				case "getDrinks":
					getDrinks();
					break;
				case "addAdmin":
					addAdmin();
					break;
				case "getDrinkNamesAndTraits":
					getDrinkNamesAndTraits();
					break;
			}
		}
	}
?>
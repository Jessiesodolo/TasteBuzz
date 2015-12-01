<?php
	
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
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
		$echo "{success : $count}";
	}
	
	function addDrinkTrait(){
		$drinkTrait = $_POST["drinkTrait"];
		$drinkID = $_POST["drinkID"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("INSERT INTO `dtraits` (id,trait) VALUES (:id,:trait)");
		$stmt->bindParam(':id', $drinkID);
		$stmt->bindParam(':trait', $drinkTrait);
		$stmt->execute();
		$count = $stmt->rowCount();
		$echo "{success : $count}";
	}
	
	function removeDrinkTrait(){
		$drinkTrait = $_POST["drinkTrait"];
		$drinkID = $_POST["drinkID"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dtraits` WHERE id = :id, trait = :trait");
		$stmt->bindParam(':id', $drinkID);
		$stmt->bindParam(':trait', $drinkTrait);
		$stmt->execute();
		$count = $stmt->rowCount();
		$echo "{success : $count}";
	}
	
	function removeDrink(){
		$drinkID = $_POST["drinkID"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dinfo` WHERE id = :id");
		$stmt->bindParam(':id', $drinkID);
		$stmt->execute();
		$count = $stmt->rowCount();
		
		$stmt2 = $dbcon->prepare("DELETE FROM `dtraits` WHERE id = :id");
		$stmt2->bindParam(':id', $drinkID);
		$stmt2->execute();
		$count2 = $stmt2->rowCount();
		
		$success = $count && $count2;
		
		$echo "{success : $success}";
	}
	
	function removeUser(){
		$userID = $_POST["uid"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `users` WHERE id = :id");
		$stmt->bindParam(':id', $userID);
		$stmt->execute();
		$count = $stmt->rowCount();
		
		$stmt2 = $dbcon->prepare("DELETE FROM `userprefs` WHERE id = :id");
		$stmt2->bindParam(':id', $userID);
		$stmt2->execute();
		$count2 = $stmt2->rowCount();
		
		$success = $count && $count2;
		
		$echo "{success : $success}";
	}
	
	function getUsers(){
		$uArray = array();
		foreach($dbconn->query("SELECT * FROM `users`") as $userRow){
			array_push($uArray,array($userRow["fname"],$userRow["lname"],$userRow["id"]));
		}
		echo json_encode($uArray);
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		if($_SESSION['login'] == true && $_SESSION['admin'] == 1){
			switch($_POST["action"]){
				case "addDrink":
					addDrink();
					break;
				case "addDrinkTrait":
					addDrink();
					break;
				case "removeDrink"
					removeDrink();
					break;
				case "removeDrinkTrait":
					removeDrinkTrait();
					break;
				case "removeUser"
					removeUser();
					break;
				case "getUsers":
					getUsers();
					break;
			}
		}
	}
?>
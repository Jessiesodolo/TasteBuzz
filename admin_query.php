<?php
	
	require '/config.php';
	
	function getDBConn(){
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	function addDrink(){
		$drinkName = $_POST["drinkName"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("INSERT INTO `dnames` (dname) VALUES (:dname)");
		$stmt->bindParam(':dname', $drinkName);
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
	
	function removeDrink(){
		$drinkID = $_POST["drinkID"];
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dnames` WHERE id = :id");
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
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_SESSION['login'] == true && $_SESSION['admin'] == 1){
			switch($_POST["action"]){
				case "addDrink":
					addDrink();
					break;
				case "removeDrink"
					removeDrink();
					break;
				case "removeUser"
					removeUser();
					break;
			}
		}
	}
?>
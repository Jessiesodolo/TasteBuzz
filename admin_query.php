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
		//$echo "{success : $count}";
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
		//$echo "{success : $count}";
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
		//$echo "{success : $count}";
	}
	
	
	function getUsers(){
		$dbconn = getDBConn();
		$sql = "SELECT * FROM `users`";
		$result = $dbconn->query($sql);
		echo json_encode($result->fetchAll());
	}

	function getDrinks(){
		$dbconn = getDBConn();
		$sql = "SELECT * FROM `dinfo`";
		$result = $dbconn->query($sql)->fetchAll();
		echo json_encode($result);
	}

	
	function removeUser(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `users` WHERE  fname = :fname AND lname = :lname");
		$stmt->bindParam(':fname', $_POST['firstName']);
		$stmt->bindParam(':lname', $_POST['lastName']); 
		$stmt->execute();

		$stmt2 = $dbcon->prepare("DELETE FROM `userprefs` WHERE id = :id");
		$stmt2->bindParam(':id', $_POST['Userid']); 
		$stmt2->execute();
	}


	function removeDrink(){
		$dbcon = getDBConn();
		$stmt = $dbcon->prepare("DELETE FROM `dinfo` WHERE dname = :dname");
		$stmt->bindParam(':dname', $_POST["drinkName"]);
		$stmt->execute();
		$stmt2 = $dbcon->prepare("DELETE FROM `dtraits` WHERE id = :id");
		$stmt2->bindParam(':id',$_POST["drinkID"]);
		$stmt2->execute();
	}

	function addAdmin(){
		$dbconn = getDBConn();
		$stmt = $dbconn->prepare("UPDATE `users` SET admin= 1 WHERE id = :id");
		$stmt->bindParam(':id', $_POST['addadmin']);
		$stmt->execute();
	}

	
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
				case "AddDr":
					AddDr();
					break;
				case "getDrinks":
					getDrinks();
					break;
				case "addAdmin":
					addAdmin();
					break;
			}
		}
	}
?>
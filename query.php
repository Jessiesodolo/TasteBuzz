<?php
	
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	function getRandomDrink(){
		$dbconn = getDBConn();
		$id_range = $dbconn->query("SELECT COUNT(*) FROM `dnames`")->rowCount();
		$to_select = rand(0,$id_range);
		$drink = $dbconn-query("SELECT `dname` FROM `dnames` WHERE `id` = $to_select")->fetch();
		echo "{\"drink_name\" : ".$drink["dname"]."}";
	}
	
	function getBestDrink(){
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		$userPreferences = $dbconn->query("SELECT * FROM `userprefs` WHERE id = ".$userID)->fetchAll();
		$bestSimilarity = 0;
		$bestDrink = null;
		foreach($dbconn->query("SELECT * FROM `dnames`") as $drinkNameRow){
			$drinkID = $drinkNameRow["id"];
			$drinkTraits = $dbconn->query("SELECT * FROM `traits` WHERE id = ".$drinkID)->fetchAll();
			//Array of format [[id,trait][id,trait]]
			$currentSimilarity = 0;
			foreach($userPreferences as $userP){
				foreach($drinkTraits as $drinkP){
					if($drinkP["trait"] == $userP["pref"]){
						$currentSimilarity++;
					}
				}
			}
			if($currentSimilarity > $bestSimilarity){
				$currentSimilarity = $bestSimilarity;
				$bestDrink = $drinkNameRow["dname"];
			}
		}
		echo "{\"drink_name\" : ".$bestDrink."}";
	}
	
	function getAllDrinks(){
		$dArray = array();
		foreach($dbconn->query("SELECT * FROM `dnames`") as $drinkNameRow){
			array_push($dArray,$drinkNameRow["dname"]);
		}
		echo json_encode($dArray);
	}
	
	function sortComparator($a,$b){
		$val1 = $a[1];
		$val2 = $b[1];
		if($val1 == $val2){
			return 0;
		}
		return ($val1 < $val2) ? -1 : 1;
	}
	
	function getSortedDrinks(){
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		$userPreferences = $dbconn->query("SELECT * FROM `userprefs` WHERE id = ".$userID)->fetchAll();
		$simArray = array();
		foreach($dbconn->query("SELECT * FROM `dnames`") as $drinkNameRow){
			$drinkID = $drinkNameRow["id"];
			$drinkTraits = $dbconn->query("SELECT * FROM `traits` WHERE id = ".$drinkID)->fetchAll();
			//Array of format [[id,trait][id,trait]]
			$currentSimilarity = 0;
			foreach($userPreferences as $userP){
				foreach($drinkTraits as $drinkP){
					if($drinkP["trait"] == $userP["pref"]){
						$currentSimilarity++;
					}
				}
			}
			array_push($simArray,array($drinkNameRow["dname"],$currentSimilarity));
		}
		usort($simArray,"sortComparator");
		echo json_encode($simArray);
	}
	
	function addPref(){
		$userID = $_SESSION['uid'];
		$dbconn = getDBConn();
		$newPref = $_POST["newPref"];
		$stmt = $dbconn->prepare("INSERT INTO `userprefs` (id,pref) VALUES (:userID,:newPref)");
		$stmt->bindParam(':userID', $userID);
		$stmt->bindParam(':newPref', $newPref);
		$stmt->execute();
		$count = $stmt->rowCount();
		echo "{success : $count}";
	}
	
	function removePref(){
		$userID = $_SESSION['uid'];
		$dbconn = getDBConn();
		$delPref = $_POST["delPref"];
		$stmt = $dbconn->prepare("DELETE FROM `userprefs` WHERE id = :userID, pref = :delPref");
		$stmt->bindParam(':userID', $userID);
		$stmt->bindParam(':delPref', $delPref);
		$stmt->execute();
		$count = $stmt->rowCount();
		echo "{success : $count}";
	}
	
	function getPreferences(){
		$uArray = array();
		$dbconn = getDBConn();
		foreach($dbconn->query("SELECT * FROM `userprefs` INNER JOIN `users` WHERE users.id = userprefs.id") as $userRow){
			array_push($uArray,$userRow["pref"]);
		}
		echo json_encode($uArray);
	}
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		if($_SESSION['login'] == true){
			switch($_POST["action"]){
				case "getRandomDrink":
					getRandomDrink();
					break;
				case "getBestDrink":
					getBestDrink();
					break;
				case "getSortedDrinks":
					getSortedDrinks();
					break;
				case "addPref":
					addPref();
					break;
				case "removePref":
					removePref();
					break;
				case "getAllDrinks":
					getAllDrinks();
					break;
				case "getPreferences":
					getPreferences();
					break;
			}
		}
	}
?>
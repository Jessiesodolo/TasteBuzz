<?php
	
	/*
		This is a method to retrieve a PDO connection to the database specified in the config.php file
	*/
	function getDBConn(){
		require '/config.php';
		return new PDO('mysql:host=localhost;dbname='.$config['DB_NAME'],$config['DB_USERNAME'],$config['DB_PASSWORD']);
	}
	
	/*
		This function returns the name of a randomly selected drink
		-Accessed via AJAX
	*/
	function getRandomDrink(){
		$dbconn = getDBConn();
		$id_range = $dbconn->query("SELECT COUNT(*) FROM `dinfo`")->rowCount();
		$to_select = rand(0,$id_range);
		$drink = $dbconn->query("SELECT `dname` FROM `dinfo` WHERE `id` = $to_select")->fetch();
		echo "{\"drink_name\" : ".$drink["dname"]."}";
	}
	
	/*
		A custom sort comparator function to sort arrays of format [[similarity,...],[similarity,...],...]
	*/
	function sortComparator($a,$b){
		$val1 = $a[0];
		$val2 = $b[0];
		if($val1 == $val2){
			return 0;
		}
		return ($val1 < $val2) ? 1 : -1;
	}
	
	/*
		The function returns all information about a randomly selected drink in the top 20 most similar drinks
		-Accessed via AJAX
	*/
	function getRandomBestDrink(){
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		$userPreferences = $dbconn->query("SELECT * FROM `userprefs` WHERE id = ".$userID)->fetchAll();
		$simArray = array();
		foreach($dbconn->query("SELECT * FROM `dinfo`") as $drinkNameRow){
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
		$top20 = array_slice($simArray,0,20);
		$randElement = array_rand($top20,1);
		echo json_encode($randElement[0]);
	}
	
	/*
		The function returns all information about all drinks sorted by their similarity to the current user
		-Accessed via AJAX
	*/
	function getSortedDrinks(){
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		$userPreferences = $dbconn->query("SELECT * FROM `userprefs` WHERE `id` = ".$userID)->fetchAll();
		$simArray = array();
		foreach($dbconn->query("SELECT * FROM `dinfo`") as $drinkNameRow){
			$drinkID = $drinkNameRow["id"];
			$drinkTraits = $dbconn->query("SELECT * FROM `dtraits` WHERE id = ".$drinkID)->fetchAll();
			//Array of format [[id,trait][id,trait]]
			$currentSimilarity = 0;
			foreach($userPreferences as $userP){
				foreach($drinkTraits as $drinkP){
					if($drinkP["trait"] == $userP["pref"]){
						$currentSimilarity+=1;
					}
				}
			}
			array_push($simArray,array($currentSimilarity,$drinkNameRow["dname"],$drinkNameRow["img_addr"]));
		}
		usort($simArray,"sortComparator");
		echo json_encode(array_slice($simArray,0,10));
	}
	
	/*
		The function returns all information about the best drink for the current user
		-Accessed via AJAX
	*/
	function getBestDrink(){
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		$userPreferences = $dbconn->query("SELECT * FROM `userprefs` WHERE `id` = ".$userID)->fetchAll();
		$simArray = array();
		foreach($dbconn->query("SELECT * FROM `dinfo`") as $drinkNameRow){
			$drinkID = $drinkNameRow["id"];
			$drinkTraits = $dbconn->query("SELECT * FROM `dtraits` WHERE id = ".$drinkID)->fetchAll();
			//Array of format [[id,trait][id,trait]]
			$currentSimilarity = 0;
			foreach($userPreferences as $userP){
				foreach($drinkTraits as $drinkP){
					if($drinkP["trait"] == $userP["pref"]){
						$currentSimilarity+=1;
					}
				}
			}
			array_push($simArray,array($currentSimilarity,$drinkNameRow["dname"],$drinkNameRow["img_addr"],$drinkTraits,$drinkNameRow["description"]));
		}
		usort($simArray,"sortComparator");
		$bestDrink = $simArray[0];
		echo "{\"dname\" : \"".$bestDrink[1]."\", \"drink_traits\" : ".json_encode($bestDrink[3]).", \"description\" : \"".$bestDrink[4]."\", \"img_addr\" : \"".$bestDrink[2]."\"}";
	}
	
	/*
		The function returns all information about a given drink
		-Accessed via AJAX
		-Drink name passed via post body
		-Uses prepared statements to protect against SQL injection
	*/
	function getDrinkInfo(){
		$dbconn = getDBConn();
		$drinkName = $_POST["drinkName"];
		$stmt = $dbconn->prepare("SELECT * FROM `dinfo` WHERE `dname` = :dname");
		$stmt->bindParam(':dname', $drinkName);
		$stmt->execute();
		echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
	}
	
	/*
		The function returns all traits for a given drink
		-Accessed via AJAX
		-Drink name passed via post body
		-Uses prepared statements to protect against SQL injection
	*/
	function getDrinkTraits(){
		$drinkName = $_POST["drinkName"];
		$stmt = $dbconn->prepare("SELECT `id` FROM `dinfo` WHERE `dname` = :dname");
		$stmt->bindParam(':dname', $drinkName);
		$stmt->execute();
		$did = $stmt->fetch()["id"];
		$traitArr = array();
		foreach($dbconn->query("SELECT `trait` FROM `dtraits` WHERE `id` = ".$did) as $row){
			array_push($traitArr,$row["trait"]);
		}
		echo json_encode($dArray);
	}
	
	/*
		The function returns the name and image address of all drinks
		-Accessed via AJAX
	*/
	function getAllDrinks(){
		$dbconn = getDBConn();
		$dArray = array();
		foreach($dbconn->query("SELECT * FROM `dinfo`") as $drinkNameRow){
			array_push($dArray,array($drinkNameRow["dname"],$drinkNameRow["img_addr"]));
		}
		echo json_encode($dArray);
	}
	
	/*
		The function allows the user to add a preference
		-Accessed via AJAX
		-New preference passed via post body
		-Uses prepared statements to protect against SQL injection
	*/
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
	
	/*
		The function allows the user to remove a preference
		-Accessed via AJAX
		-Old preference passed via post body
		-Uses prepared statements to protect against SQL injection
	*/
	function removePref(){
		$userID = $_SESSION['uid'];
		$dbconn = getDBConn();
		$delPref = $_POST["delPref"];
		$stmt = $dbconn->prepare("DELETE FROM `userprefs` WHERE `id` = :userID AND `pref`= :delPref");
		$stmt->bindParam(':userID', $userID);
		$stmt->bindParam(':delPref', $delPref);
		$stmt->execute();
		$count = $stmt->rowCount();
		echo "{success : $count}";
	}
	
	/*
		The function returns all current user preferences
		-Accessed via AJAX
	*/
	function getPreferences(){
		$uArray = array();
		$dbconn = getDBConn();
		$userID = $_SESSION['uid'];
		foreach($dbconn->query("SELECT * FROM `userprefs` WHERE id = ".$userID) as $userRow){
			array_push($uArray,$userRow["pref"]);
		}
		echo json_encode($uArray);
	}

	/*
		The function allows the user to search via a keyword
		-Accessed via AJAX
		-Uses prepared statements to protect against SQL injection
	*/	
	function doSearch(){
		$dbconn = getDBConn();
		$searchTerm = $_POST["searchTerm"];
		$stmt = $dbconn->prepare("SELECT `dname` FROM `dinfo` INNER JOIN `dtraits` ON dtraits.id = dinfo.id AND dtraits.trait LIKE :trait");
		$stmt->bindParam(":trait",$searchTerm);
		$stmt->execute();
		echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
	}
	
	/*
		This function returns the number of pages of drinks there are based on a limit of 10 drinks per page
		-Used for pagination
	*/
	function getNumPages(){
		$sql = "SELECT COUNT(*) FROM `dinfo`";
		$dbconn = getDBConn();
		$numEntries = $dbconn->query($sql)->fetchAll();

		echo json_encode($numEntries[0][0]/10);
	}
	
	/*
		This function returns the requested page
		-Used for pagination
	*/
	function getPage(){
		$NUMPERPAGE = 10;
		$pageToGet = intval($_POST["pageNumber"]);
		$pageToGet--;
		$sql = "SELECT * FROM `dinfo`";
		$dbconn = getDBConn();
		$numEntries = $dbconn->query($sql)->rowCount();
		$numPages = (int)$numEntries/$NUMPERPAGE;
		if($pageToGet < $numPages && $pageToGet >= 0){
			$startIndex = $pageToGet*$NUMPERPAGE;
			$sql2 = "SELECT `dname` FROM `dinfo` LIMIT :numPerPage OFFSET :start";
			$drinkInfo = $dbconn->prepare($sql2);
			$drinkInfo->bindParam(":numPerPage", $NUMPERPAGE, PDO::PARAM_INT);
			$drinkInfo->bindParam(":start", $startIndex, PDO::PARAM_INT);
			$drinkInfo->execute();
			$drinkInfoResult = $drinkInfo->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($drinkInfoResult);
		}
	}

	/*
		Switchboard block for the query script.
		-Checks to make sure the user is logged in
		-Switches to the correct function, expects the "action" flag to be set in the POST body
		-Generally methods in this script are accessed via AJAX
		-Some methods can be accessed without the user being logged in
	*/
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		session_start();
		if(isset($_SESSION["login"])){
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
					case "getDrinkTraits":
						getDrinkTraits();
						break;
					case "getDrinkInfo":
						getDrinkInfo();
						break;
					case "getRandomBestDrink":
						getRandomBestDrink();
						break;
					case "doSearch":
						doSearch();
						break;
					case "getNumPages":
						getNumPages();
						break;
					case "getPage":
						getPage();
						break;
				}
			}else{
				switch($_POST["action"]){
					case "getAllDrinks":
						getAllDrinks();
						break;
					case "getNumPages":
						getNumPages();
						break;
					case "getPage":
						getPage();
						break;
					case "doSearch":
						doSearch();
						break;
					case "getDrinkInfo":
						getDrinkInfo();
						break;
				}
			}
		}else{
			switch($_POST["action"]){
				case "getAllDrinks":
					getAllDrinks();
					break;
				case "getNumPages":
					getNumPages();
					break;
				case "getPage":
					getPage();
					break;
				case "doSearch":
					doSearch();
					break;
				case "getDrinkInfo":
					getDrinkInfo();
					break;
			}
		}
	}
?>
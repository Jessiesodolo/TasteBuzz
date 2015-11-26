<?php
	function addDrink(){
	}
	
	function removeDrink(){
	}
	
	function removeUser(){
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
<?php

	
	
	// polnud aega et seda korrektselt teha teha
	$mysqli = new mysqli("localhost", "root", "root", "uksed");
	$mysqli->set_charset("utf8");

	
	
	function checkCardAndDoor($card_nr, $door_nr){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT card_doors.id, cards.expiration FROM card_doors 
									INNER JOIN cards ON
									card_doors.card_nr=cards.card_nr
									WHERE card_doors.card_nr=? AND door_nr=?");
		$stmt->bind_param("ii", $card_nr, $door_nr);
		$stmt->bind_result($id_db, $exp_db);
		$stmt->execute();
		$results = array();
		if($stmt->fetch()){
			array_push($results, $id_db);
			array_push($results, $exp_db);
		} else {
			array_push($results, 0);
			array_push($results, 0);
		}
		return $results;
		
		/*if($stmt->fetch()){
			array_push($results);*/
	}




	
	function checkIfADoorExists($door_nr){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT door_nr FROM doors WHERE door_nr=?");
		$stmt->bind_param("i", $door_nr);
		$stmt->bind_result($door_nr_db);
		$stmt->execute();
		$result = 0;
		if($stmt->fetch()){
			$result = $door_nr_db;
		}
		return $result;
	}
	

	
/*
	function checkDoors(){
		global $mysqli;
		//"$stmt = $mysqli->prepare(SELECT door_nr FROM doors WHERE door_nr=?)"
		
		$stmt->bind_param();
*/	
	
	
	
	
	//et kaart oleks olemas
	unction checkIfACardExists($card_nr){
		global $mysqli;
		$stmt = $mysqli->prepare("SELECT card_nr FROM cards WHERE card_nr=?");
		$stmt->bind_param("i", $card_nr);
		$stmt->bind_result($card_nr_db);
		$stmt->execute();
		$result = 0;
		if($stmt->fetch()){
			$result = $card_nr_db;
		}
		return $result;
	}
	
	
?>
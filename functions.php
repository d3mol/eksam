<?php

	
	
	
	$mysqli = new mysqli("localhost", "root", "root", "uksed");
	$mysqli->set_charset("utf8");

	
	
	function checkCardAndDoor($card_nr, $door_nr){
		global $mysqli;
		
		$stmt = $mysqli->prepare("SELECT card_doors.id, cards.expiration FROM card_doors 
									INNER JOIN cards ON
									card_doors.card_nr=cards.card_nr
									WHERE card_doors.card_nr=? AND door_nr=?");
		
	}	







?>
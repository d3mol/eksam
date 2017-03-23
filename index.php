<?php



require_once("functions.php");
	
	// Otsingu kontroll
	if(isset($_GET["search"])){
		$card_check = checkIfACardExists($_GET["search_card_nr"]);
		$door_check = checkIfADoorExists($_GET["search_door_nr"]);
		if($card_check == 0){
			// chekib kaarti
			$msg = "Kaarti numbriga ".$_GET["search_card_nr"]." ei ole olemas!";
			header("Location: index.php?msg={$msg}");
		} elseif($door_check == 0) {
			// check uks
			$msg = "Ust numbriga ".$_GET["search_door_nr"]." ei ole olemas!";
			header("Location: index.php?msg={$msg}");
		} else {

			// premissin check
			$rights_check = checkCardAndDoor($_GET["search_card_nr"], $_GET["search_door_nr"]);
			
			
			if($rights_check[0] != 0){
				
				//echo "Korras";
				if(!empty($rights_check[1])){
					
					if(date("Y-m-d") > date("Y-m-d", strtotime($rights_check[1]))) {
						
						$msg_date = date("d.m.Y", strtotime($rights_check[1]));
						$msg = "Kaart number ".$_GET["search_card_nr"]." sai ust number ".$_GET["search_door_nr"]." avada, aga kehtivus sai {$msg_date} läbi.";
						header("Location: index.php?msg={$msg}");
					} else {
						// not
						
					}
				}
			}
		}
	}










/*
	if(isset($_GET["search"])){
		
		$card_check = checkIfACardExists($_GET["search_card_nr"]);
		$door_check = checkIfADoorExists($_GET["search_door_nr"]);
	
	if($card_check == 0){
		// kontroll kas kaart on olemas
		//$msg = "kaarti numbriga".$_GET["search_card_nr"]."pole";
		
*/	
	
	
	
	
	
	
	
	
	
	
	
	
	



?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uksed</title>
	
</head>
<body>
		
		<h1>Uksed</h1>
		<h2>Kaardi õiguse kontroll</h2>
			<?php
				// msgg teave
				if(isset($_GET["msg"])){
					echo "<div class='msg_display'>{$_GET["msg"]}</div>";
				}
			?>
		<form action="index.php" method="get">
			<input type="text" name="search_card_nr" placeholder="Kaardi number">
			<input type="text" name="search_door_nr" placeholder="Ukse number">
			<input type="submit" name="search" value="Kontrolli">
		</form>
	
	<br>
		Kaart: 1 Ukse number: 5 ja 7, aegumatu<br>
		Kaart: 20003000 Ukse number: 6, kehtivus läbi<br>
		Kaart: 20003001 Ukse number: 5, kehtib<br>
	
	 <a href="login.php">logi sisse</a> 
	 
	
</body>
</html>
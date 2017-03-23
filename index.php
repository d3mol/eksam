<?php

require_once("functions.php");

	if(isset($_GET["search"])){
		
		$card_check = checkIfACardExists($_GET["search_card_nr"]);
		$door_check = checkIfADoorExists($_GET["search_door_nr"]);
	
	if($card_check == 0){
		// kontroll kas kaart on olemas
		//$msg = "kaarti numbriga".$_GET["search_card_nr"]."pole";
		
	} elseif($door_check == 0) {
		// kontroll kas uks on olemas
	}
	
	
	
	
	
	
	
	
	
	
	
	
	}



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
				// msg teade
				/*if(isset($_GET["msg"])){
					echo "{$_GET["msg"]}";
				}*/
			?>
		<form action="index.php" method="get">
			<input type="text" name="search_card_nr" placeholder="Kaardi number">
			<input type="text" name="search_door_nr" placeholder="Ukse number">
			<input type="submit" name="search" value="Kontrolli">
		</form>
	
	

	
</body>
</html>
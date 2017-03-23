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
						$msg_date = date("d.m.Y", strtotime($rights_check[1]));
						$msg = "Kaart number ".$_GET["search_card_nr"]." saab ust number ".$_GET["search_door_nr"]." avada ja see kehtib kuni {$msg_date}.";
						header("Location: index.php?msg={$msg}");
					}
				} else {
					// lõpmatu kehtivusega
					$msg = "Kaart number ".$_GET["search_card_nr"]." saab ust number ".$_GET["search_door_nr"]." avada.";
					header("Location: index.php?msg={$msg}");				
				}
			} else {
				$msg = "Kaart number ".$_GET["search_card_nr"]." ei saa ust number ".$_GET["search_door_nr"]." avada.";
				header("Location: index.php?msg={$msg}");
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
	<style>
		table, th, td {
			border: 1px solid black;
		}
	</style>
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
	
	
	 
	 
	<table style="width:40%">
		<tr>
			<th>kaardi nr</th>
			<th>ukse nr</th>
			<th>kehtivus</th>
		</tr>
		<tr>
			<td>1</td>
			<td>5</td>
			<td>aegumatu</td>
		</tr>
		<tr>
			<td>1</td>
			<td>7</td>
			<td>aegumatu</td>
		</tr>
		<tr>
			<td>20003000</td>
			<td>6</td>
			<td>läbi</td>
		</tr>
		<tr>
			<td>20003001</td>
			<td>5</td>
			<td>kehtib</td>
		</tr>
	</table> 
	 
	 <a href="login.php">logi sisse</a> 

</body>
</html>
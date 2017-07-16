<?php
	require_once("dbInfo.php");
	
	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$records = mysqli_query($conn,"SELECT * FROM `racekitchoice`");
	
	$events = "{";
	while($record = mysqli_fetch_assoc($records)){
		if($events != "{"){
			$events .= ",";
		}
		$events .= "\"$record[RaceKitID]\":[{\"Name\":\"$record[Name]\",\"Price\":\"$record[Price]\",\"Photo\":\"$record[Photo]\"}]";
	}
	$events .= "}";
	
	$eventsJSON =json_encode($events);
	header("Content-Type: application/json");
	echo $eventsJSON;
?>
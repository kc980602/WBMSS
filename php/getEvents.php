<?php
	require_once("dbInfo.php");
	
	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$condition = "";
	if(isset($_COOKIE["userID"])){
		$condition = "INNER JOIN `eventregister.RunnerID` != $_COOKIE[userID]";
	}
	$records = mysqli_query($conn,"SELECT event.* 
	FROM `event`
	$condition");
	
	$events = "{";
	while($record = mysqli_fetch_assoc($records)){
		if($events != "{"){
			$events .= ",";
		}
		$events .= "\"$record[EventID]\":[{\"Name\":\"$record[Name]\",\"Distance\":\"$record[Distance]\",\"DateOfEvent\":\"$record[DateOfEvent]\",\"TimeStart\":\"$record[TimeStart]\",\"Price\":\"$record[Price]\"}]";
	}
	$events .= "}";
	
	$eventsJSON =json_encode($events);
	header("Content-Type: application/json");
	echo $eventsJSON;
?>
<?php
	require_once("dbInfo.php");
	
	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$records = mysqli_query($conn,"SELECT RegID,event.Name AS eventName ,event.DateOfEvent AS DateOfEvent ,racekitchoice.Name AS racekitName
	FROM eventregister
	INNER JOIN event 
	ON eventregister.EventID = event.EventID
	INNER JOIN racekitchoice
	ON eventregister.RaceKitID = racekitchoice.RaceKitID");
	
	$registrations = "{";
	while($record = mysqli_fetch_assoc($records)){
		if($registrations != "{"){
			$registrations .= ",";
		}
		$registrations .= "\"$record[RegID]\":[{\"racekitName\":\"$record[racekitName]\",\"eventName\":\"$record[eventName]\",\"DateOfEvent\":\"$record[DateOfEvent]\"}]";
	}
	$registrations .= "}";
	
	$registrationsJSON =json_encode($registrations);
	header("Content-Type: application/json");
	echo $registrationsJSON;
?>
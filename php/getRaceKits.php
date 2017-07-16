<?php
	require_once("dbInfo.php");
	
	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$records = mysqli_query($conn,"SELECT * FROM `racekitchoice`");
	
	$racekits = "{";
	while($record = mysqli_fetch_assoc($records)){
		if($racekits != "{"){
			$racekits .= ",";
		}
		$racekits .= "\"$record[RaceKitID]\":[{\"Name\":\"$record[Name]\",\"Price\":\"$record[Price]\",\"Photo\":\"$record[Photo]\"}]";
	}
	$racekits .= "}";
	
	$racekitsJSON =json_encode($racekits);
	header("Content-Type: application/json");
	echo $racekitsJSON;
?>
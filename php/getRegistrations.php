<?php
	require_once("dbInfo.php");

	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$condition = "";
	if(isset($_COOKIE["userID"],$_COOKIE["userType"])){
		if($_COOKIE["userType"] == "runner"){
			$condition = "WHERE eventregister.RunnerID = $_COOKIE[userID]";
		}
		if($_COOKIE["userType"] == "sponsor"){
			$condition = "ORDER BY eventregister.TopSpeed DESC";
		}
	}
	$records = mysqli_query($conn,"SELECT eventregister.RunnerID,FinishTime,CheckInTime,TopSpeed,runner.FirstName,runner.LastName,RegID,event.Name AS eventName ,event.DateOfEvent AS DateOfEvent ,racekitchoice.Name AS racekitName
	FROM eventregister
	INNER JOIN event
	ON eventregister.EventID = event.EventID
	INNER JOIN racekitchoice
	ON eventregister.RaceKitID = racekitchoice.RaceKitID
	INNER JOIN runner
	ON eventregister.RunnerID = runner.RunnerID
	$condition");

	$registrations = "[";
	while($record = mysqli_fetch_assoc($records)){
		if($registrations != "["){
			$registrations .= ",";
		}
		$registrations .= "{\"RegID\":\"$record[RegID]\",\"racekitName\":\"$record[racekitName]\",\"eventName\":\"$record[eventName]\",\"DateOfEvent\":\"$record[DateOfEvent]\",\"FirstName\":\"$record[FirstName]\",\"LastName\":\"$record[LastName]\",\"FinishTime\":\"$record[FinishTime]\",\"CheckInTime\":\"$record[CheckInTime]\",\"TopSpeed\":\"$record[TopSpeed]\",\"RunnerID\":\"$record[RunnerID]\"}";
	}
	$registrations .= "]";

	$registrationsJSON =json_encode($registrations);
	header("Content-Type: application/json");
	echo $registrationsJSON;
?>

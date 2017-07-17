<?php
	require_once("dbInfo.php");

	$conn = mysqli_connect($hostname, $username, $password, $database);
	if(!$conn){
		die("Connection fail: ".mysqli_connect_error());
	}
	$condition = "";

	$records = mysqli_query($conn,"SELECT *
	FROM charity");

	$charities = "[";
	while($record = mysqli_fetch_assoc($records)){
		if($charities != "["){
			$charities .= ",";
		}
		$charities .= "{\"CharityID\":\"$record[CharityID]\",\"Name\":\"$record[Name]\",\"Description\":\"$record[Description]\",\"WebsiteUrl\":\"$record[WebsiteUrl]\",\"Logo\":\"$record[Logo]\"}";
	}
	$charities .= "]";

	$charitiesJSON =json_encode($charities);
	header("Content-Type: application/json");
	echo $charitiesJSON;
?>

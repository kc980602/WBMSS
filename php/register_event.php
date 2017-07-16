<?php
  extract($_POST);
  if(isset($_COOKIE["userID"],$event,$racekit,$payment)){

    require_once("bdInfo.php");
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if(!$conn){
      die("Connection fail: ".mysqli_connect_error());
    }

    $record=mysqli_query($conn,"INSERT INTO `eventregister` (`RunnerID`,`EventID`,`RaceKitID`,`PaymentTotal`) VALUES ('$_COOKIE[userID]','$event','$racekit','$payment')");
    if(mysqli_affected_rows($conn) > 0){
      echo "You have successfully registered the event!";
    }else{
      echo "You may had registered the event.\nPlease try again later.";
    }
  }else{
    echo "Sorry, some problems are encountered.";
  }

?>

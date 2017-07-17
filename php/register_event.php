<?php
  extract($_POST);
  if(isset($_COOKIE["userID"],$_COOKIE["userType"],$event,$racekit,$payment)){

    if($_COOKIE["userType"] == "runner"){

      require_once("dbInfo.php");
      $conn = mysqli_connect($hostname, $username, $password, $database);
      if(!$conn){
        die("Connection fail: ".mysqli_connect_error());
      }

      $record=mysqli_query($conn,"SELECT *
                                  FROM eventregister
                                  WHERE RunnerID = $_COOKIE[userID]");
      if(mysqli_num_rows($record) > 0){
        echo "Sorry, You have already registered the event in this year.\nPlease try again later.";
        return;
      }

      $record=mysqli_query($conn,"INSERT INTO `eventregister` (`RunnerID`,`EventID`,`RaceKitID`,`PaymentTotal`) VALUES ('$_COOKIE[userID]','$event','$racekit','$payment')");
      if(mysqli_affected_rows($conn) > 0){
        echo "You have successfully registered the event!";
      }else{
        echo "The operation is failed.\nPlease try again later.";
      }

    }else{
      echo "Sorry, you are not a runner";
    }

  }else{
    echo "Sorry, some problems are encountered.";
  }

?>

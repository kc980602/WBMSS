<?php
  extract($_POST);
  if(isset($_COOKIE["userID"],$_COOKIE["userType"],$regID)){

    if($_COOKIE["userType"] == "runner"){

      require_once("bdInfo.php");
      $conn = mysqli_connect($hostname, $username, $password, $database);
      if(!$conn){
        die("Connection fail: ".mysqli_connect_error());
      }

      $record=mysqli_query($conn,"DELETE FROM `eventregister`
        WHERE (RegID = $regID AND RunnerID = $_COOKIE[userID])");
      if(mysqli_affected_rows($conn) > 0){
        echo "You have successfully disregistered the event.";
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

<?php
  extract($_POST);
  if(isset($_COOKIE["userID"],$_COOKIE["userType"],$RegID,$TopSpeed,$FinishTime,$CheckInTime)){

    if($_COOKIE["userType"] == "volunteer"){

      require_once("dbInfo.php");
      $conn = mysqli_connect($hostname, $username, $password, $database);
      if(!$conn){
        die("Connection fail: ".mysqli_connect_error());
      }

      $record=mysqli_query($conn,"UPDATE eventregister
								    SET TopSpeed = '$TopSpeed',FinishTime = '$FinishTime',CheckInTime = '$CheckInTime'
									WHERE RegID = '$RegID'");

      if(mysqli_affected_rows($conn) > 0){
        echo "You have successfully updated the event record!";
      }else{
        echo "Sorry, the operaion is failed.\nPlease try again later.";
      }

    }else{
      echo "Sorry, you are not a volunteer";
    }

  }else{
    echo "Sorry, some problems are encountered.";
  }

?>

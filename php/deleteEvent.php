<?php
  extract($_POST);
  if(isset($event)){


      require_once("dbInfo.php");
      $conn = mysqli_connect($hostname, $username, $password, $database);
      if(!$conn){
        die("Connection fail: ".mysqli_connect_error());
      }

      $record=mysqli_query($conn,"DELETE FROM `eventregister`
        WHERE EventID = $event");

      $record=mysqli_query($conn,"DELETE FROM `event`
        WHERE EventID = $event");
      $deletedRows = mysqli_affected_rows($conn);
      if($deletedRows > 0){
        echo "You have successfully deleted the event and $deletedRows participants were affected.";
      }else{
        echo "The operation is failed.\nPlease try again later.";
      }

  }else{
    echo "Sorry, some problems are encountered.";
  }

?>

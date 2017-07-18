<?php
  extract($_POST);

  if(isset($RegID,$CharityID,$amount,$_COOKIE["userID"],$_COOKIE["userType"])&!empty($amount)){
    $msg = "";
    if($_COOKIE["userType"]=="sponsor"){
      require_once("dbInfo.php");
      $conn = mysqli_connect($hostname, $username, $password, $database);
      if(!$conn){
        die("Connection fail: ".mysqli_connect_error());
      }
    
      $record=mysqli_query($conn,"INSERT INTO `sponsorrecord` (`SponsorID`,`CharityID`,`RegID`,`Amount`) VALUES ('$_COOKIE[userID]','$CharityID','$RegID','$amount')");
      if(mysqli_affected_rows($conn) > 0){
        $msg = "You have successfully sponsored the runner with the charity!" .$msg;
      }else{
        $msg = "The operation is failed.\nPlease try again later." .$msg;
      }
    }else{
      echo "Sorry, you are not a sponsor.";
    }

    echo $msg;
  }else{
    echo "Sorry, there are missing information.";
  }
?>

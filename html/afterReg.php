<?php
  require_once("../lib/printForm.php");
  require_once("../php/dbInfo.php");


  if(!isset($_COOKIE["afterRegID"]) && !isset($_COOKIE["afterRegtype"])) {
    echo "<h1>ERROR</h1>";
  } else {
    $userID = $_COOKIE['afterRegID'];
    $userType = $_COOKIE["afterRegtype"];
    $getColumn = "";
    $pkName = "";
    switch ($userType) {
      case 'runner':
        $pkName = "RunnerID";
        $getColumn = "RunnerID, FirstName, LastName, Gender, DateOfBirth, Email, Country, ProfilePicture";
        break;
      case 'volunteer':
        $pkName = "VolunteerID";
        $getColumn = "VolunteerID, FirstName, LastName, Gender, Email";
        break;
      case 'sponsor':
        $pkName = "SponsorID";
        $getColumn = "SponsorID, FirstName, LastName, Company, Email";
        break;
    }

    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "SELECT $getColumn FROM $userType WHERE $pkName = '$userID'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      if(mysqli_num_rows($result) == 1){
        printHead();
        printBody();
        printFormClassStart("Registration Success");
        printLabel("Please mark your $pkName for login purpose.");
        foreach ($row as $key => $val) {
          if (!is_numeric($key)){
            if ($key=="ProfilePicture")
              printPic($key, $val);
            else
              readOnlyForm($key, $val);

          }
        }
        printFormClassEnd();
        printEnd();
      }
    }
  }




 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="icon" href="../image/mss2017icon.ico">
  <title>Process Registration</title>
</head>
<body>
  <?php
  extract($_POST);
  $input["id"] = $id;
  $input["Password"] = $Password;

  require_once("../php/dbInfo.php");

  $empty = false;
  $emptyField = "";
  $pkName = "";

  switch ($type) {
    case 'runner':
      $pkName = "RunnerID";
      break;
    case 'volunteer':
      $pkName = "VolunteerID";
      break;
    case 'sponsor':
      $pkName = "SponsorID";
      break;
    case 'administrator':
      $pkName = "AdministratorID";
      break;
  }
  //check empty input
  foreach($input as $inputName => $value) {
    if (!isset($value) || trim($value)==='') {
      $emptyField = $emptyField."\\n ".$inputName;
      $empty = true;
    }
  }

  if($empty) {
    returnPage("The following field must not be null or white space. $emptyField");
  } else {
    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "SELECT * FROM $type WHERE $pkName = '$id' AND Password = '$Password'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      if(mysqli_num_rows($result) == 1){
        $name = "$row[FirstName] $row[LastName]";
        $time = 3600*2;
        setcookie("userName", $name, time()+$time, "/");
        setcookie("userType", $type, time()+$time, "/");
        switch ($type) {
          case 'runner':
            setcookie("userID",$row["RunnerID"], time()+$time, "/");
            header("location: ../php/runnerindex.php");
            break;
          case 'volunteer':
            setcookie("userID",$row["volunteerID"], time()+$time, "/");
            header("location: ../php/volunteerindex.php");
            break;
          case 'sponsor':
            setcookie("userID",$row["SponsorID"], time()+$time, "/");
            header("location: ../php/sponsorindex.php");
            break;
          case 'administrator':
            setcookie("userID",$row["AdministratorID"], time()+$time, "/");
            header("location: ../php/adminindex.php");
            break;
          default:
            echo "error";
            break;
        }
      } else
        returnPage("The email and password is not correct.\\nPlease enter again.");
   }
 }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
  ?>
</body>
</html>

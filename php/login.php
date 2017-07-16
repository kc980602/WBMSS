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
  $input["Email Address"] = $email;
  $input["Password"] = $Password;

  require_once("../php/dbInfo.php");

  $empty = false;
  $emptyField = "";
  //check empty input
  foreach($input as $inputName => $value) {
    if (!isset($value) || trim($value)==='') {
      $emptyField = $emptyField."\\n ".$inputName;
      $empty = true;
    }
  }

  if($empty) {
    returnPage("The following field must not be null or white space. $emptyField");
  } else if (!filter_var($input["Email Address"], FILTER_VALIDATE_EMAIL)) {
    returnPage("The password do not match.");
  } else {
    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "SELECT Email, Password FROM '$type' WHERE Email = '$email' AND Password = '$Password'";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      if($count == 1) {
         //header("location: ../index.html");
      }else {
        //returnPage("The email and password is not correct.\\nPlease try again.");
      }
   }
 }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
  ?>
</body>
</html>

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
  $input["First Name"] = $fname;
  $input["Last Name"] = $lname;
  $input["Email Address"] = $email;
  $input["Company"] = $comp;
  $input["Password"] = $pass1;
  $input["Comfirm Password"] = $pass2;

  $empty = false;
  $lengthError = false;
  $emptyField = "";
  $field = "";
  $length = 255;
  //check empty input
  foreach($input as $inputName => $value) {
    if (!isset($value) || trim($value)==='') {
      $emptyField = $emptyField."\\n ".$inputName;
      $empty = true;
    }
  }

  //check input length
  if (!$empty) {
    if (strlen($input["First Name"]) > 255) {
      $field = "First Name"; $lengthError = true;
    }
    if (strlen($input["Last Name"]) > 255) {
      $field = "Last Name"; $lengthError = true;
    }
    if (strlen($input["Email Address"]) > 255) {
      $field = "Email Address"; $lengthError = true;
    }
    if (strlen($input["Company"]) > 255) {
      $field = "Company"; $lengthError = true;
    }
    if (strlen($input["Password"]) > 255) {
      $field = "Password"; $lengthError = true;
    }
  }

  if($empty) {
    returnPage("The following field must not be null or white space. $emptyField");
  } else if ($lengthError){
    returnPage("The field $field maximum length is $length chars.");
  } else if (!filter_var($input["Email Address"], FILTER_VALIDATE_EMAIL)) {
    returnPage("The email address you enter is not valid.");
  } else if (strcmp($input["Password"], $input["Comfirm Password"])) {
    returnPage("The password do not match.");
  } else {
    require_once("../php/dbInfo.php");
    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "INSERT INTO sponsor (Password, FirstName, LastName, Company, Email)
                VALUES ('$pass1', '$fname', '$lname', '$comp', '$email')";
      mysqli_query($conn, $query);
      $pkID = mysqli_insert_id($conn);
      if(mysqli_affected_rows($conn)>0){
        setcookie("afterRegID",$pkID, time()+3600, "/");
        setcookie("afterRegtype","sponsor", time()+3600, "/");
        header("location: ../php/afterReg.php");
      }
    }
  }

  function showAlert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/sponsorReg.html';</script>";
  }
  ?>

</body>
</html>

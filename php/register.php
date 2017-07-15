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
  $input["Gender"] = $Gender;
  $input["Email Address"] = $email;
  $input["Country"] = $ctry;
  $input["Password"] = $pass1;
  $input["Comfirm Password"] = $pass2;

  $empty = false;
  $lengthError = false;
  $emptyField = "";
  $field = "";
  $length = 255;
  foreach($input as $inputName => $value) {
    if (!isset($value) || trim($value)==='') {
      $emptyField = $emptyField."\\n ".$inputName;
      $empty = true;
    }
  }

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
    if (strlen($input["Country"]) > 255) {
      $field = "Country"; $lengthError = true;
    }
    if (strlen($input["Password"]) > 255) {
      $field = "Password"; $lengthError = true;
    }
  }

  if($empty) {
    showAlert("The following field must not be null or white space. $emptyField");
  } else if ($lengthError){
    showAlert("The field $field maximum length is $length chars.");
  } else if (!filter_var($input["Email Address"], FILTER_VALIDATE_EMAIL)) {
    showAlert("The email address you enter is not valid.");
  } else if (strcmp($input["Password"], $input["Comfirm Password"])) {
    showAlert("The password do not match.");
  }


  function showAlert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  ?>
</body>
</html>

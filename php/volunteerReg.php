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
  $input["Password"] = $pass1;
  $input["Comfirm Password"] = $pass2;

  require_once("../php/dbInfo.php");

  $empty = false;
  $lengthError = false;
  $uniqueEmail = false;
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

  //check email uniqueEmail
  if (!$conn) {
    die("Connection Fail". mysqli_connect_error());
  } else {
    $query = "SELECT Email FROM volunteer";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row["Email"] == $email){
          $uniqueEmail = true;
        }
      }
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
  } else if ($uniqueEmail) {
    returnPage("The email you use have been registered.");
  } else {
    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "INSERT INTO volunteer (Password, FirstName, LastName, Gender, Email)
                VALUES ('$pass1', '$fname', '$lname', '$Gender', '$email')";
      mysqli_query($conn, $query);
      if(mysqli_affected_rows($conn)>0){
        $alert = "Registration Success!\\nYou are a volunteer now. Login with: \\nEmail: $email";
        echo "<script type='text/javascript'>alert('$alert'); window.location.href='../index.html';</script>";
      }
    }
  }

  function showAlert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/volunteerReg.html';</script>";
  }
  ?>
</body>
</html>

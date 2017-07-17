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
  $input["Date of Birth"] = $DOB;
  $input["Email Address"] = $email;
  $input["Country"] = $ctry;
  $input["Password"] = $pass1;
  $input["Comfirm Password"] = $pass2;



  $empty = false;
  $lengthError = false;
  $uploadOk = 0;
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
    if (strlen($input["Country"]) > 255) {
      $field = "Country"; $lengthError = true;
    }
    if (strlen($input["Password"]) > 255) {
      $field = "Password"; $lengthError = true;
    }
  }

  if ($_FILES["fileToUpload"]["name"] != null){
    $uploadOk = 1;
    $target_dir = "../upload/profile_pic/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        returnPage("Sorry, file already exists.");
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 1000000) {
        returnPage("Sorry, your photo is too large.");
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        returnPage("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        returnPage("Sorry, your photo was not uploaded.");
    // if everything is ok, try to upload file
    } else {
        $temp = explode(".", $_FILES["fileToUpload"]["tmp_name"]);
        $newfilename = round(microtime(true));
        $piclocation =  "../upload/profile_pic/" . $newfilename . "." . $imageFileType;
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $piclocation)) {
            //showAlert("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
        } else {
            showAlert("Sorry, there was an error uploading your photo.");
        }
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
  } else if ($uploadOk == 0){
    returnPage("Profile image not selected.");
  } else {
    require_once("../php/dbInfo.php");
    if (!$conn) {
      die("Connection Fail". mysqli_connect_error());
    } else {
      $query = "INSERT INTO runner (Password, FirstName, LastName, Gender, DateOfBirth, Email, Country, ProfilePicture)
                VALUES ('$pass1', '$fname', '$lname', '$Gender', '$DOB', '$email', '$ctry', '$piclocation')";
      mysqli_query($conn, $query);
      $pkID = mysqli_insert_id($conn);
      if(mysqli_affected_rows($conn)>0){
        setcookie("afterRegID",$pkID, time()+3600, "/");
        setcookie("afterRegtype","runner", time()+3600, "/");
        header("location: ../php/afterReg.php");
      }
    }
  }
  function showAlert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/runnerReg.html';</script>";
  }
  ?>
</body>
</html>

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
  } else {

  }

  if(!is_dir('../image/profile_pic')) {
    mkdir('../image/profile_pic', 0755, true);
	}
	$target_dir = "../image/profile_pic";
	$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_dir, PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
  function showAlert($message) {
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  ?>
</body>
</html>

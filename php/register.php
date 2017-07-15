<?php
  extract($_POST);
  date_default_timezone_set('Asia/Hong_Kong');
  $today = getdate(time());
  $year = $today['year'];
  $age = $year-$YOB;
  if (!isset($fName)) {
    echo "<h1>First Name is invalid!</h1>";
    echo "Please re-enter the information.";
  }else if (!isset($lName)) {
    echo "<h1>Last Name is invalid!</h1>";
    echo "Please re-enter the information.";
  }else if (!isset($YOB)) {
    echo "<h1>Year of brith is invalid!</h1>";
    echo "Please re-enter the information.";
  } else {

    if ($age >= 18) {
      echo "<h3>Welcome! $fName $lName</h3>";
      echo "<h3>You are now $age years old, so you can fill in this form</h3>";
    } else {
      echo "<h3>Sorry: Your age is: $age.</h3>";
      echo "<h3>You should be over 18 to fill this form</h3>";
    }
  }
?>



<?php

  echo "Connected";
  if(!is_dir('../image/ProfilePicture')) {
    mkdir('../image/ProfilePicture/', 0755, true);
  }
  $target_dir = "upload/";
  $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if(isset($_POST["submit"])) {	   
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;   
    }
  }

?>

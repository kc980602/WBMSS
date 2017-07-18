<?php
extract($_POST);

if(isset($name,$websiteURL)&!empty($name)){
  $msg = "";
  $desc = "";
  if(isset($description)){
    $desc = $description;
  }
  $target_file = "";
  if ($_FILES["fileToUpload"]["name"] != null){
    $target_dir = "../upload/charity_pic/";
    $str = explode(".",basename($_FILES["fileToUpload"]["name"]));
    $fileName = $name .".". $str[(count($str)-1)];
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["submit"])) {
      $msg .= getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $msg .= "File is an image - " . $check["mime"] . ". \n";
            $uploadOk = 1;
        } else {
            echo "File is not an image.\n";
            $uploadOk = 0;
        }
    }
    if (file_exists($target_file)) {
        $msg .= "However, file already exists.\n";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 83886080) {
        $msg .= "However, your file is too large.\n";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
        $msg .= "However, only JPG, JPEG, PNG & GIF files are allowed.\n";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        $msg .= "Therefore, your file was not uploaded.\n";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
            $msg .= "The image ". $fileName . " has been uploaded.\n";
        } else {
            $msg .= "However, there was an error uploading your file.\n";
        }
    }
  }

  require_once("dbInfo.php");
  $conn = mysqli_connect($hostname, $username, $password, $database);
  if(!$conn){
    die("Connection fail: ".mysqli_connect_error());
  }

  $record=mysqli_query($conn,"INSERT INTO `charity` (`Name`,`Description`,`WebsiteUrl`,`Logo`) VALUES ('$name','$desc','$websiteURL','$target_file')");
  if(mysqli_affected_rows($conn) > 0){
    $msg = "You have successfully created the charity!\n" .$msg;
  }else{
    $msg = "The operation is failed.\nPlease try again later.\n" .$msg;
  }

  echo $msg;
}else{
  echo "Sorry, the name field should not be empty.";
}
?>

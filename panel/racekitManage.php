<?php
/*
Three form -->
deleteRow
editRow
newRow
*/
require('../php/dbInfo.php');
$table = "racekitchoice";
if(isset($_POST['deleteID'])){
  $sql = "SELECT * FROM $table WHERE RaceKitID = '$_POST[deleteID]'";
  if(mysqli_query($conn, $sql)!=null){
    $sql = "DELETE FROM $table WHERE RaceKitID = '$_POST[deleteID]'";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: racekit.php?update=deleted");
    } else {
      header("location: racekit.php?update=deleteFail");
    }
  }
} else if(isset($_POST['new0'])){
  $sql = "SELECT * FROM $table WHERE RaceKitID = '$_POST[new0]'";
  if(mysqli_num_rows(mysqli_query($conn, $sql))==0){
    extract($_POST);
    $sql = "INSERT INTO $table VALUES('$new0', '$new1', '$new2',' $new3', '$new4')";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: racekit.php?update=created");
    }else{
      header("location: racekit.php?update=createFail");
    }
  }else{
    header("location: racekit.php?update=createsid");
  }
} else if(isset($_POST['edit0'])){
  $sql = "SELECT * FROM $table WHERE RaceKitID = '$_POST[edit0]'";
  extract($_POST);
  if(mysqli_query($conn, $sql)!=null){
    $sql = "UPDATE $table SET
    Name = '$edit1',
    Description = '$edit2',
    Price = '$edit3',
    Photo = '$edit4'
    WHERE RaceKitID = '$edit0';";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: racekit.php?update=updated");
    } else {
      header("location: racekit.php?update=nochanged");
    }
  }
}
 ?>

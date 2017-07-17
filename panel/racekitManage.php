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
  $sql = "SELECT * FROM $table WHERE RaceKitID = $_POST[deleteID]";
  if(mysqli_query($conn, $sql)!=null){
    $sql = "DELETE FROM $table WHERE RaceKitID = $_POST[deleteID]";
    $rc = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($rc)>0){
      header("location: racekit.php?update=deleted");
    }
  }
} else if(isset($_POST['new0'])){
  $sql = "SELECT * FROM $table WHERE RaceKitID = $POST[new0]";
  if(mysqli_query($conn, $sql)==null){
    explode($_POST);
    $sql = "INSERT INTO $table VALUES($new0, $new1, $new2, $new3)";
    $rc = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($rc)>0){
      header("location: racekit.php?update=created");
    }
  }
} else if(isset($_POST['edit0'])){
  $sql = "SELECT * FROM $table WHERE RaceKitID = $POST[edit0]";
  if(mysqli_query($conn, $sql)!=null){
    $sql = "UPDATE $table SET
    Name = $edit1,
    Description = $edit2,
    Price = $edit3,
    Photo = $edit4
    WHERE RaceKitID = $edit0;";
    $rc = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($rc)>0){
      header("location: racekit.php?update=updated");
    } else {
      header("location: racekit.php?update=nochanged");
    }
  }
}
 ?>

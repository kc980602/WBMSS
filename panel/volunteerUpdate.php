<?php
/*
Three form -->
deleteRow
editRow
newRow
*/
require('../php/dbInfo.php');
$table = "Volunteer";
if(isset($_POST['deleteID'])){
  $sql = "SELECT * FROM $table WHERE VolunteerID = '$_POST[deleteID]'";
  if(mysqli_query($conn, $sql)!=null){
    $sql = "DELETE FROM $table WHERE VolunteerID = '$_POST[deleteID]'";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageVolunteer.php?update=deleted");
    } else {
      header("location: manageVolunteer.php?update=deleteFail");
    }
  }
} else if(isset($_POST['new0'])){
  $sql = "SELECT * FROM $table WHERE VolunteerID = '$_POST[new0]'";
  if(mysqli_num_rows(mysqli_query($conn, $sql))==0){
    extract($_POST);
    $sql = "INSERT INTO $table VALUES('$new0', '$new1', '$new2', '$new3', '$new4',
    '$new5')";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageVolunteer.php?update=created");
    } else {
      header("location: manageVolunteer.php?update=createFail");
    }
  }else{
    header("location: manageVolunteer.php?update=createsid");
  }
} else if(isset($_POST['edit0'])){
  $sql = "SELECT * FROM $table WHERE VolunteerID = '$_POST[edit0]'";
  extract($_POST);
  if(mysqli_query($conn, $sql)!=null){
    $sql = "UPDATE $table SET
    Password = '$edit1',
    FirstName = '$edit2',
    LastName = '$edit3',
    Gender = '$edit4',
    Email = '$edit5'
    WHERE VolunteerID = '$edit0';";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageVolunteer.php?update=updated");
    } else {
      header("location: manageVolunteer.php?update=nochanged");
    }
  }
}
 ?>

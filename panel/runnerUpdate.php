<?php
/*
Three form -->
deleteRow
editRow
newRow
*/
require('../php/dbInfo.php');
$table = "Runner";
if(isset($_POST['deleteID'])){
  $sql = "SELECT * FROM $table WHERE RunnerID =' $_POST[deleteID]'";
  if(mysqli_query($conn, $sql)!=null){
    $sql = "DELETE FROM $table WHERE RunnerID = '$_POST[deleteID]'";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageRunner.php?update=deleted");
    } else {
      header("location: magageRunner.php?update=deleteFail");
    }
  }
} else if(isset($_POST['new0'])){
  $sql = "SELECT * FROM $table WHERE RunnerID = '$_POST[new0]'";
  if(mysqli_num_rows(mysqli_query($conn, $sql))==0){
    extract($_POST);
    if($new1 == '') $new1 = 'null';
    else $new1 = "'$new1'";
    $sql = "INSERT INTO $table VALUES('$new0', $new1, '$new2', '$new3', '$new4',
    '$new5', '$new6', '$new7', '$new8', '$new9')";
    echo $sql;
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageRunner.php?update=created");
    } else {
      header("location: manageRunner.php?update=createFail");
    }
  }else{
    header("location: manageRunner.php?update=createsid");
  }
} else if(isset($_POST['edit0'])){
  $sql = "SELECT * FROM $table WHERE RunnerID = '$_POST[edit0]'";
  extract($_POST);
  if(mysqli_query($conn, $sql)!=null){
    $sql = "UPDATE $table SET
    VolunteerID = '$edit1',
    Password = '$edit2',
    FirstName = '$edit3',
    LastName = '$edit4',
    Gender = '$edit5',
    DateOfBirth = '$edit6',
    Email = '$edit7',
    Country = '$edit8',
    ProfilePicture = '$edit9'
    WHERE RunnerID = '$edit0';";
    $rc = mysqli_query($conn, $sql);
    if($rc){
      header("location: manageRunner.php?update=updated");
    } else {
      header("location: manageRunner.php?update=nochanged");
    }
  }
}
 ?>

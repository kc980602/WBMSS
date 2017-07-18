<?php
require_once('dbInfo.php'); // MySQli Connection
require_once('../lib/printForm.php'); // PrintForm Library
printSystemPageStart("../php/sponsorEditProfile.php");
printSystemPageSideMenuOtion("../html/sponsorship.html", "Sponsor Runner");
printSystemPageSideMenuOtion("../panel/SponsorDel.php", "Sponsor Record");
printSystemPageSideMenuOtionClose("Sponsor System", "../php/sponsorEditProfile.php");

if(isset($_COOKIE['userType'])){
  if($_COOKIE['userType']!="sponsor"){
    returnPage("You are not a runner!");
  }
}else{
  returnPage("You have to login first!");
}
if(isset($_COOKIE['userID'])){
  $sql = "SELECT * FROM Sponsor WHERE SponsorID = $_COOKIE[userID];";
  $rs = mysqli_query($conn, $sql);
  $rc = mysqli_fetch_assoc($rs);
  printFormItem("currPwd", "Current Password", "Please Enter Your password", "password", "");
  if(!isset($_POST['updatePwd'])){
    printFormButton("chgPwd","Change Password", "button","changePwd();");
  } else {
    printFormItem("newPwd", "New Password", "Please Enter Your new password", "password", "");
    printFormItem("confirmPwd", "ConfirmPassword", "Re-type Your new password again", "password", "");
  }
  printFormItem("fname", "First Name", "Please Enter Your First Name", "text", $rc['FirstName']);
  printFormItem("lname", "Last Name", "Please Enter Your Last Name", "text", $rc['LastName']);
  printFormItem("company", "Company", "Please Enter Your Company Name", "text", $rc['Company']);
  printFormItem("email", "Email", "Please Enter Your Email Address", "email", $rc['Email']);
  printFormButton("submit", "SUBMIT", "submit", "");
  $alert = "";
  if(isset($_POST['newPwd'])){
    $sID = $_COOKIE['userID'];
    extract($_POST);
    if($currPwd==$confirmPwd){
      $sql = "UPDATE Sponsor SET
      Password = '$newPwd',
      FirstName = '$fname',
      LastName = '$lname',
      Company = '$company',
      Email = '$email'
      WHERE SponsorID = '$sID' AND
      Password = '$currPwd';";
      if(mysqli_query($conn, $sql)){
        $alert = "Updated succuessfully!";
      }
    } else {
      $alert = "Your password maybe incorrect\\n or the new password is the same";
    }
    echo "<script>alert(\"$alert\")</script>";
  } else if(isset($_POST['currPwd'])){
    $sID = $_COOKIE['userID'];
    extract($_POST);
    $sql = "UPDATE Sponsor SET
    FirstName = '$fname',
    LastName = '$lname',
    Company = '$company',
    Email = '$email'
    WHERE SponsorID = '$sID' AND
    Password = '$currPwd';";
    if(mysqli_query($conn, $sql)){
      echo "<h3>Updated succuessfully!</h3>";
    }else {
      $alert = "Your new password and confirm password is not the same.";
      echo "<script>alert(\"$alert\")</script>";
  }
}
printSystemPageEnd();

function returnPage($message) {
  echo "<script type='text/javascript'>alert('$message'); window.location.href='../index.html';</script>";
}
?>

<script>
function changePwd(){
  var form = document.createElement("form");
  form.setAttribute("method","post");
  var gate = document.createElement("input");
  gate.setAttribute("type", "hidden");
  gate.setAttribute("value", "Y");
  gate.setAttribute("name", "updatePwd");
  form.appendChild(gate);
  document.body.appendChild(form);
  form.submit();
}
</script>

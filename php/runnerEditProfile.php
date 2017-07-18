<?php
require_once('dbInfo.php'); // MySQli Connection
require_once('../lib/printForm.php'); // PrintForm Library
printSystemPageStart("../php/runnerEditProfile.php", "../php/runnerindex.php");
printSystemPageSideMenuOtion("../html/register_event.html", "Register Event");
printSystemPageSideMenuOtion("../php/runnerEventRecord.php", "Event Record");

printSystemPageSideMenuOtionClose("Runner System", "../php/runnerEditProfile.php");

if(isset($_COOKIE['userType'])){
  if($_COOKIE['userType']!="runner")
    returnPage("You are not a runner!");
}else{
  returnPage("You have to login first!");
}

if(isset($_COOKIE['userID'])){
  $sql = "SELECT * FROM Runner WHERE RunnerID = $_COOKIE[userID];";
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
  printFormItem("lname", "First Name", "Please Enter Your First Name", "text", $rc['LastName']);
  printRadio("gender","Gender","Male","Male","Female","Female", $rc['Gender']);
  printFormItem("dob", "Date of Birth", "YYYY/MM/DD", "date", $rc['DateOfBirth']);
  printFormItem("email", "Email", "Please Enter Your Email Address", "email", $rc['Email']);
  printFormItem("country", "Country", "Please Enter Your Country", "text", $rc['Country']);
  printFormButton("submit", "SUBMIT", "submit", "");
} else { // For Testing Only
  echo "<legend id='form_name'>Profile</legend>";
  printFormItem("currPwd", "Current Password", "Please Enter Your password", "password", "");
  if(!isset($_POST['updatePwd'])){
    printFormButton("chgPwd","Change Password", "button","changePwd();");
  }else {
    printFormItem("newPwd", "New Password", "Please Enter Your new password", "password", "");
    printFormItem("confirmPwd", "ConfirmPassword", "Re-type Your new password again", "password", "");
  }
  printFormItem("fname", "First Name", "Please Enter Your First Name", "text", "");
  printFormItem("lname", "Last Name", "Please Enter Your Last Name", "text", "");
  printRadio("gender","Gender","Male","Male","Female","Female", "");
  printFormItem("dob", "Date of Birth", "YYYY/MM/DD", "date", "");
  printFormItem("email", "Email", "Please Enter Your Email Address", "email", "");
  printFormItem("country", "Country", "Please Enter Your Country", "text", "");
  printFormButton("submit", "SUBMIT", "submit", "");
}
printSystemPageEnd();

function returnPage($message) {
  echo "<script type='text/javascript'>alert('$message'); window.location.href='../index.html';</script>";
}

?>
<!-- Button -->

<?php
$alert = "";
if(isset($_POST['currPwd'])){
  $runID = $_COOKIE['userID'];
  extract($_POST);
  $sql = "UPDATE Runner SET
  FirstName = '$fname',
  LastName = '$lname',
  Gender = '$gender',
  DateOfBirth = '$dob',
  Email = '$email',
  Country = '$country'
  WHERE RunnerID = '$runID' AND
  Password = '$currPwd';";
  if(mysqli_query($conn, $sql)){
    $alert = "Updated succuessfully!";
  } else {
    $alert = "Your password maybe incorrect\\n or there's no change to your profile.";
  }
  echo "<script>alert(\"$alert\")</script>";
} else if(isset($_POST['newPwd'])){
  $runID = $_COOKIE['userID'];
  extract($_POST);
  if($currPwd==$confirmPwd){
    $sql = "UPDATE Runner SET
    Password = '$newPwd',
    FirstName = '$fname',
    LastName = '$lname',
    Gender = '$gender',
    DateOfBirth = '$dob',
    Email = '$email',
    Country = '$country',
    WHERE RunnerID = '$runID' AND
    Password = '$currPwd';";
    if(mysqli_query($conn, $sql)){
      $alert = "Updated succuessfully!";
    } else {
      $alert = "Your password maybe incorrect\\n or the new password is the same";
    }
    echo "<script>alert(\"$alert\")</script>";
  } else {
    $alert = "Your new password and confirm password is not the same.";
    echo "<script>alert(\"$alert\")</script>";
  }
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

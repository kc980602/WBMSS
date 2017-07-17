<?php
require_once('dbInfo.php'); // MySQli Connection
require_once('../lib/printForm.php'); // PrintForm Library
printHead();
printBody();?>
<form class="form-horizontal">
<fieldset>
<!-- form input-->
<?php
if(isset($_COOKIE['userType'])){
  if($_COOKIE['userType']!="runner"){
    header("location: ../index.html");
  }
}else{
  header("location: ../index.html");
}
if(isset($_COOKIE['userID'])){
  $sql = "SELECT * FROM Runner WHERE RunnerID = $_COOKIE[userID];";
  $rs = mysqli_query($conn, $sql);
  $rc = mysqli_fetch_assoc($rs);
  echo "<legend id='form_name'>$rc[FirstName] $rc[LastName] Profile</legend>";
  printFormItem("currPwd", "Current Password", "Please Enter Your password", "password", "");
  if(!isset($_POST['updatePwd'])){
    printFormButton("chgPwd","Change Password", "button","changePwd();");
  }else {
    printFormItem("newPwd", "New Password", "Please Enter Your new password", "password", "");
    printFormItem("confirmPwd", "ConfirmPassword", "Re-type Your new password again", "password", "");
  }
  printFormItem("fname", "First Name", "Please Enter Your First Name", "text", $rc['FirstName']);
  printFormItem("lname", "First Name", "Please Enter Your First Name", "text", $rc['LastName']);
  printRadio("gender","Gender","Male","Male","Female","Female", $rc['Gender']);
  printFormItem("dob", "Date of Birth", "YYYY/MM/DD", "date", $rc['DateOfBirth']);
  printFormItem("email", "Email", "Please Enter Your Email Address", "email", $rc['Email']);
  printFormItem("Country", "Country", "Please Enter Your Country", "text", $rc['Country']);
  printFormButton("submit", "SUBMIT", "submit", "");
}else{ // For Testing Only
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
  printFormItem("Country", "Country", "Please Enter Your Country", "text", "");
  printFormButton("submit", "SUBMIT", "submit", "");
}
if(isset($_POST['newPwd'])){
  $runID = $_COOKIE['userID'];
  explode($_POST);
  $sql = "UPDATE Runner SET
  Password = $newPwd,
  FirstName = $fname,
  LastName = $lname,
  Gender = $gender,
  DateOfBirth = $dob,
  Email = $email,
  Country = $country
  WHERE RunnerID = $runID AND
  Password = $currPwd;";
  $rc = mysqli_query($conn, $sql);
  if(mysqli_affected_row($rc)>0){
    $echo "<h3>Updated succuessfully!</h3>";
  }
}else if(isset($_POST['currPwd'])){
  $runID = $_COOKIE['userID'];
  explode($_POST);
  $sql = "UPDATE Runner SET
  FirstName = $fname,
  LastName = $lname,
  Gender = $gender,
  DateOfBirth = $dob,
  Email = $email,
  Country = $country,\
  WHERE RunnerID = $runID AND
  Password = $currPwd;";
  $rc = mysqli_query($conn, $sql);
  if(mysqli_affected_row($rc)>0){
    $echo "<h3>Updated succuessfully!</h3>";
  }
}
 ?>
<!-- Button -->


</fieldset>
</form>
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
printEnd();
</body>
</html>

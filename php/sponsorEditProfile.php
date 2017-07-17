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
  if($_COOKIE['userType']!="sponsor"){
    header("location: ../index.html");
  }
}else{
  header("location: ../index.html");
}
if(isset($_COOKIE['userID'])){
  $sql = "SELECT * FROM Sponsor WHERE SponsorID = $_COOKIE[userID];";
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
  printFormItem("lname", "Last Name", "Please Enter Your Last Name", "text", $rc['LastName']);
  printFormItem("company", "Company", "Please Enter Your Company Name", "text", $rc['Company']);
  printFormItem("email", "Email", "Please Enter Your Email Address", "email", $rc['Email']);
  printFormButton("submit", "SUBMIT", "submit", "");
  if(isset($_POST['newPwd'])){
    $runID = $_COOKIE['userID'];
    explode($_POST);
    $sql = "UPDATE Sponsor SET
    Password = $newPwd,
    FirstName = $fname,
    LastName = $lname,
    Company = $company,
    Email = $email
    WHERE RunnerID = $runID AND
    Password = $currPwd;";
    $rc = mysqli_query($conn, $sql);
    if(mysqli_affected_row($rc)>0){
      $echo "<h3>Updated succuessfully!</h3>";
    }
  }else if(isset($_POST['currPwd'])){
    $runID = $_COOKIE['userID'];
    explode($_POST);
    $sql = "UPDATE Sponsor SET
    FirstName = $fname,
    LastName = $lname,
    Company = $company,
    Email = $email
    WHERE RunnerID = $runID AND
    Password = $currPwd;";
    $rc = mysqli_query($conn, $sql);
    if(mysqli_affected_row($rc)>0){
      $echo "<h3>Updated succuessfully!</h3>";
    }
  }
}
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
?>

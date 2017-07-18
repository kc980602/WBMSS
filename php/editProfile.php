<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="image/mss2017icon.ico">

  <title>Update Profile</title>


  <!-- Custom styles for this template -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/Navbar_menu.css" rel="stylesheet">
  <link href="js/bootstrap.min.js" rel="stylesheet">
</head>
<body>
  <form class="form-horizontal">
    <fieldset>
      <!-- form input-->
      <?php
      require_once('dbInfo.php'); // MySQli Connection
      require_once('../lib/printForm.php'); // PrintForm Library
      if(isset($_COOKIE['userType'])){
        if($_COOKIE['userType']!="runner"){
          header("location: ");
        }
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
        WHERE RunnerID = $runID;";
        mysqli_query($conn, $sql);
        echo "<h3>Updated succuessfully!</h3>";
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
        WHERE RunnerID = $runID;";
        mysqli_query($conn, $sql);
        echo "<h3>Updated succuessfully!</h3>";
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
</body>
</html>

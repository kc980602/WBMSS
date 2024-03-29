<!DOCTYPE html>
<html>
  <head>
    <link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <link href="../js/bootstrap-datetimepicker.min.js" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <style>
      .container{
        width: 1600px;
      }
      .row{
        margin-left:1%;
        margin-right:1%;
      }

    </style>
    <script>
    var target = "runnerUpdate.php";
    var nr = 0;
    function newRow(num){
      if(nr==0){
        nr++;
        var row = document.createElement("tr");
        var form = document.createElement("form");
        var tbody = document.getElementById("tbody");
        form.setAttribute("method","post");
        form.setAttribute("id", "newRow");
          form.setAttribute("action", target);
          row.appendChild(form);
          for(var i=0;i<num;i++){
            var td = document.createElement("td");
            var input = document.createElement("input");
            input.setAttribute("name", "new"+i);
            if(i!=6)
              input.setAttribute("type", "text");
            else
              input.setAttribute("type", "date");
            input.setAttribute("form", "newRow");
            input.setAttribute("class", "form-control input-md");
            input.setAttribute("maxlength", "255");
            td.appendChild(input);
            row.appendChild(td);
          }
        tbody.appendChild(row);
        row = document.createElement("tr");
        td = document.createElement("td");
        var button = document.createElement("button");
        button.setAttribute("class", "btn btn-primary");
        button.setAttribute("onclick", "sendNewRow();");
        button.innerHTML = "SUBMIT";
        td.appendChild(button);
        row.appendChild(td);
        tbody.appendChild(row);
      }
    }
    function sendNewRow(){
      document.getElementById("newRow").submit();
    }
    function deleteRow(num){
      var deleteForm = document.createElement("form");
      deleteForm.setAttribute("method", "post");
      deleteForm.setAttribute("action", target);
      var deleteInput = document.createElement("input");
      deleteInput.setAttribute("name", "deleteID");
      deleteInput.setAttribute("type", "hidden");
      deleteInput.setAttribute("value", num.toString());
      deleteForm.appendChild(deleteInput);
      document.body.appendChild(deleteForm);
      deleteForm.submit();
    }
    function editRow(num){
      var editForm = document.createElement("form");
      var editRow = document.getElementById("Row"+num.toString());
      editForm.setAttribute("method","post");
      editForm.setAttribute("id", "editRow"+num.toString());
      editForm.setAttribute("action", target);
      editRow.appendChild(editForm);
      var editTd = document.createElement("td");
      var EditButton = document.createElement("button");
      EditButton.setAttribute("class", "btn btn-primary");
      EditButton.setAttribute("onclick", "sendEditRow("+num.toString()+");");
      EditButton.innerHTML = "SUBMIT";
      editRow.appendChild(EditButton);
      for(var i=0;i<10;i++){
        var editInput = document.createElement("input");
        var editTd = document.getElementById("Row"+num.toString()+"Col"+i.toString());
        editInput.setAttribute("name", "edit"+i);
        if(i==0)
          editInput.setAttribute("readonly", "");
        if(i!=6)
          editInput.setAttribute("type", "text");
        else
          editInput.setAttribute("type", "date");
        editInput.setAttribute("form", "editRow"+num.toString());
        editInput.setAttribute("class", "form-control input-md");
        editInput.setAttribute("value", editTd.innerHTML);
        editInput.setAttribute("maxlength", "255");
        editTd.innerHTML = "";
        editTd.appendChild(editInput);
      }
    }
    function sendEditRow(num){
      document.getElementById("editRow"+num.toString()).submit();
    }
    </script>
    <?php
    require_once('../php/dbInfo.php'); // MySQLi Connection
    require_once('panel.php');
    if(isset($_GET['page'])){
      $page = $_GET['page'];
      setcookie("mrPage", $page, time()+3600);
    } else if(isset($_COOKIE['mrPage'])){
      $page = $_COOKIE['mrPage'];
    }else{
      setcookie("mrPage", 1, time()+3600);
      $page = 1;
    }
     ?>
  </head>
  <body>
    <?php
    require_once('../lib/container.php');
    cBody("../php/adminindex.php");
    ?>
<div class="container">
    <div class="row">
      <p></p>
      <h1>Manage Runner</h1>
      <h3>Create, Update, Delete a runner. Assign or Unassign runner to a Volunteer.</h3>
<?php
if(isset($_GET['update'])){
  $msg = $_GET['update'];
  switch($msg){
    case 'deleted':
      $alert = "A row has been deleted!";
      break;
    case 'deleteFail':
      $alert = "Delete Failed!";
      break;
    case 'created':
      $alert = "A row has been created!";
      break;
    case 'createFail':
      $alert = "Creation Failure!";
      break;
    case 'updated':
      $alert = "A row has been updated!";
      break;
    case 'nochanged':
      $alert = "There is no change!";
      break;
    default:
      $alert = "Update Error!";
      break;
  }
  echo "<script>alert(\"$alert\");</script>";
}
$tb = "Runner";
$sql = "SELECT * FROM $tb";
$rc = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($rc);
$totalPage = ceil($rowCount/20);
$topNum = 0 + ($page-1) * 20;
mysqli_data_seek($rc, $topNum);
$printCount = 0;
$col = array("RunnerID", "VolunteerID", "Password", "FirstName",
"LastName","Gender", "DateOfBirth", "Email", "Country", "ProfilePicture");
$panel = new Panel($page,$totalPage);
$panel->drawHeading("Runner List","NEW","newRow(10);");
$panel->Head->addItemArray($col);
while($rs = mysqli_fetch_assoc($rc)){
  $i=0;
  foreach($col as $value){
    $row[$i] = $rs[$value];
    $i++;
  }
  $panel->Body->addRow($row, $rs[$col[0]]);
  $printCount++;
  if($printCount==20) break;
}
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
<?php cEnd(); ?>
</body>
</html>

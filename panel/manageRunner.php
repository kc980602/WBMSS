<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/Navbar_menu.css" rel="stylesheet">
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <style>
      .container{
        width: 100%;
      }
      .row{
        margin-left:1%;
        margin-right:1%;
      }
    </style>
    <script>
    var target = "runnerUpdate.php";
    function newRow(num){
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
        input.setAttribute("type", "text");
        input.setAttribute("form", "newRow");
        input.setAttribute("class", "form-control input-md");
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
        editTd.innerHTML = "";
        editTd.appendChild(editInput);
      }
    }
    function sendEditRow(num){
      document.getElementById("editRow"+num.toString()).submit();
    }
    </script>
  </head>
  <body>
<div class="container">
    <div class="row">
      <p></p>
      <h1>Manage Runner</h1>
      <h3>Create, Update, Delete a runner. Assign or Unassign runner to a Volunteer.</h3>
<?php
require_once('../php/dbInfo.php'); // MySQLi Connection
require_once('panel.php');
if(isset($_GET['page'])){
  $page = $_GET['page'];
  setcookie("racekitPage", $page, time()+3600);
} else if(isset($_COOKIE['racekitPage'])){
  $page = $_COOKIE['racekitPage'];
}else{
  setcookie("racekitPage", 1, time()+3600);
  $page = 1;
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
$panel->drawHeading("Race Kit Record","NEW","newRow(10);");
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
</body>
</html>

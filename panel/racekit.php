<!DOCTYPE html>
<html>
  <head>
    <script>
      function newRow(num){
        var row = document.createElement("tr");
        var form = document.createElement("form");
        var tbody = document.getElementById("tbody");
        form.setAttribute("method","post");
        form.setAttribute("id", "newRow");
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
    </script>
  </head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/Navbar_menu.css" rel="stylesheet">
<link href="../js/bootstrap.min.js" rel="stylesheet">
<div class="container">
    <div class="row">

      <p></p>
      <h1>Manage Race Kit Panel</h1>
      <h3>Create, Update, Delete a race kit record.</h3>
<?php
//require_once('../lib/conn.php'); // MySQLi Connection
if(isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}
$sql = "SELECT * FROM RaceKitChoice";
$rc = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($rc);
require_once('panel.php');
$col = array("ID", "Name","Description","Price","Photo");
$panel = new Panel($page,1);
$panel->drawHeading("Race Kit Record","NEW","newRow(5);");
$panel->Head->addItemArray($col);
$row = array(1, "Me", "Testing", 99.99, "http://google.com");
$panel->Body->addRow($row);
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
</html>

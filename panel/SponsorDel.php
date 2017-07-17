<!DOCTYPE html>
<html>
  <head>
    <!-- <script>
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
    </script> -->

  </head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/Navbar_menu.css" rel="stylesheet">
<link href="../js/bootstrap.min.js" rel="stylesheet">


<div class="container">
    <div class="row">

      <p></p>
      <h1>Manage Sponsor Record Panel</h1>
      <h3>Delete the overdue records.</h3>

<?php
require_once('../php/dbInfo.php'); // MySQLi Connection
if(isset($_GET['page'])){
  $page = $_GET['page'];
} else {
  $page = 1;
}
$sql = "SELECT * FROM `sponsorrecord`";
$rc = mysqli_query($conn, $sql);



$rowCount = mysqli_num_rows($rc);
require_once('Sponsorpanel.php');

$col = array("SponsorID", "CharityID");
$panel = new Panel($page,1);

$panel->drawHeading("Sponsor Record","NEW","newRow(5);");
$panel->Head->addItemArray($col);

while ($rows = mysqli_fetch_assoc($rc)) {
$row = array($rows['SponsorID'], $rows['CharityID']);
$panel->Body->addRow($row);
}
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
</html>

<!DOCTYPE html>
<html>
  <head>
  </head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/Navbar_menu.css" rel="stylesheet">
<link href="../js/bootstrap.min.js" rel="stylesheet">



<?php
require_once('../lib/printForm.php'); // PrintForm Library

printBar("../php/volunteerindex.php");

 ?>


<div class="container" style="margin-top:54px;">
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
$sql = "SELECT * FROM `eventregister`, `runner` where eventregister.RunnerID = runner.RunnerID and RaceKitSent='0' ";
$rc = mysqli_query($conn, $sql);



$rowCount = mysqli_num_rows($rc);
require_once('SendRaceKitpanel.php');

$col = array("SponsorID", "Company");
$panel = new Panel($page,1);

$panel->drawHeading("Sponsor Record","NEW","newRow(5);");
$panel->Head->addItemArray($col);

while ($rows = mysqli_fetch_assoc($rc)) {
$row = array($rows['FirstName'], $rows['RaceKitSent']);
$panel->Body->addRow($row,$rows['RegID']);
}
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
</html>

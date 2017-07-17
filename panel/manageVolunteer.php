<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/Navbar_menu.css" rel="stylesheet">
    <link href="../js/bootstrap.min.js" rel="stylesheet">
  </head>
  <body>
<div class="container">
    <div class="row">
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
  $panel->Body->addRow($row, $rs['RaceKitID']);
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

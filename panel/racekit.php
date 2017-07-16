<!DOCTYPE html>
<html>
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
require_once('panel.php');
$col = array("ID", "Name","Description","Price","Photo");
$panel = new Panel(1,1);
$panel->drawHeading("Race Kit Record","NEW","newRow();");
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

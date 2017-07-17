<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
<link href="../css/panel_table.css" rel='stylesheet' type='text/css'>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/Navbar_menu.css" rel="stylesheet">
<link href="../js/bootstrap.min.js" rel="stylesheet">
<style>
  .sort-head:hover{
    background-color: gray;
  }
</style>
</head>
<body>
<div class="container">
    <div class="row">

      <p></p>
      <h1>View Event Record</h1>
      <h3>The table of event record including Check-in Time, Time to finish, Top speed</h3>
<?php
require_once('dbInfo.php');
require_once('../panel/table.php');
$sort = "";
$order = "";
if(isset($_GET['page'])){
  $page = $_GET['page'];
  setcookie("verPage", $page, time()+3600);
} else if(isset($_COOKIE['verPage'])){
  $page = $_COOKIE['verPage'];
}else{
  setcookie("verPage", 1, time()+3600);
  $page = 1;
}
if(isset($_GET['sort'])){
  sortColumn($_GET['sort']);
}
function sortColumn($col){
  if(!isset($_COOKIE['order']))
    setcookie("sort", "ASC", time()+3600);
  if(isset($_COOKIE['sort'])){
    if($_COOKIE['sort']==$col){
      if($_COOKIE['order']=="ASC")
        setcookie("order", "DESC", time()+3600);
      else
        setcookie("order", "ASC", time()+3600);
    } else {
      setcookie("sort", $col, time()+3600);
      setcookie("order","ASC",time()+3600);
    }
  }else{
    setcookie("sort", $col, time()+3600);
    setcookie("order","ASC",time()+3600);
  }
  $sort = $_COOKIE['sort'];
  $order = $_COOKIE['order'];
}
$tb = "EventRegister";
$sql = "SELECT * FROM $tb $sort $order";
$rc = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($rc);
$totalPage = ceil($rowCount/50);
$topNum = 0 + ($page-1) * 50;
mysqli_data_seek($rc, $topNum);
$printCount = 0;
$col = array(
  "Runner ID" => "RunnerID",
  "Event ID" =>"EventID",
  "Check In Time" =>"CheckInTime",
  "Finish Time" =>"FinishTime",
  "Top Speed" => "TopSpeed",
  "Race Kit ID" => "RaceKitID",
  "Race Kit Sent" => "RaceKitSent");
$panel = new Panel($page,$totalPage);
$panel->drawHeading("Event Record");
$panel->Head->addItemArray($col);
while($rs = mysqli_fetch_assoc($rc)){
  $i=0;
  foreach($col as $key => $value){
    $row[$i] = $rs[$value];
    $i++;
  }
  $panel->Body->addRow($row, $rs['RaceKitID']);
  $printCount++;
  if($printCount==50) break;
}
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
</body>

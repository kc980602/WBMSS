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
    setcookie("order", "ASC", time()+3600);
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
}
 ?>
</head>
<body>
  <?php require_once('../lib/container.php');
  cBody();?>
<div class="container">
    <div class="row">

      <p></p>
      <h1>Your Event Records</h1>
      <h3>The table of event record including Check-in Time, Time to finish, Top speed</h3>
<?php
$tb = "EventRegister";
if(isset($_COOKIE['userType'])){
  if($_COOKIE['userType']=="runner"){
    $runnerID = $_COOKIE['userID'];
  } else {
    header("location: ../index.html");
  }
}else {
  header("location: ../index.html");
}
if(isset($_COOKIE['sort'])){
  $sort = $_COOKIE['sort'];
  $order = $_COOKIE['order'];
  $ob = "ORDER BY";
} else {
  $sort = "";
  $order = "";
  $ob = "";
}
$sql = "SELECT * FROM $tb WHERE RunnerID = '$runnerID' $ob $sort $order";
$rc = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($rc);
$totalPage = ceil($rowCount/10);
$topNum = 0 + ($page-1) * 10;
mysqli_data_seek($rc, $topNum);
$printCount = 0;
$col = array(
  "Runner ID" => "RunnerID",
  "Event ID" =>"EventID",
  "Check In Time" =>"CheckInTime",
  "Finish Time" =>"FinishTime",
  "Top Speed" => "TopSpeed",
  "Race Kit ID" => "RaceKitID";
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
  if($printCount==10) break;
}
$panel->tableEnd();
$panel->panelEnd();
$panel->drawPanel();
?>

    </div>
</div>
<?php cEnd();?>
</body>

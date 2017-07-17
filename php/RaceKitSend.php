<?php

require_once("dbInfo.php");


    $id = $_GET['id'];
    $sql_delete = "update projectdb.eventregister set RaceKitSent = '1' where regid = $id;";
        $result2 = mysqli_query($conn,$sql_delete);

    if($result2) {
        header('location:../panel/SendRaceKit.php');
    } else {
        echo "Error";
      }

    ?>

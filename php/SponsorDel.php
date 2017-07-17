<?php

require_once("dbInfo.php");


    $id = $_GET['id'];
    $sql_delete = "DELETE FROM sponsorrecord WHERE SponsorID=$id";
        $result2 = mysqli_query($conn,$sql_delete);

    if($result2) {
        header('location:../panel/SponsorDel.php');
    } else {
        echo "Error";
      }

    ?>

<?php

  if ($_COOKIE['userType']=="volunteer") {
    require_once('dbInfo.php'); // MySQli Connection
    require_once('../lib/printForm.php'); // PrintForm Library
    printSystemPageStart("../php/volunteerindex.php", "../php/volunteerindex.php");
    printSystemPageSideMenuOtion("../html/event_records_management.html", "Runner Event Record");
    printSystemPageSideMenuOtion("../panel/SendRaceKit.php", "Send Race Kit");
    printSystemPageSideMenuOtion("../panel/racekit.php", "Manage Race Kit");
    printSystemPageSideMenuOtionClose("Volunteer System", "../php/volunteerindex.php");


    printSystemPageEnd();
  } else {
    returnPage("Sorry, you do not have the access right of this page.");
  }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
 ?>

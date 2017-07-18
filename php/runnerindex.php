<?php

  if ($_COOKIE['userType']=="runner") {
    require_once('dbInfo.php'); // MySQli Connection
    require_once('../lib/printForm.php'); // PrintForm Library
    printSystemPageStart("../php/runnerEditProfile.php", "../php/runnerindex.php");
    printSystemPageSideMenuOtion("../html/register_event.html", "Register Event");
    printSystemPageSideMenuOtion("../php/runnerEventRecord.php", "Event Record");

    printSystemPageSideMenuOtionClose("Runner System", "../php/runnerEditProfile.php");


    printSystemPageEnd();
  } else {
    returnPage("Sorry, you do not have the access right of this page.");
  }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
 ?>

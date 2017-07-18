<?php

  if ($_COOKIE['userType']=="admin") {
    require_once('dbInfo.php'); // MySQli Connection
    require_once('../lib/printForm.php'); // PrintForm Library
    printSystemPageStart("../php/sponsorEditProfile.php");
    printSystemPageSideMenuOtion("../html/create_charity.html", "Manage Event");
    printSystemPageSideMenuOtion("../html/create_charity.html", "Volunteer & Runner");
    printSystemPageSideMenuOtion("../html/create_charity.html", "Create Charity");
    printSystemPageSideMenuOtion("../panel/SponsorDel.php", "Sponsor Record");
    printSystemPageSideMenuOtionClose("Admin System", "../php/sponsorEditProfile.php");


    printSystemPageEnd();
  } else {
    returnPage("Sorry, you do not have the access right of this page.");
  }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
 ?>

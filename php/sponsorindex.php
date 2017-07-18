<?php

  if ($_COOKIE['userType']=="sponsor") {
    require_once('dbInfo.php'); // MySQli Connection
    require_once('../lib/printForm.php'); // PrintForm Library
    printSystemPageStart("../php/sponsorEditProfile.php");
    printSystemPageSideMenuOtion("../html/sponsorship.html", "Sponsor Runner");
    printSystemPageSideMenuOtion("../panel/SponsorDel.php", "Sponsor Record");

    printSystemPageSideMenuOtionClose("Sponsor System", "../php/sponsorEditProfile.php");


    printSystemPageEnd();
  } else {
    returnPage("Sorry, you do not have the access right of this page.");
  }

  function returnPage($message) {
    echo "<script type='text/javascript'>alert('$message'); window.location.href='../html/login.html';</script>";
  }
 ?>

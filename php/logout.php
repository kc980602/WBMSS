
<?php

if (isset($_COOKIE['userName'])) {
    unset($_COOKIE['userType']);
    unset($_COOKIE['userName']);
    unset($_COOKIE['userID']);
    returnPage("Logout successfully.");

} else {
    returnPage("Logout successfully.");
}

function returnPage($message) {
echo "<script type='text/javascript'>alert('$message'); window.location.href='../index.html';</script>";
}

 ?>

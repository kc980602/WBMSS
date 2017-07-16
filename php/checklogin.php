<?php
if(isset($_COOKIE["userType"]) && isset($_COOKIE["userID"]) isset($_COOKIE["userName"])) {
     echo $_COOKIE["userType"];
     echo $_COOKIE["userID"];
     echo $_COOKIE["userName"];
} else {
     echo "not set!";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Process Registration</title>
  </head>
  <body>
    <?php

      extract($_POST);

      echo "$fname<br>";
      echo "$lname<br>";
      echo "$Gender<br>";
      echo "$email<br>";
      echo "$ctry<br>";
      echo "$pass1<br>";
      echo "$pass2<br>";
      echo "$fileToUpload<br>";


    ?>
  </body>
</html>

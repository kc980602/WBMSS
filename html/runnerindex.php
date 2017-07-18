<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    if(isset($_COOKIE["userType"]) && isset($_COOKIE["userID"]) && isset($_COOKIE["userName"])) {
         echo $_COOKIE["userType"];
         echo $_COOKIE["userID"];
         echo $_COOKIE["userName"];
    } else {
         echo "not set!";
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../image/mss2017icon.ico">

    <title>Marathon Skills</title>


    <!-- Custom styles for this template -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../css/custom_system.css" rel="stylesheet">
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <link href="../js/bootstrap-datetimepicker.min.js" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.html"><img style="max-width:110px; margin-top: -11px;"src="../image/logo-2017-full-colour.png"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.html"><img style="max-width:30px; margin-top: -5px;"src="../image/img_home.png"></a></li>
            <li><a href="../index.html#aboutUs">About Us</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Event Info <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#routing">Routing</a></li>
              </ul>
            </li>
            <li><a href="#tranning">Tranning</a></li>
            <li><a href="#calculator">Calculator</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" style="padding:10px" data-toggle="dropdown" role="button" aria-expanded="false">
                <img style="max-height:30px;"src="../image/icon.png">
                <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../php/editProfile.php">My Profile</a></li>
                <li class="divider"></li>
                <li><a href="../php/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </nav><!--/.nav-collapse -->

    <div class="container mainContent">
      <div class="inner">
        <div class="childLeft">
          <div class="SideContainer">
            <ul class="nav bs-sidenav">
              <li>
                <a href="#glyphicons">Glyphicons</a>
                  <ul class="nav">
                    <li><a href="#glyphicons-glyphs">Available glyphs</a></li>
                    <li><a href="#glyphicons-how-to-use">How to use</a></li>
                    <li><a href="#glyphicons-examples">Examples</a></li>
                  </ul>
                </li>
              </ul>
            </div> <!-- /SideContainer -->
        </div>

        <div class="childRight">
          <form class="form-horizontal" action="../php/login.php" method="post" enctype="multipart/form-data" style="width:100%;">
            <fieldset>
              <!-- Form Name -->
              <legend>Runner System</legend>
            </fieldset>
          </form>

          <div class="container">



          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function getCookie(name) {
      var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
      if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
     else
        return null;
      }
    </script>


  </body>

  </html>

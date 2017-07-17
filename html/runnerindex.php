<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../image/mss2017icon.ico">
    <title>Runner System</title>

    <!-- Custom styles for this template -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="../css/custom_login.css" rel="stylesheet">
    <link href="../js/bootstrap.min.js" rel="stylesheet">
    <link href="../js/bootstrap-datetimepicker.min.js" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
  </head>
  <body>
    <div class="wrap">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation"  style=" height:60px;">
      <div id ="top-menu" class="container-fluid active" >
          <a class="navbar-brand-custom" href="#" style="font-size:24px"><img style="max-width:135px; margin-top: 0px;"src="../image/logo-2017-full-colour.png">
            Runner System
          </a>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img style="max-width:135px; margin-top: 0px;">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../html/runnerReg.html">My Profile</a></li>
                <li class="divider"></li>
                <li><a href="../php/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
  </nav>
  <aside id="side-menu" class="aside" role="navigation">
        <ul class="nav nav-list accordion">
          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-globe"></i>Portal<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="#">Administration</a></li>
            </ul>
          </li>

          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-users"></i>Users<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="#">Users</a></li>
              <li><a href="#">New User</a></li>
            </ul>
          </li>

          <li class="nav-header">
            <div class="link"><i class="fa fa-cloud"></i>Sites<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="#">Search Sites</a></li>
              <li><a href="#">New Site</a></li>
              <li><a href="#">Jobs</a></li>
            </ul>
          </li>

           <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-map-marker"></i>Zones<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="#">Search Zones</a></li>
              <li><a href="#">New Zone</a></li>
            </ul>
          </li>

          <li class="nav-header">
            <div class="link"><i class="fa fa-lg fa-file-image-o"></i>Reports<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
              <li><a href="#">Entries</a></li>
              <li><a href="#">Redirects</a></li>
              <li><a href="#">Pingbacks</a></li>
              <li><a href="#">Tags</a></li>
            </ul>
          </li>

      </ul>
  </aside>

  <!--Body content-->
  <div class="content">
    <div class="top-bar">
      <a href="#menu" class="side-menu-link burger">
        <span class='burger_inside' id='bgrOne'></span>
        <span class='burger_inside' id='bgrTwo'></span>
        <span class='burger_inside' id='bgrThree'></span>
      </a>
    </div>
    <section class="content-inner">
      <h2>Sample</h2>
      <h3>A responsive Top and Side Menu, resize your browser to find out</h3>
    </section>
  </div>

</div>

  </body>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</html>

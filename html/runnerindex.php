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
          <a class="navbar-brand-custom" href="#" style="font-size:24px; color:#404040;"><img style="max-width:135px; margin-top: 0px;"src="../image/logo-2017-full-colour.png">
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
  <div class="mainContent">
    <div class="container">
      <form class="form-horizontal" action="../php/login.php" method="post" enctype="multipart/form-data">
        <fieldset>

          <!-- Multiple Radios (inline) -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="type">User Type</label>
            <div class="col-md-4">
              <label class="radio-inline" for="Runner">
                <input type="radio" name="type" id="runner" value="runner" checked="checked">
                Runner
              </label>
              <label class="radio-inline" for="Volunteer">
                <input type="radio" name="type" id="volunteer" value="volunteer">
                Volunteer
              </label>
              <label class="radio-inline" for="Sponsor">
                <input type="radio" name="type" id="sponsor" value="sponsor">
                Sponsor
              </label>
            </div>
          </div>

          <!-- Form Name -->
          <legend>Login</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="fn">ID</label>
            <div class="col-md-4">
              <input id="id" name="id" type="text" placeholder="your id" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="ln">Password</label>
            <div class="col-md-4">
              <input id="Password" name="Password" type="Password" placeholder="password" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
              <button id="reset" name="reset" type="reset" class="btn btn-primary">RESET</button>
              <button id="submit" name="submit" class="btn btn-primary" style="float:right;">SUBMIT</button>
            </div>
          </div>

        </fieldset>
      </form>



    </div> <!-- /container -->
  </div> <!-- /mainContent -->


</div>

  </body>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</html>

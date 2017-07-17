<?php
function printFormItem($name, $text, $hint, $type, $value){
  if($type!="date"){
    $length = "255";
    $min = "";
  }else{
    $length = "";
    $min = "1999-12-31";
  }
  $itemHtml = <<< EOD
  <div class="form-group">
    <label class="col-md-4 control-label" for="$name">$text</label>
    <div class="col-md-4">
    <input id="$name" name="$name" type="$type" placeholder="$hint"
    value="$value" class="form-control input-md" required="" maxlength="$length"
    min="$min">
    </div>
  </div>
EOD;
 echo $itemHtml;
}
function printRadio($name, $topic, $textA, $valueA, $textB, $valueB, $checked){
 $a = "";
 $b = "";
  if($checked==$valueA) $a = "checked";
  if($checked==$valueB) $b = "checked";
  $itemHtml = <<< EOF
<div class="form-group">
  <label class="col-md-4 control-label" for="$name">$topic</label>
  <div class="col-md-4">
    <label class="radio-inline" for="$name-0">
      <input type="radio" name="$name" id="$name-0" value="$valueA" $a>
      $textA
    </label>
    <label class="radio-inline" for="$name-1">
      <input type="radio" name="$name" id="$name-1" value="$valueB" $b>
      $textB
    </label>
  </div>
</div>
EOF;
echo $itemHtml;
}
function printFormButton($name, $text, $type, $action){
  $itemHtml = <<< EOC
  <div class="form-group">
    <div class="col-md-4">
      <button type="$type" id="$name" name="$name" class="btn btn-primary" onclick="$action">$text</button>
    </div>
  </div>
EOC;
echo $itemHtml;
}

  function readOnlyForm($fieldName, $Value) {
    $formItem = <<< EOF
    <div class="form-group">
      <label class="col-md-4 control-label" for="lname">$fieldName</label>
      <div class="col-md-4">
        <input id="$fieldName" name="$fieldName" value="$Value" type="text" class="form-control input-md" readonly >
      </div>
    </div>
EOF;
    echo $formItem;
  }

  function printLabel($message) {
    $item = <<< EOF
    <div class="form-group">
      <label class="col-md-5 control-label" for="lname" style="color: red;">$message</label>
    </div>
EOF;
    echo $item;
  }

  function printPic($fieldName, $Value) {
    $item = <<< EOF
    <div class="form-group">
      <label class="col-md-4 control-label" for="lname">$fieldName</label>
      <div class="col-md-4">
      <img class="img-responsive" src="$Value" width="460" height="345">
      </div>
    </div>
EOF;
    echo $item;
  }

  function printHead() {
    $head = <<< EOF
    <!DOCTYPE html>
    <html lang="en">
    <head>
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
      <link href="../css/custom.css" rel="stylesheet">
      <link href="../js/bootstrap.min.js" rel="stylesheet">
      <link href="../js/bootstrap-datetimepicker.min.js" rel="stylesheet">
      <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    </head>
    <body>
EOF;
    echo $head;

  }

function printBody() {
  $body = <<< EOF
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
          <li><a href="../html/login.html">Login</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Register<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="../html/runnerReg.html">Runner</a></li>
              <li><a href="../html/volunteerReg.html">Volunteer</a></li>
              <li><a href="../html/sponsorReg.html">Sponsor</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav><!--/.nav-collapse -->

  <div class="mainContent">
    <div class="container">
EOF;
  echo $body;
}

function printEnd() {
  $end = <<< EOF
        </div> <!-- /container -->
      </div> <!-- /mainContent -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    </body>
  </html>
EOF;
  echo $end;
}

function printFormClassStart($pageTitle) {
  $code = <<< EOF
  <form class="form-horizontal" action="../php/runnerReg.php" method="post" enctype="multipart/form-data">
    <fieldset>

      <!-- Form Name -->
      <legend>$pageTitle</legend>
EOF;
  echo $code;
}

function printFormClassEnd() {
  $code = <<< EOF
  </fieldset>
</form>
EOF;
  echo $code;
}

?>

<?php

function cBody($link) {
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
  <li class="active"><a href="$link"><img style="max-width:30px; margin-top: -5px;"src="../image/img_home.png"></a></li>
  </ul>

  </li>
  </ul>
  </div>
  </div>
  </nav><!--/.nav-collapse -->

  <div class="mainContent">
EOF;
  echo $body;
}
function cEnd() {
  $end = <<<EOF
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
?>

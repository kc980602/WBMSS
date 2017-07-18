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


  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="~/Scripts/AssetsBS3/ie8-responsive-file-warning.js"></script><![endif]-->
  <style>
    #display-total{
      width: 40%;
      height: 30%;
      margin:auto;
      text-align: center;
      border: 2px solid;
      border-radius: 5px;
    }
    #disregister:hover{
      width: 30px;
      height: 30px;
      cursor: pointer;
    }
  </style>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <div class="mainContent">
    <div class="container">
      <form class="form-horizontal" name="charityRecordForm" onSubmit="submitForm();return false;" action="../php/createCharity.php" method="post" id="charity_form" enctype="multipart/form-data">
        <fieldset>

          <!-- Form Name -->
          <legend>Create Charity</legend>

          <!-- Charities -->
          <img style="display:block;margin:auto" width="100" height="100" style="margin:auto" id="image-view">
          <div class="form-group" style="margin-top:2.5%;">
            <label class="col-md-4 control-label" for="fn">Target Charity</label>
            <div class="col-md-4">
				          <select placeholder="Select a Charity" onchange="changeCharityInfo(this)" class="form-control" id="charities-selection" name="CharityID">
                  </select>
            </div>

          </div>
          <p style="margin-left: 35%;" id="events-price"></p>

          <!-- Sponsor Amount -->
          <div class="form-group">
                  <label class="col-md-4 control-label" for="ln">Sponsor Amount</label>
                  <div class="col-md-4">
      			     <input placeholder="HKD" class="form-control" type="number" min="0" max="1000000" id="amount-input" name="amount">
				  </div>
          </div>
          <!-- Website URL -->
          <div class="form-group" style=".center-block();">
            <label class="col-md-4 control-label" for="ln">Website URL</label>
            <div class="col-md-6">
                <div id="websiteURL-view" name="websiteURL"></div>
            </div>
          </div>

          <!-- Logo -->
          <div class="form-group" style=".center-block();">
            <label class="col-md-4 control-label" for="ln">Description</label>
            <div class="col-md-6">
                <div id="description-view"></div>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
              <input type="button" style="margin-top:10%;float:left;" id="cancelButton" onclick="window.top.closeForm()" value="Cancel" class="btn btn-primary">
              <input type="submit" style="margin-top:10%;float:right;" id="continueButton" name="submit" value="Continue" class="btn btn-primary">
            </div>
          </div>

        </fieldset>
      </form>



    </div> <!-- /container -->
  </div> <!-- /mainContent -->

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

  <?php
    extract($_GET);
    if(isset($RegID)){
      echo "<script type='text/javascript'>
            var RegID = $RegID
            </script>";
    }
  ?>
	<script type="text/javascript">
    var selectedCharityID;

    function refreshRecords(){
      $.ajax({
          method: "POST",
          url: "../php/getCharities.php",
          dataType: "json"
        })
        .done(function(data) {
          document.querySelector("#charities-selection").innerHTML = "";
          data = data.replace(/\r?\n/g,"|n|n|n|");
          console.log(data);
          json = $.parseJSON(data);
          for(var i = 0; i < json.length; i++){
            var value = json[i];
            var html = "<option data-Logo='"+value.Logo+"' data-WebsiteUrl='"+value.WebsiteUrl+"' data-Description='"+value.Description+"' value='"+value.CharityID+"'>"+value.Name+"</option>";
            $(html).appendTo("#charities-selection");
            changeCharityInfo(document.getElementById("charities-selection"));
          }
        });
    }

    function changeCharityInfo(selectedCharity){
      console.log(selectedCharity);
      var index = selectedCharity.selectedIndex;
      selectedCharityID = selectedCharity.options[index].value;
      $("#image-view")[0].src = selectedCharity.options[index].dataset.logo;
      $("#websiteURL-view")[0].innerHTML = "<a href='"+selectedCharity.options[index].dataset.websiteurl+"'>"+selectedCharity.options[index].dataset.websiteurl+"</a>";
      $("#description-view")[0].innerHTML = selectedCharity.options[index].dataset.description.replace("|n|n|n|","</br>").replace("|n|n|n||n|n|n|","</br></br>").replace("|n|n|n| |n|n|n|","</br></br>");
    }

    function submitForm(){
        var formData = new FormData($("#charity_form")[0]);
        formData.append( "RegID", RegID );
        $.ajax({
          method: "POST",
          url: "../php/makeDonation.php",
          contentType: false,
          processData: false,
          data: formData
        })
          .done(function( msg ) {
            alert(msg);
            if(msg.includes("You have successfully sponsored the runner with the charity!")){
              window.top.location.assign("../php/payment.php?amount="+document.querySelector("#amount-input").value+"&location=../html/sponsorship.html");
            }
          });
    }

    refreshRecords();
	</script>

</body>

</html>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <link rel='stylesheet prefetch' href='../css/bootstrap.css'>
  <link rel="stylesheet" href="../css/payment.css">

<script type="text/javascript">
function validateForm() {
    var x = document.forms["payment"]["CreditCardNumber"].value;
    if (x.length < 16) {
        alert("Card Number is not valid.");
		return;
    }
	
	function isValidDate(s) {
	  var separators = ['\\.', '\\-', '\\/'];
	  var bits = s.split(new RegExp(separators.join('|'), 'g'));
	  var d = new Date(bits[2], bits[1] - 1, bits[0]);
	  return d.getFullYear() == bits[2] && d.getMonth() + 1 == bits[1];
	} 
    var y = document.forms["payment"]["ExpiryDate"].value;
    if (isValidDate(y)) {
        alert("Expiry date is not valid.");
		return;
    }

    var z = document.forms["payment"]["SecurityCode"].value;
    if (z.length < 3) {
        alert("Security code is not valid.");
		return;
    }
	var result = confirm("Are you sure you want to finish the payment?");
	if(result == true){
		alert("You have sucessfully finished the payment.\nThank You for your collaboration.");
		window.location.assign($("#paymentButton").attr("data-caption"));
	}
}
</script>



</head>

<body>
<!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'> -->
<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->


<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Fee</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>

      <form name="payment" action="payment.html" onsubmit="return false;" method="post">
          <div class="form-group">
              <label for="PaymentAmount">Payment amount</label>
              <div class="amount-placeholder">
                  <span>$</span>

                  <!-- Change the amount in different user -->
                  <?php
					extract($_GET);
					$money = 0;
					if(isset($amount)){
						$money = $amount;
					}
					echo "<span>$money</span>";
				  ?>
                  <!--  -->
              </div>
          </div>
          <!-- <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" class="form-control" type="text" maxlength="255"></input>
          </div> -->
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" class="null card-image form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Expiry date</label>
              <input id="ExpiryDate" class="form-control" type="text" placeholder="MM / YY" maxlength="10"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Security code</label>
              <div class="input-container" >
                  <input id="SecurityCode" class="form-control" type="text" ></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>

          <!-- <div class="zip-code-group form-group">
              <label for="ZIPCode">ZIP/Postal code</label>
              <div class="input-container">
                  <input id="ZIPCode" class="form-control" type="text" maxlength="10"></input>
                  <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a>
              </div>
          </div> -->

          <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit" onclick="validateForm()">
              <span class="submit-button-lock"></span>
			  <?php
				$address = "../index.html";
				if(isset($location)){
					$address = $location;
				}
				$money = 0;
				if(isset($amount)){
					$money = $amount;
				}
				echo "<span data-caption='$address' id='paymentButton' class='align-middle'>Pay ".'$ '."$money</span>";
			  ?>
          </button>
      </form>
  </div>
</div>
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
        <script src='../js/jquery-3.2.1.min.js'></script>
    <!-- <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script> -->
        <script src='../js/bootstrap.min.js'></script>
    <script src="../js/payment.js"></script>
</body>
</html>

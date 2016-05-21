<?php
	ini_set("error_reporting" , 1);
	error_reporting(E_ALL);
	
	
		 $id = isset($_GET['UID']) ? $_GET['UID'] : -1;
		$cid = isset($_GET['CID']) ? $_GET['CID'] : -1;
	$product = isset($_GET['product']) ? $_GET['product'] : "premium";
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>ABERPAY Payment System - Powered By BizList</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap-switch.css" rel="stylesheet">
		<style>
			html, body
			{
				min-height: 100%;
				/*overflow: hidden;*/
			}
			#container
			{
				margin-top: 25px !important;
			}
			p, h1{
				text-align: center;
			}
		</style>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
	
	<!-- 
	http://bootsnipp.com/snippets/featured/derwiki039s-stripe-payment-form-updated
	http://getbootstrap.com/getting-started/#download
	-->
	
	<div class="panel panel-danger"></div>
	
	<div class="container">
		<div class='row'>
			<div class='col-md-4'></div>
			
			<div class='col-md-4'>
				<div class='col-md-12 form-group'>
					<h1>Bobs Merchant Payment Gateway</h1>
					<hr class="featurette-divider" />
					<p><b>Message from Bob: </b><br>
						Please fill out all fields below to complete the transaction. 
						First time buyers will need to pass moderation before being able to publish content.
					</p>
				
		<?php	
			echo '<form accept-charset="UTF-8" action="http://mayar.abertay.ac.uk/~0706008/aberpay/pay.php?UID=' . $id . '&amp;CID=' . $cid . '&amp;product=' . $product . '" class="require-validation" id="payment-form" method="post">';
		?>
					<div style="margin:0;padding:0;display:inline">
						
						<div class='form-row'>
							<div class='col-xs-12 form-group required'>
								<label class='control-label'>Name on Card</label>
								<input name="name" class='form-control' size='4' type='text' pattern="[a-zA-Z ]+" title="Letters only. Upper and Lowercase are supported. Spaces Allowed too."> <!-- match global-->
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-xs-12 form-group card required'>
								<label class='control-label'>Card Number</label>
								<input  name="card_number" autocomplete='off' class='form-control card-number' size='20' type='text' pattern="\d{12}" title="Credit Cards must have 12-digits."> <!-- regexp pass:: \d[99]\d{10} -->
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-xs-12 form-group card required'>
								<label class='control-label'>Billing Address</label>
								<input name="billing_address" autocomplete='off' class='form-control' size='20' type='text' pattern="^\w[a-zA-Z 0-9.']{5,100}$" title="Letters, Numbers, Full stops and apostrophes only.">
							</div>
						</div>
						
						<div class='form-row'>
							<div class='col-xs-4 form-group cvc required'>
								<label class='control-label'>Security N<sup>o</sup></label>
								<input name="svc" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' pattern="^\d{3}$" title="SVC codes are 3 numbers, found on the back of your card.">
							</div>
							
							<div class='col-xs-4 form-group expiration required'>
								<label class='control-label'>Expiration</label>
								<input name="expires_month" class='form-control card-expiry-month' placeholder='MM' size='2' type='text' pattern="^(0?[1-9]|1[012])$" title="Enter month in the format XX">
							</div>
							
							<div class='col-xs-4 form-group expiration required'>
								<label class='control-label'>Year</label>
								<input name="expires_year" class='form-control card-expiry-year' placeholder='YY' size='4' type='text' pattern="^(20[1][56789]|202[0123456789]|2[0123456789]|1[56789])$" title="Enter year in the format XX or XXXX (range 2015 --> 2029, or 15--> 29)">
							</div>
						</div>
						
						<!-- http://www.bootstrap-switch.org/options.html -->
						
						<div class='form-row'>
							<div class='col-md-12 form-group' style="background-color: aliceblue; padding-bottom: 15px;">
								<hr class="featurette-divider" />
								<!-- 
									<button class='form-control btn btn-success submit-button' disabled style="margin-top: 10px;"><span class="badge">Your total today: $300</span></button>
								-->
								
								<p>You may change your listing type here, if you have changed your mind.</p>
								
								<?php
									echo '<input type="checkbox" name="product" value="premium" '; 
									
									if ($product != "premium")
									{
										echo ">";
									}
									else
									{
										echo "checked>";
									}
								?>
								
								<hr />
								<button class='form-control btn btn-primary submit-button' type='submit' style="margin-top: 10px;"> Pay »</button>
							</div>
						</div>

						<div class='form-row'>
							<div class='col-md-12 error form-group hide'>
								<div class='alert-danger alert'>
									Please correct the errors and try again.
								</div>
							</div>
						</div>
					</div>
					</form>
				
				
					<div class='col-md-4'></div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="panel panel-danger"></div>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="bootstrap-switch.js"></script>
	<script>
	$(function() {
	$('form.require-validation').bind('submit', function(e) {
	var $form         = $(e.target).closest('form'),
	inputSelector = ['input[type=email]', 'input[type=password]',
	'input[type=text]', 'input[type=file]',
	'textarea'].join(', '),
	$inputs       = $form.find('.required').find(inputSelector),
	$errorMessage = $form.find('div.error'),
	valid         = true;

	$errorMessage.addClass('hide');
	$('.has-error').removeClass('has-error');
	$inputs.each(function(i, el) {
	var $input = $(el);
	if ($input.val() === '') {
	$input.parent().addClass('has-error');
	$errorMessage.removeClass('hide');
	e.preventDefault(); // cancel on first error
	}
	});
	});
	});


	$.fn.bootstrapSwitch.defaults.onText = 'Premium';
	$.fn.bootstrapSwitch.defaults.offText = 'Businness';
	$("[name='product']").bootstrapSwitch();

	
	</script>
</body>
</html>
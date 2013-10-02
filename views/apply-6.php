<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 5 - Payment Details</h1>
	<div class="row">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			Details
		</div>
		<div class="col-md-1 apply-progress">
			Rerferences
		</div>
		<div class="col-md-1 apply-progress">
			Partners
		</div>
		<div class="col-md-1 apply-progress">
			Fuel Cards
		</div>
		<div class="col-md-1 apply-progress">
			<b>Payment Details</b>
		</div>
		<div class="col-md-1 apply-progress">
			Authorization
		</div>
		<div class="col-md-1 apply-progress">
			Terms and Conditions
		</div>
		<div class="col-md-1 apply-progress">
			Review and Finish
		</div>
	</div>
	<div class="row" id="progress-circles">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			<img src="images/progress-green-left.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-right.jpeg" />
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">
		
			<form class="form" method="post" role="form" action="index.php?apply">
			  <input type="hidden" class="form-control" name="page" id="page" value="6">
			  
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Payment Option</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="paymentType" class=" control-label">Payment Type</label>
				  </div>
				  <div class="col-md-4">
					  <select name="paymentType" id="paymentType">
							<?php if (isset($data['valids']['paymentType'])) { 
								$selected_value = $data['valids']['paymentType'];
							?>
							<option value="select">Select...</option>
							<option value="directDebit" <?php if ($selected_value == 'directDebit') echo 'selected';?>>Direct Debit</option>
							<option value="creditCard" <?php if ($selected_value == 'creditCard') echo 'selected';?>>Credit Card</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="directDebit">Direct Debit</option>
							<option value="creditCard">Credit Card</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['paymentType'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['paymentType']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  
			  <div class="row form-subheading direct-debit-form">
			   <div class="col-md-12">
			   <h4>Option 1 - Direct Debit</h4>
			   </div>
			  </div>
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="ddAuthoriseName" class="control-label">Authorisation</label>
				  </div>
				  <div class="col-md-4">
					 I/We <br /><br />
					 <?php if (isset($data['valids']['ddAuthoriseName'])) { ?>
					 <input type="text" class="form-control" id="ddAuthoriseName" name="ddAuthoriseName" placeholder="Business Name"  value="<?php echo $data['valids']['ddAuthoriseName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ddAuthoriseName" name="ddAuthoriseName" placeholder="Business Name">
					 <?php } ?>
					 <br />
					 authorise Adshell Chemicals Card to debit on an ongoing basis the bank account detailed below with the amount due
					in accordance with the Adshell Chemicls Card terms and conditions.
				  </div>
				  <?php if (isset($data['errors']['ddAuthoriseName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ddAuthoriseName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="accountType" class=" control-label">Account Type</label>
				  </div>
				  <div class="col-md-4">
					  <select name="accountType">
							<?php if (isset($data['valids']['accountType'])) { 
								$selected_value = $data['valids']['accountType'];
							?>
							<option value="select">Select...</option>
							<option value="savings" <?php if ($selected_value == 'savings') echo 'selected';?>>Savings</option>
							<option value="cheque" <?php if ($selected_value == 'cheque') echo 'selected';?>>Cheque</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="savings">Savings</option>
							<option value="cheque">Cheque</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['accountType'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['accountType']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="bankName" class="control-label">Name of Financial Institution</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['bankName'])) { ?>
					 <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Name of Financial Institution"  value="<?php echo $data['valids']['bankName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="bankName" name="bankName" placeholder="Name of Financial Institution">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['bankName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['bankName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="accountName" class="control-label">Account Name</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['accountName'])) { ?>
					 <input type="text" class="form-control" id="accountName" name="accountName" placeholder="Account Name"  value="<?php echo $data['valids']['accountName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="accountName" name="accountName" placeholder="Account Name">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['accountName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['accountName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="bsbNo" class="control-label">BSB Number</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['bsbNo'])) { ?>
					 <input type="text" class="form-control" id="bsbNo" name="bsbNo" placeholder="BSB"  value="<?php echo $data['valids']['bsbNo']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="bsbNo" name="bsbNo" placeholder="BSB">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['bsbNo'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['bsbNo']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="accountNo" class="control-label">Account Number</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['accountNo'])) { ?>
					 <input type="text" class="form-control" id="accountNo" name="accountNo" placeholder="Account Number"  value="<?php echo $data['valids']['accountNo']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="accountNo" name="accountNo" placeholder="Account Number">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['accountNo'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['accountNo']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row form-subheading direct-debit-form">
			   <div class="col-md-12">
			   <h4>Direct Debit Acknowledgement</h4>
			   </div>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-7">
					By filling out your full name below for this Direct Debit Request you acknowledge having read and understood the terms
					set out in thei Request and in the Direct Debit Service Agreement.
				  </div>
			  </div>
			  
			  <div class="row direct-debit-form">
				  <div class="col-md-3">
					<label for="ddAcknowdledgeName" class="control-label">Full Name</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['ddAcknowdledgeName'])) { ?>
					 <input type="text" class="form-control" id="ddAcknowdledgeName" name="ddAcknowdledgeName" placeholder="Full Name"  value="<?php echo $data['valids']['ddAcknowdledgeName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ddAcknowdledgeName" name="ddAcknowdledgeName" placeholder="Full Name">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['ddAcknowdledgeName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ddAcknowdledgeName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  
			  
			 
			 <div class="row form-subheading credit-card-form">
			   <div class="col-md-12">
			   <h4>Option 2 - Credit Card</h4>
			   </div>
			  </div>
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccAuthoriseName" class="control-label">Authorisation</label>
				  </div>
				  <div class="col-md-4">
					 I/We <br /><br />
					 <?php if (isset($data['valids']['ccAuthoriseName'])) { ?>
					 <input type="text" class="form-control" id="ccAuthoriseName" name="ccAuthoriseName" placeholder="Business Name"  value="<?php echo $data['valids']['ccAuthoriseName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ccAuthoriseName" name="ccAuthoriseName" placeholder="Business Name">
					 <?php } ?>
					 <br />
					 authorise Adshell Chemicals Card to debit on an ongoing basis the credit card detailed below with the amount due
					in accordance with the Adshell Chemicls Card terms and conditions.
				  </div>
				  <?php if (isset($data['errors']['ccAuthoriseName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccAuthoriseName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccPaymentDate" class=" control-label">Monthly Payment Date</label>
				  </div>
				  <div class="col-md-4">
					  <select name="ccPaymentDate">
							<?php if (isset($data['valids']['ccPaymentDate'])) { 
								$selected_value = $data['valids']['ccPaymentDate'];
							?>
							<option value="select">Select...</option>
							<option value="14th" <?php if ($selected_value == '14th') echo 'selected';?>>14th</option>
							<option value="28th" <?php if ($selected_value == '28th') echo 'selected';?>>28th</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="14th">14th</option>
							<option value="28th">28th</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['ccPaymentDate'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccPaymentDate']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccName" class="control-label">Credit Card in the name of</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['ccName'])) { ?>
					 <input type="text" class="form-control" id="ccName" name="ccName" placeholder="Credit Card Name"  value="<?php echo $data['valids']['ccName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ccName" name="ccName" placeholder="Credit Card Name">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['ccName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccNo" class="control-label">Credit Card Number</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['ccNo'])) { ?>
					 <input type="text" class="form-control" id="ccNo" name="ccNo" placeholder="Credit Card Number"  value="<?php echo $data['valids']['ccNo']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ccNo" name="ccNo" placeholder="Credit Card Number">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['ccNo'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccNo']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccExpiryMonth" class=" control-label">Expiry Date</label>
				  </div>
				  <div class="col-md-2">
					  <select name="ccExpiryMonth">
							<?php if (isset($data['valids']['ccExpiryMonth'])) { 
								$selected_value = $data['valids']['ccExpiryMonth'];
							?>
							<option value="select">Select Month...</option>
							<option value="01" <?php if ($selected_value == '01') echo 'selected';?>>January</option>
							<option value="02" <?php if ($selected_value == '02') echo 'selected';?>>February</option>
							<option value="03" <?php if ($selected_value == '03') echo 'selected';?>>March</option>
							<option value="04" <?php if ($selected_value == '04') echo 'selected';?>>April</option>
							<option value="05" <?php if ($selected_value == '05') echo 'selected';?>>May</option>
							<option value="06" <?php if ($selected_value == '06') echo 'selected';?>>June</option>
							<option value="07" <?php if ($selected_value == '07') echo 'selected';?>>July</option>
							<option value="08" <?php if ($selected_value == '08') echo 'selected';?>>August</option>
							<option value="09" <?php if ($selected_value == '09') echo 'selected';?>>September</option>
							<option value="10" <?php if ($selected_value == '10') echo 'selected';?>>October</option>
							<option value="11" <?php if ($selected_value == '11') echo 'selected';?>>November</option>
							<option value="12" <?php if ($selected_value == '12') echo 'selected';?>>December</option>
							<?php } else { ?>
							<option value="select">Select Month...</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
							<?php } ?>
						</select>
				  </div>
				  
				  <div class="col-md-2">
					  <select name="ccExpiryYear">
							<?php if (isset($data['valids']['ccExpiryYear'])) { 
								$selected_value = $data['valids']['ccExpiryYear'];
							?>
							<option value="select">Select Year...</option>
							<option value="2014" <?php if ($selected_value == '2014') echo 'selected';?>>2014</option>
							<option value="2015" <?php if ($selected_value == '2015') echo 'selected';?>>2015</option>
							<option value="2016" <?php if ($selected_value == '2016') echo 'selected';?>>2016</option>
							<option value="2017" <?php if ($selected_value == '2017') echo 'selected';?>>2017</option>
							<option value="2018" <?php if ($selected_value == '2018') echo 'selected';?>>2018</option>
							<option value="2019" <?php if ($selected_value == '2019') echo 'selected';?>>2019</option>
							<option value="2020" <?php if ($selected_value == '2020') echo 'selected';?>>2020</option>
							<?php } else { ?>
							<option value="select">Select Year...</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<?php } ?>
						</select>
				  </div>
				  
				  <?php if (isset($data['errors']['ccExpiryDate'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccExpiryDate']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccType" class=" control-label">Card Type</label>
				  </div>
				  <div class="col-md-4">
					  <select name="ccType">
							<?php if (isset($data['valids']['ccType'])) { 
								$selected_value = $data['valids']['ccType'];
							?>
							<option value="select">Select...</option>
							<option value="visa" <?php if ($selected_value == 'visa') echo 'selected';?>>Visa</option>
							<option value="mastercard" <?php if ($selected_value == 'mastercard') echo 'selected';?>>Mastercard</option>
							<option value="bankcard" <?php if ($selected_value == 'bankcard') echo 'selected';?>>Bankcard</option>
							<option value="american" <?php if ($selected_value == 'american') echo 'selected';?>>American Express</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="visa">Visa</option>
							<option value="mastercard">Mastercard</option>
							<option value="bankcard">Bankcard</option>
							<option value="american">American Express</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['ccType'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccType']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  
			  <div class="row form-subheading credit-card-form">
			   <div class="col-md-12">
			   <h4>Credit Card Acknowledgement</h4>
			   </div>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-7">
					By filling out your full name below you acknowledge having read and understood the terms and conditions.
				  </div>
			  </div>
			  
			  <div class="row credit-card-form">
				  <div class="col-md-3">
					<label for="ccAcknowdledgeName" class="control-label">Full Name</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['ccAcknowdledgeName'])) { ?>
					 <input type="text" class="form-control" id="ccAcknowdledgeName" name="ccAcknowdledgeName" placeholder="Full Name"  value="<?php echo $data['valids']['ccAcknowdledgeName']; ?>">
					 <?php } else { ?>
					 <input type="text" class="form-control" id="ccAcknowdledgeName" name="ccAcknowdledgeName" placeholder="Full Name">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['ccAcknowdledgeName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['ccAcknowdledgeName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  

			  <div class="row">
				<div class="col-md-3">
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=5">&laquo; Back</a>
				  </div>
				  <div class="col-md-6">
					 <br />
					 <button class="btn btn btn-primary" type="submit">Next Step &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
		
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	  
	function showPaymentForm() {  
		if ($('#paymentType').val() == 'select') 
		{
			$('.direct-debit-form').hide();
			$('.credit-card-form').hide();
		} else if ($('#paymentType').val() == 'directDebit') {
			$('.direct-debit-form').show();
			$('.credit-card-form').hide();
		} else {
			$('.direct-debit-form').hide();
			$('.credit-card-form').show();
		}
	}
	
	showPaymentForm();

	//once user selects payment type show the form for that option
	$('#paymentType').change(function(event) {

		showPaymentForm();

	});

});
</script>

<?=$data['footer'];?>
<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="row spacing-under">
		 <h4 class="red-text"><a class="red-text"  href="index.php?employee&action=managecust">Manage Customer Accounts</a> > <a class="red-text"  href="index.php?employee&action=managecust&second=manage&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>">Manage <?php echo $data['businessName']; ?></a> > Update Customer Details </h4>
	</div>
	<?php if (isset($data['notification'])) { ?>
	<div class="alert alert-dismissable alert-success">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?php echo $data['notification']; ?>
	</div>
	<?php } ?>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">
			<form class="form" method="post" role="form" id="detailsForm" action="index.php?employee">
			<input type="hidden" class="form-control" name="action" id="action" value="managecust">
			<input type="hidden" class="form-control" name="second" id="second" value="changedetails">
			<input type="hidden" class="form-control" name="custid" id="custid" value="<?php echo $data['detailedCustomer']['customerID']; ?>">
			<input type="hidden" class="form-control" name="appid" id="appid" value="<?php echo $data['detailedCustomer']['applicationID']; ?>">
			
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Details</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-5">
					<label for="busType" class="control-label">Business Type</label>
				  </div>
				  <div class="col-md-7">
					<select name="biztype">
						<?php 
						if (isset($data['detailedCustomer']['businessType'])) { 
							$selected_value = $data['detailedCustomer']['businessType'];
						?>
						<option value="sole" <?php if ($selected_value == 'Sole Trader') echo 'selected';?>>Sole Trader</option>
						<option value="company" <?php if ($selected_value == 'Company') echo 'selected';?>>Company</option>
						<option value="partnership" <?php if ($selected_value == 'Partnership') echo 'selected';?>>Partnership</option>
						<option value="trust" <?php if ($selected_value == 'Trust') echo 'selected';?>>Trust</option>
						<option value="government" <?php if ($selected_value == 'Government') echo 'selected';?>>Government</option>
						<?php } else { ?>
						<option value="sole">Sole Trader</option>
						<option value="company">Company</option>
						<option value="partnership">Partnership</option>
						<option value="trust">Trust</option>
						<option value="government">Government</option>
						<?php } ?>
					</select>
				  </div>
			  </div>	
			  	
			  
			  <div class="row">
				  <div class="col-md-5">
					<label for="businessName" class="control-label">Registered Business Name</label>
				  </div>
				  <div class="col-md-7">
					<?php if (isset($data['detailedCustomer']['businessName'])) { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" value="<?php echo $data['detailedCustomer']['businessName'];?>" >	
					<?php } else { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" >
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="bizname-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-5">
					<label for="tradingName" class="control-label">Trading Name</label>
				  </div>
				  <div class="col-md-7">
					<?php if (isset($data['detailedCustomer']['tradingName'])) { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name"  value="<?php echo $data['detailedCustomer']['tradingName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="tradingname-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="yearBizStart" class="control-label">Year Business Commenced</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['businessStartYear'])) { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced" value="<?php echo $data['detailedCustomer']['businessStartYear'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="year-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="abn" class="control-label">ABN/ACN</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['abn'])) { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN"  value="<?php echo $data['detailedCustomer']['abn'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="abn-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="operations" class="control-label">Nature of Operations</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['operationsNaure'])) { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations" value="<?php echo $data['detailedCustomer']['operationsNaure'];?>" >
					<?php } else { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="operations-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Contact Details</h4>
				</div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="contactFirstName" class="control-label">Contact First Name</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['contactFirstName'])) { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name" value="<?php echo $data['detailedCustomer']['contactFirstName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="firstname-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="contactLastName" class="control-label">Contact Last Name</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['contactLastName'])) { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name" value="<?php echo $data['detailedCustomer']['contactLastName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="lastname-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="inputPosition" class="control-label">Position</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['position'])) { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position"  value="<?php echo $data['detailedCustomer']['position'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="position-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="inputPhone" class="control-label">Phone Number</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['phone'])) { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone"  value="<?php echo $data['detailedCustomer']['phone'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
					 <?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="phone-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="inputFax" class="control-label">Fax</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['fax'])) { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax" value="<?php echo $data['detailedCustomer']['fax'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax">
					 <?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="fax-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="inputMobile" class="control-label">Mobile</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['mobile'])) { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile" value="<?php echo $data['detailedCustomer']['mobile'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile">
					 <?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="mobile-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row"><div class="col-md-5">
					<label for="inputEmail1" class="control-label">Email</label>
				  </div>
				 <div class="col-md-7"> <?php if (isset($data['detailedCustomer']['email'])) { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail" placeholder="Email" value="<?php echo $data['detailedCustomer']['email'];?>" >
					<?php } else { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail" placeholder="Email">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-offset-5 col-md-7 red-text" id="email-error">
					&nbsp;
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-7 col-md-offset-5">
					 <br />
					 
					 <button class="btn btn btn-primary" type="submit" id="detailsSubmit">Update &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
		
	</div>
</div>	

<script type="text/javascript">
$(document).ready(function(){
	
	  function IsNumeric(input)
	  {
		return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
	  }
	  
	  function checkLength(input, maxLength)
	  {
		return (input.length > 0) && (input.length <= maxLength);
	  }
	  
	  $('#detailsSubmit').on('click', function(event) {
	    event.preventDefault();
		var error = 0;
		
		var toCheck = $('#businessName').val();
		$( "input.form-control" ).each(function( index ) {
		  console.log( index + ": " + $(this).val() );
		  var valToCheck = $(this).val();
		  var inputID = $(this).attr('id');
		  var errorMessage = '';
		  if (inputID == 'businessName')
		  {
			
			 if (!checkLength(valToCheck, 40))
			 {
				errorMessage = 'Business name must be 40 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'tradingName') {
			 if (!checkLength(valToCheck, 60))
			 {
				errorMessage = 'Trading name must be 60 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'yearBizStart') {
			 if (!(valToCheck.length == 4) || !IsNumeric(valToCheck))
			 {
				errorMessage = 'Business start year must be a valid year.';
				error = error + 1;
			 }
		  } else if (inputID == 'abn') {
			 if (!checkLength(valToCheck, 11) || !IsNumeric(valToCheck))
			 {
				errorMessage = 'ABN/ACN must be 11 digits.';
				error = error + 1;
			 }
		  } else if (inputID == 'operations') {
			 if (!checkLength(valToCheck, 200))
			 {
				errorMessage = 'Nature of operations must be 200 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'contactFirstName') {
			 if (!checkLength(valToCheck, 15))
			 {
				errorMessage = 'First name must be 15 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'contactLastName') {
			 if (!checkLength(valToCheck, 15))
			 {
				errorMessage = 'Last name must be 15 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'inputPosition') {
			 if (!checkLength(valToCheck, 40))
			 {
				errorMessage = 'Position must be 40 characters or less.';
				error = error + 1;
			 }
		  }  else if (inputID == 'inputPosition') {
			 if (!checkLength(valToCheck, 40))
			 {
				errorMessage = 'Position must be 40 characters or less.';
				error = error + 1;
			 }
		  }   else if (inputID == 'inputPhone') {
			 if (!checkLength(valToCheck, 10) || !IsNumeric(valToCheck))
			 {
				errorMessage = 'Phone number must be 10 digits or less.';
				error = error + 1;
			 }
		  }  else if (inputID == 'inputFax') {
			 if (!checkLength(valToCheck, 10) || !IsNumeric(valToCheck))
			 {
				errorMessage = 'Fax must be 10 digits or less.';
				error = error + 1;
			 }
		  }  else if (inputID == 'inputMobile') {
			 if (!checkLength(valToCheck, 10) || !IsNumeric(valToCheck))
			 {
				errorMessage = 'Mobile must be 10 digits or less.';
				error = error + 1;
			 }
		  }  else if (inputID == 'inputEmail') {
			 if (!checkLength(valToCheck, 80))
			 {
				errorMessage = 'Email address must be 80 characters or less.';
				error = error + 1;
			 }
		  } 
		  
		  if (errorMessage.length > 0)
		  {
			$(this).parent().parent().next('div').children('div').empty().append(errorMessage);
		  } else {
			$(this).parent().parent().next('div').children('div').empty();
		  }
		  
		  errorMessage = '';
		});
		
		if (error == 0)
		{
			console.log('no error');
			$('#detailsForm').submit();
		} 	
		
	  });

});
</script>
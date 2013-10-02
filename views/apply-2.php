<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 1 - Business Details</h1>
	<div class="row">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			<b>Details</b>
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
			Payment Details
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
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
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
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Details</h4>
			   </div>
			  </div>
			  <input type="hidden" class="form-control" name="page" id="page" value="2">
			  <div class="row">
				  <div class="col-md-3">
					<label for="busType" class="col-lg-2 control-label">Business Type</label>
				  </div>
				  <div class="col-md-4">
					<select name="biztype">
						<?php if (isset($data['valids']['biztype'])) { 
							$selected_value = $data['valids']['biztype'];
						?>
						<option value="select">Select...</option>
						<option value="sole" <?php if ($selected_value == 'sole') echo 'selected';?>>Sole Trader</option>
						<option value="company" <?php if ($selected_value == 'company') echo 'selected';?>>Company</option>
						<option value="partnership" <?php if ($selected_value == 'partnership') echo 'selected';?>>Partnership</option>
						<option value="trust" <?php if ($selected_value == 'trust') echo 'selected';?>>Trust</option>
						<option value="government" <?php if ($selected_value == 'government') echo 'selected';?>>Government</option>
						<?php } else { ?>
						<option value="select">Select...</option>
						<option value="sole">Sole Trader</option>
						<option value="company">Company</option>
						<option value="partnership">Partnership</option>
						<option value="trust">Trust</option>
						<option value="government">Government</option>
						<?php } ?>
					</select>
				  </div>
				  
				  <?php if (isset($data['errors']['biztype'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['biztype']; ?>
				  </div>	
				  <?php } ?>
				  
			  </div>	
			  <div class="row">
				  <div class="col-md-3">
					<label for="businessName" class="col-lg-2 control-label">Registered Business Name</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['businessName'])) { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" value="<?php echo $data['valids']['businessName'];?>" >	
					<?php } else { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" >
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['businessName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['businessName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="tradingName" class="col-lg-2 control-label">Trading Name</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['tradingName'])) { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name"  value="<?php echo $data['valids']['tradingName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name">
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['tradingName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['tradingName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="yearBizStart" class="col-lg-2 control-label">Year Business Commenced</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['yearBizStart'])) { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced" value="<?php echo $data['valids']['yearBizStart'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced">
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['yearBizStart'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['yearBizStart']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="abn" class="col-lg-2 control-label">ABN/ACN</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['abn'])) { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN"  value="<?php echo $data['valids']['abn'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN">
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['abn'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['abn']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="operations" class="col-lg-2 control-label">Nature of Operations</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['operations'])) { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations" value="<?php echo $data['valids']['operations'];?>" >
					<?php } else { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['operations'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['operations']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Contact Details</h4>
				</div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="contactFirstName" class="col-lg-2 control-label">Contact First Name</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['contactFirstName'])) { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name" value="<?php echo $data['valids']['contactFirstName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['contactFirstName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['contactFirstName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="contactLastName" class="col-lg-2 control-label">Contact Last Name</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['contactLastName'])) { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name" value="<?php echo $data['valids']['contactLastName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['contactLastName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['contactLastName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputPosition" class="col-lg-2 control-label">Position</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['inputPosition'])) { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position"  value="<?php echo $data['valids']['inputPosition'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['inputPosition'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['inputPosition']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputPhone" class="col-lg-2 control-label">Phone Number</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['inputPhone'])) { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone"  value="<?php echo $data['valids']['inputPhone'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['inputPhone'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['inputPhone']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputFax" class="col-lg-2 control-label">Fax</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['inputFax'])) { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax" value="<?php echo $data['valids']['inputFax'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['inputFax'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['inputFax']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputMobile" class="col-lg-2 control-label">Mobile</label>
				  </div>
				  <div class="col-md-4">
					 <?php if (isset($data['valids']['inputMobile'])) { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile" value="<?php echo $data['valids']['inputMobile'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile">
					 <?php } ?>
				  </div>
				  <?php if (isset($data['errors']['inputMobile'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['inputMobile']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['inputEmail1'])) { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail1" placeholder="Email" value="<?php echo $data['valids']['inputEmail1'];?>" >
					<?php } else { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail1" placeholder="Email">
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['inputEmail1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['inputEmail1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Credit Limit</h4>
				</div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="creditLimit" class="col-lg-2 control-label">Monthly Credit Limit</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['creditLimit'])) { ?>
					<input type="text" class="form-control" id="creditLimit" name="creditLimit" placeholder="Credit Limit" value="<?php echo $data['valids']['creditLimit'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="creditLimit" name="creditLimit" placeholder="Credit Limit">
					<?php } ?>
				  </div>
				  
				  <?php if (isset($data['errors']['creditLimit'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['creditLimit']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-6 col-md-offset-3">
					 <br />
					 
					 <button class="btn btn btn-primary" type="submit">Next Step &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
		
	</div>
	
</div>

<?=$data['footer'];?>
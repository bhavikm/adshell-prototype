<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="row spacing-under">
		 <h4 class="red-text">Update Customer Account</h4>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">

		
			<form class="form" method="post" role="form" action="index.php?employee">
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Details</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="busType" class="control-label">Business Type</label>
				  </div>
				  <div class="col-md-6">
					<select name="biztype">
						<?php 
						if (isset($data['detailedCustomer']['biztype'])) { 
							$selected_value = $data['detailedCustomer']['biztype'];
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
				  
				  
			  </div>	
			  <div class="row">
				  <div class="col-md-6">
					<label for="businessName" class="control-label">Registered Business Name</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['businessName'])) { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" value="<?php echo $data['detailedCustomer']['businessName'];?>" >	
					<?php } else { ?>
					<input type="text" class="form-control" id="businessName" name="businessName" placeholder="Registered Business Name" >
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="tradingName" class="control-label">Trading Name</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['tradingName'])) { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name"  value="<?php echo $data['detailedCustomer']['tradingName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name">
					<?php } ?>
				  </div>
				  
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="yearBizStart" class="control-label">Year Business Commenced</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['yearBizStart'])) { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced" value="<?php echo $data['detailedCustomer']['yearBizStart'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="yearBizStart" name="yearBizStart" placeholder="Year Business Commenced">
					<?php } ?>
				  </div>
				  
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="abn" class="control-label">ABN/ACN</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['abn'])) { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN"  value="<?php echo $data['detailedCustomer']['abn'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="abn" name="abn" placeholder="ABN or ACN">
					<?php } ?>
				  </div>
				  
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="operations" class="control-label">Nature of Operations</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['operations'])) { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations" value="<?php echo $data['detailedCustomer']['operations'];?>" >
					<?php } else { ?>
					<input type="textarea" class="form-control" id="operations" name="operations" placeholder="Nature of Operations">
					<?php } ?>
				  </div>
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Contact Details</h4>
				</div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="contactFirstName" class="control-label">Contact First Name</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['contactFirstName'])) { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name" value="<?php echo $data['detailedCustomer']['contactFirstName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactFirstName" name="contactFirstName" placeholder="Contact First Name">
					<?php } ?>
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="contactLastName" class="control-label">Contact Last Name</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['contactLastName'])) { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name" value="<?php echo $data['detailedCustomer']['contactLastName'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="contactLastName" name="contactLastName" placeholder="Contact Last Name">
					<?php } ?>
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="inputPosition" class="control-label">Position</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['inputPosition'])) { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position"  value="<?php echo $data['detailedCustomer']['inputPosition'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="inputPosition" name="inputPosition" placeholder="Position">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="inputPhone" class="control-label">Phone Number</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['inputPhone'])) { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone"  value="<?php echo $data['detailedCustomer']['inputPhone'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone">
					 <?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="inputFax" class="control-label">Fax</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['inputFax'])) { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax" value="<?php echo $data['detailedCustomer']['inputFax'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputFax" name="inputFax" placeholder="Fax">
					 <?php } ?>
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="inputMobile" class="control-label">Mobile</label>
				  </div>
				  <div class="col-md-6">
					 <?php if (isset($data['detailedCustomer']['inputMobile'])) { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile" value="<?php echo $data['detailedCustomer']['inputMobile'];?>" >
					 <?php } else { ?>
					 <input type="text" class="form-control" id="inputMobile" name="inputMobile" placeholder="Mobile">
					 <?php } ?>
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="inputEmail1" class="control-label">Email</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['inputEmail1'])) { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail1" placeholder="Email" value="<?php echo $data['detailedCustomer']['inputEmail1'];?>" >
					<?php } else { ?>
					<input type="email" class="form-control" id="inputEmail1" name="inputEmail1" placeholder="Email">
					<?php } ?>
				  </div>
				  
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Credit Limit</h4>
				</div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="creditLimit" class="control-label">Monthly Credit Limit</label>
				  </div>
				  <div class="col-md-6">
					<?php if (isset($data['detailedCustomer']['creditLimit'])) { ?>
					<input type="text" class="form-control" id="creditLimit" name="creditLimit" placeholder="Credit Limit" value="<?php echo $data['detailedCustomer']['creditLimit'];?>" >
					<?php } else { ?>
					<input type="text" class="form-control" id="creditLimit" name="creditLimit" placeholder="Credit Limit">
					<?php } ?>
				  </div>
				  
			  </div>
			  <div class="row">
				  <div class="col-md-6 col-md-offset-6">
					 <br />
					 
					 <button class="btn btn btn-primary" type="submit">Update &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
		
	</div>
</div>	
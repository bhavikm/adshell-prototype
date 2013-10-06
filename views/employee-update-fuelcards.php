
<h4 class="red-text">Update Customer Fuel Cards</h4>
<br />

<div class="col-xs-12 col-sm-6 col-md-12">

			<form class="form" method="post" role="form" action="">
			  
			  <?php foreach ($data['fuelCards'] as $index => $fuelCard) { 
				$i = $index + 1;
			  ?>
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Cardholder <?php echo $i; ?></h4>
				</div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="cardHolderName<?php echo $i; ?>" class="control-label">Card Holder Name</label>
				  </div>
				  <div class="col-md-6">
				    <?php if (isset($fuelCard['cardHolderName'])) { ?>
					<input type="text" class="form-control" id="cardHolderName<?php echo $i; ?>" name="cardHolderName<?php echo $i; ?>" placeholder="Card Holder Name" value="<?php echo $fuelCard['cardHolderName']; ?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="cardHolderName<?php echo $i; ?>" name="cardHolderName<?php echo $i; ?>" placeholder="Card Holder Name">
					<?php } ?>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6">
					<label for="registrationNo<?php echo $i; ?>" class="control-label">Registration No.</label>
				  </div>
				  <div class="col-md-6">
					
					<?php if (isset($fuelCard['registrationNo'])) { ?>
					<input type="text" class="form-control" id="registrationNo<?php echo $i; ?>" name="registrationNo<?php echo $i; ?>" placeholder="Card Holder Registration No." value="<?php echo $fuelCard['registrationNo']; ?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="registrationNo<?php echo $i; ?>" name="registrationNo<?php echo $i; ?>" placeholder="Card Holder Registration No.">
					<?php } ?>
				  </div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-6">
					<label for="pinRequired<?php echo $i; ?>" class=" control-label">Pin Required</label>
				  </div>
				  <div class="col-md-6">
					  <select name="pinRequired<?php echo $i; ?>">
							<?php if (isset($fuelCard['pinRequired'])) { 
								$selected_value = $fuelCard['pinRequired'];
							?>
							<option value="yes" <?php if ($selected_value == 'yes') echo 'selected';?>>Yes</option>
							<option value="no" <?php if ($selected_value == 'no') echo 'selected';?>>No</option>
							<?php } else { ?>
							<option value="yes">Yes</option>
							<option value="no">No</option>
							<?php } ?>
						</select>
				  </div>
			  </div>
			  
			  <div class="row">
				<div class="col-md-6">
					<label for="inputName" class="control-label">Card Products</label>
				  </div>
				  <div class="col-md-6">
					<label class="checkbox-inline" id="busType">
					  <input type="checkbox" id="allCardProducts<?php echo $i; ?>" class="allProductsCheckbox" name="allFuelCardProducts<?php echo $i; ?>" value="all"> All Products
					</label>
					<br /><br />
					  OR SELECT INDIVIDUALLY:
				  </div>
			  </div>	
			  
			  
			  <div class="row"><div class="col-md-6"><label for="inputName" class="control-label">Card Products</label></div><div class="col-md-6"><label class="checkbox-inline" id="busType"><input type="checkbox" id="allCardProducts" name="allFuelCardProducts" class="allProductsCheckbox"  value="all"> All Products</label><br /><br />OR SELECT INDIVIDUALLY:</div></div>

				<div class="row short-form-row"><div class="col-md-6 col-md-offset-6"><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="unleaded" class="productCheckbox"> Unleaded </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="biodiesel" class="productCheckbox"> BioDiesel </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="unleadedMax" class="productCheckbox"> Unleaded Max e10 </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="lpg" class="productCheckbox"> LPG </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="gas" class="productCheckbox"> Gas </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="carWash" class="productCheckbox"> Car Wash </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="shop" class="productCheckbox"> Shop </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="premiumUnleaded" class="productCheckbox"> Premium Unleaded </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="octane" class="productCheckbox"> 98 Octane </label></div></div>
			  
			  <?php } ?>
			  
			  <span id="extraCardHolders">
			  
			  </span>
			 
			 
			  <div class="row">
				  <div class="col-md-6 col-md-offset-6">
					 <br />
					 <a class="btn btn btn-warning" id="addCardHolder" href="#">Add Extra Fuel Card Holder</a>
				  </div>
			  </div>
	
			  <div class="row">
				 <div class="col-md-6">
					<br />
				  </div>
				  <div class="col-md-6">
					 <br />
					 <button class="btn btn btn-primary" type="submit">Update &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
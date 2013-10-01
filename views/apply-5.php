<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 4 - Fuel Cards</h1>
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
			<b>Fuel Cards</b>
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
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-right.jpeg" />
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">

			<form class="form" method="post" role="form" action="index.php?apply">
			  <input type="hidden" class="form-control" name="page" id="page" value="5">
			  <input type="hidden" class="form-control" name="numberOfCardholders" id="numberOfCardholders" value="<?php echo $data['valids']['numberOfCardholders']; ?>">
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Trading Name</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="tradingName" class="control-label">Trading Name for card</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['tradingName'])) { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name to appear on card" value="<?php echo $data['valids']['tradingName']; ?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="tradingName" name="tradingName" placeholder="Trading Name to appear on card">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['tradingName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
				  <?php echo $data['errors']['tradingName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <?php 
			  for ($i = 1; $i <= (int)$data['valids']['numberOfCardholders']; $i++)
			  {
			  ?>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Cardholder <?php echo $i; ?></h4>
				</div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="cardHolderName<?php echo $i; ?>" class="control-label">Card Holder Name</label>
				  </div>
				  <div class="col-md-4">
				    <?php if (isset($data['valids']['cardHolderName'.$i])) { ?>
					<input type="text" class="form-control" id="cardHolderName<?php echo $i; ?>" name="cardHolderName<?php echo $i; ?>" placeholder="Card Holder Name" value="<?php echo $data['valids']['cardHolderName'.$i]; ?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="cardHolderName<?php echo $i; ?>" name="cardHolderName<?php echo $i; ?>" placeholder="Card Holder Name">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['cardHolderName'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['cardHolderName'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="registrationNo<?php echo $i; ?>" class="control-label">Registration No.</label>
				  </div>
				  <div class="col-md-4">
					
					<?php if (isset($data['valids']['registrationNo'.$i])) { ?>
					<input type="text" class="form-control" id="registrationNo<?php echo $i; ?>" name="registrationNo<?php echo $i; ?>" placeholder="Card Holder Registration No." value="<?php echo $data['valids']['registrationNo'.$i]; ?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="registrationNo<?php echo $i; ?>" name="registrationNo<?php echo $i; ?>" placeholder="Card Holder Registration No.">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['registrationNo'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['registrationNo'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="pinRequired<?php echo $i; ?>" class=" control-label">Pin Required</label>
				  </div>
				  <div class="col-md-4">
					  <select name="pinRequired<?php echo $i; ?>">
							<?php if (isset($data['valids']['pinRequired'.$i])) { 
								$selected_value = $data['valids']['pinRequired'.$i];
							?>
							<option value="yes" <?php if ($selected_value == 'yes') echo 'selected';?>>Yes</option>
							<option value="no" <?php if ($selected_value == 'no') echo 'selected';?>>No</option>
							<?php } else { ?>
							<option value="yes">Yes</option>
							<option value="no">No</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['pinRequired'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['pinRequired'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				<div class="col-md-3">
					<label for="inputName" class="control-label">Card Products</label>
				  </div>
				  <div class="col-md-4">
					<label class="checkbox-inline" id="busType">
					  <input type="checkbox" id="allCardProducts<?php echo $i; ?>" class="allProductsCheckbox" name="allFuelCardProducts<?php echo $i; ?>" value="all"> All Products
					</label>
					<br /><br />
					  OR SELECT INDIVIDUALLY:
				  </div>
			  </div>	
			  
			  <div class="row short-form-row">
				  <div class="col-md-4 col-md-offset-3">
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="unleaded" class="productCheckbox" <?php if ($data['valids']['fuelCardProducts'.$i]['unleaded']) { ?> checked="checked" <?php } ?>> Unleaded 
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="biodiesel"  class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['biodiesel']) { ?> checked="checked" <?php } ?>> BioDiesel
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="unleadedMax" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['unleadedMax']) { ?> checked="checked" <?php } ?>> Unleaded Max e10
					</label>
					<br />
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="lpg" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['lpg']) { ?> checked="checked" <?php } ?>> LPG
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="gas" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['gas']) { ?> checked="checked" <?php } ?>> Gas
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="carWash" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['carWash']) { ?> checked="checked" <?php } ?>> Car Wash
					</label>
					<br />
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="shop" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['shop']) { ?> checked="checked" <?php } ?>> Shop
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="premiumUnleaded" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['premiumUnleaded']) { ?> checked="checked" <?php } ?>> Premium Unleaded
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" name="fuelCardProducts<?php echo $i; ?>[]" value="octane" class="productCheckbox"  <?php if ($data['valids']['fuelCardProducts'.$i]['octane']) { ?> checked="checked" <?php } ?>> 98 Octane
					</label>
				  </div>
				  <?php if (isset($data['errors']['fuelCardProducts'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['fuelCardProducts'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>	
			  
			  <?php } ?>
			  
			  <span id="extraCardHolders">
			  
			  </span>
			 
			 
			  <div class="row">
				  <div class="col-md-6 col-md-offset-3">
					 <br />
					 <a class="btn btn btn-warning" id="addCardHolder" href="#">Add Extra Fuel Card Holder</a>
				  </div>
			  </div>
	
			  <div class="row">
				 <div class="col-md-3">
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=4">&laquo; Back</a>
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

	  //once user presses button to add another partner
	  $(document).on('click','#addCardHolder',function(event) {
	    event.preventDefault();
		
		//first get the number of current business partners
		var numberCardHolders = $('#numberOfCardholders').val();
		
		var nextCardHoldersNumb = Number(numberCardHolders) + 1;
		
		$('#extraCardHolders').before('<div class="row form-subheading"><div class="col-md-12"><h4>Cardholder '+nextCardHoldersNumb+'</h4></div></div>');	  
		
		$('#extraCardHolders').before('<div class="row"><div class="col-md-3"><label for="cardHolderName'+nextCardHoldersNumb+'" class="control-label">Card Holder Name</label></div><div class="col-md-4"><input type="text" class="form-control" id="cardHolderName'+nextCardHoldersNumb+'" name="cardHolderName'+nextCardHoldersNumb+'" placeholder="Card Holder Name"></div></div>');
		
		$('#extraCardHolders').before('<div class="row"><div class="col-md-3"><label for="registrationNo'+nextCardHoldersNumb+'" class="control-label">Registration No.</label></div><div class="col-md-4"><input type="text" class="form-control" id="registrationNo'+nextCardHoldersNumb+'" name="registrationNo'+nextCardHoldersNumb+'" placeholder="Card Holder Registration No."></div></div>');
		
		$('#extraCardHolders').before('<div class="row"><div class="col-md-3"><label for="inputName" class="control-label">Card Products</label></div><div class="col-md-4"><label class="checkbox-inline" id="busType"><input type="checkbox" id="allCardProducts" name="allFuelCardProducts'+nextCardHoldersNumb+'" class="allProductsCheckbox"  value="all"> All Products</label><br /><br />OR SELECT INDIVIDUALLY:</div></div>');
		
		$('#extraCardHolders').before('<div class="row"><div class="col-md-3"><label for="pinRequired'+nextCardHoldersNumb+'" class=" control-label">Pin Required</label></div><div class="col-md-4"><select name="pinRequired'+nextCardHoldersNumb+'"><option value="yes">Yes</option><option value="no">No</option></select></div></div>');

		$('#extraCardHolders').before('<div class="row short-form-row"><div class="col-md-4 col-md-offset-3"><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="unleaded" class="productCheckbox"> Unleaded </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="biodiesel" class="productCheckbox"> BioDiesel </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="unleadedMax" class="productCheckbox"> Unleaded Max e10 </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="lpg" class="productCheckbox"> LPG </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="gas" class="productCheckbox"> Gas </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="carWash" class="productCheckbox"> Car Wash </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="shop" class="productCheckbox"> Shop </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="premiumUnleaded" class="productCheckbox"> Premium Unleaded </label><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts'+nextCardHoldersNumb+'[]" value="octane" class="productCheckbox"> 98 Octane </label></div></div>');
		
		//update the business partner number value
		$('#numberOfCardholders').val(nextCardHoldersNumb);
		
	  });

	  $(document).on('click','.allProductsCheckbox', function(event) {
		
		var checkboxes = $(this).parent().parent().parent().next().find("input");
	  
		if ($(this).is(":checked"))
		{
			checkboxes.prop("checked", true);
		} else {
			checkboxes.prop("checked", false);
		}
		
	  });
	  
	  $(document).on('click','.productCheckbox', function(event) {
	  
		var allProductsCheckbox = $(this).parent().parent().parent().prev().find("input");
		
		
		if (allProductsCheckbox.is(":checked"))
		{
			allProductsCheckbox.prop("checked", !allProductsCheckbox.prop("checked"));
		} else if (!allProductsCheckbox.is(":checked") && $(this).parent().parent().find("input:checked").length == 9) {
			allProductsCheckbox.prop("checked", !allProductsCheckbox.prop("checked"));
		}
		
	  });
	  
	  
});
</script>

<?=$data['footer'];?>
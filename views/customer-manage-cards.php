
<h4 class="red-text">Manage Fuel Cards</h4>
<br />
<?php if (isset($data['notification'])) { ?>
<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $data['notification']; ?>
</div>
<?php } ?>
<table class="table table-striped">
	<thead>
          <tr>
            <th>#</th>
			<th>Holder Name</th>
            <th>Registration No.</th>
			<th>Pin</th>
			<th>Products</th>
			<th>Status</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['fuelCards']) && count($data['fuelCards']) > 0 && $data['fuelCards']) { ?>
		<?php foreach ($data['fuelCards'] as $index => $fuelCard) { ?>
		<tr>
			<td><?php echo $fuelCard['fuelCardID']; ?></td>
			<td><?php echo $fuelCard['holderName']; ?></td>
			<td><?php echo $fuelCard['registrationNo']; ?></td>
			<?php if ($fuelCard['pinRequired']) { ?> 
			<td>
				<div class="innerTableCellWrapper">
				Required
				<?php if ($fuelCard['cardStatus'] != 'cancelled') { ?>
				<br /><br />
				<a class="btn btn-danger bottomOfTableCell" href="index.php?customer&action=managecards&second=resetpin&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Reset &raquo;</a>
				<?php } ?>
				</div>
			</td>
			<?php } else { ?>
			<td>Not Required</td>
			<?php } ?>
			<td>
				<div class="innerTableCellWrapper">
				<?php foreach ($fuelCard['fuelCardProducts'] as $product) { ?>
				<?php echo $product['productName']; ?><br />
				<?php } ?>
				<?php if ($fuelCard['cardStatus'] != 'cancelled') { ?>
				<br /><a class="btn btn-primary bottomOfTableCell" href="index.php?customer&action=managecards&second=changeproducts&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Edit &raquo;</a>
				<?php } ?>
				</div>
			</td>
			<?php if ($fuelCard['cardStatus'] == 'enabled') { ?>
			<td class="success">
			<?php } elseif ($fuelCard['cardStatus'] == 'disabled') { ?>
			<td class="warning">
			<?php } else { ?>
			<td class="danger">
			<?php } ?>
				<div class="innerTableCellWrapper">
					<select name="status-<?php echo $fuelCard['fuelCardID']; ?>" class="cardProducts">
						<option value="enabled" <?php if ($fuelCard['cardStatus'] == 'enabled') echo 'selected';?>>Enabled</option>
						<option value="disabled" <?php if ($fuelCard['cardStatus'] == 'disabled')  echo 'selected';?>>Disabled</option>
						<option value="cancelled" <?php if ($fuelCard['cardStatus'] == 'cancelled')  echo 'selected';?>>Cancelled</option>
					</select>
					<br /><br /><a class="btn btn-primary bottomOfTableCell" href="index.php?customer&action=managecards&second=changeproducts&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Update &raquo;</a>
				</div>
			</td>
		</tr>
		<?php } ?>
		<?php } ?>
		<tr>
			<td colspan="7"></td>
		</tr>
		<tr>
			<td colspan="7" id="extraButton">
				<br />
				<a class="btn btn btn-warning" id="addCardHolder" href="#">Order Fuel Card</a>
			</td>
		</tr>
	</tbody>
</table>

<div class="row" id="">
	<span id="extraCardHolders">&nbsp;</span>
</div>

<script type="text/javascript">
$(document).ready(function(){

	  //once user presses button to add another partner
	  $('.cardProducts').on('change', function(event) {

		var selectedOption = $(this).val();	
		var cardID =  $(this).attr('name').substring(7);
		var newStatus = 'index.php?customer&action=managecards&second=updatestatus&appid=<?php echo $fuelCard['applicationID']; ?>&cardid='+cardID;
		var newButtonLink = newStatus+"&status="+selectedOption;
		$(this).parent().children('a').attr('href', newButtonLink);
		
	  });
	  
	  //once user presses button to add another partner
	  $(document).on('click','#addCardHolder',function(event) {
	    event.preventDefault();
		
		$('#addCardHolder').parent().hide();
		//first get the number of current business partners
		var numberCardHolders = $('#numberOfCardholders').val();
		
		var nextCardHoldersNumb = Number(numberCardHolders) + 1;
		
		var part1 = '<form class="form" method="post" role="form" id="cardForm" action="index.php?customer"><input type="hidden" class="form-control" name="action" id="action" value="managecards"><input type="hidden" class="form-control" name="second" id="second" value="addcard"><input type="hidden" class="form-control" name="appid" id="appid" value="<?php echo $fuelCard['applicationID']; ?>">';
		
		var part2 = '<div class="row form-subheading"><div class="col-md-12"><h4>Order Fuel Card</h4></div></div>';
		
		var part3 = '<div class="row"><div class="col-md-3"><label for="cardHolderName" class="control-label">Card Holder Name</label></div><div class="col-md-4"><input type="text" class="form-control" id="cardHolderName" name="cardHolderName" placeholder="Card Holder Name"></div><div class="col-md-5 red-text error-text">&nbsp;</div></div>';
		
		var part4 = '<div class="row"><div class="col-md-3"><label for="registrationNo" class="control-label">Registration No.</label></div><div class="col-md-4"><input type="text" class="form-control" id="registrationNo" name="registrationNo" placeholder="Card Holder Registration No."></div><div class="col-md-5 red-text error-text">&nbsp;</div></div>';
		
		var part5 = '<div class="row"><div class="col-md-3"><label for="pinRequired" class=" control-label">Pin Required</label></div><div class="col-md-4"><select name="pinRequired"><option value="yes">Yes</option><option value="no">No</option></select></div></div>';
		
		var part6 = '<div class="row"><div class="col-md-3"><label for="inputName" class="control-label">Card Products</label></div><div class="col-md-4"><label class="checkbox-inline" id="busType"><input type="checkbox" id="allCardProducts" name="allFuelCardProducts" class="allProductsCheckbox"  value="all"> All Products</label><br /><br />OR SELECT INDIVIDUALLY:</div><div class="col-md-5 red-text" id="productsError">&nbsp;</div></div>';
		
		var part7 = '<div class="row short-form-row"><div class="col-md-4 col-md-offset-3"><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="unleaded" class="productCheckbox"> Unleaded </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="biodiesel" class="productCheckbox"> BioDiesel </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="unleadedMax" class="productCheckbox"> Unleaded Max e10 </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="lpg" class="productCheckbox"> LPG </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="gas" class="productCheckbox"> Gas </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="carWash" class="productCheckbox"> Car Wash </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="shop" class="productCheckbox"> Shop </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="premiumUnleaded" class="productCheckbox"> Premium Unleaded </label><br /><label class="checkbox-inline"><input type="checkbox" name="fuelCardProducts[]" value="octane" class="productCheckbox"> 98 Octane </label></div></div>';
		
		var part8 = '<div class="row short-form-row"><div class="col-md-6 col-md-offset-3"><button class="btn btn btn-primary" type="submit" id="cardSubmit">Add &raquo;</button></div></div></form>';
		
		$('#extraCardHolders').before(part1 + part2 + part3 + part4 + part5 + part6 + part7 + part8);
		
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
	  
	  function IsNumeric(input)
	  {
		return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
	  }
	  
	  function checkLength(input, maxLength)
	  {
		return (input.length > 0) && (input.length <= maxLength);
	  }
	  
	  $(document).on('click','#cardSubmit', function(event) {
	    event.preventDefault();
		var error = 0;
		 console.log( 'in here' );
		$( "input.form-control[type=text]" ).each(function( index ) {
		 
		  console.log( index + ": " + $(this).val() );
		  var valToCheck = $(this).val();
		  var inputID = $(this).attr('id');
		  var errorMessage = '';
		  if (inputID == 'cardHolderName')
		  {
			 if (!checkLength(valToCheck, 40))
			 {
				errorMessage = 'Name must be 40 characters or less.';
				error = error + 1;
			 }
		  } else if (inputID == 'registrationNo') {
			 if (!checkLength(valToCheck, 15))
			 {
				errorMessage = 'Registration must be 15 characters or less.';
				error = error + 1;
			 }
		  } 
		  
		  if (errorMessage.length > 0)
		  {
			$(this).parent().next('div').empty().append(errorMessage);
		  } else {
			$(this).parent().next('div').empty();
		  }
		  
		  errorMessage = '';
		});
		
		if ($('input[name="fuelCardProducts[]"]:checked').length == 0)
		{
			errorMessage = 'Must select at least one product.';
			error = error + 1;
			$('#productsError').empty().append(errorMessage);
		} else {
			$('#productsError').empty();
		}
		
		
		if (error == 0)
		{
			console.log('no error');
			$('#cardForm').submit();
		} 	
		
	  });
	  

});
</script>
<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<div class="row">
		<div class="col-md-12 center">
		<h2 class="spacing-under">Page 3 of 8 - Business Partners</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 center">
			<div class="apply-progress">
				Details
			</div>
			<div class="apply-progress">
				Rerferences
			</div>
			<div class="apply-progress">
				<b>Partners</b>
			</div>
			<div class="apply-progress">
				Fuel Cards
			</div>
			<div class="apply-progress">
				Payment Details
			</div>
			<div class="apply-progress">
				Authorization
			</div>
			<div class="apply-progress">
				Terms and Conditions
			</div>
			<div class="apply-progress">
				Review and Finish
			</div>
		</div>
	</div>
	<div class="row spacing-under">
		<div class="col-md-12 center">
			<div class="apply-progress">
			<img src="images/progress-green-left-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-grey-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-grey-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-grey-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-grey-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-grey-right-big.jpeg" />
			</div>
		</div>
	</div>
	
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">

		
			<form class="form" method="post" role="form" action="index.php?apply">
			  <input type="hidden" class="form-control" name="page" id="page" value="4">
			  <input type="hidden" class="form-control" name="navigation" id="navigation" value="next">
			  <input type="hidden" class="form-control" name="numberOfPartners" id="numberOfPartners" value="<?php echo $data['valids']['numberOfPartners']; ?>">
			  
			  <?php 
			  for ($i = 1; $i <= (int)$data['valids']['numberOfPartners']; $i++)
			  {
			  ?>
			  
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Partner <?php echo $i; ?></h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerName<?php echo $i; ?>" class=" control-label">Full Name</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['partnerName'.$i])) { ?>
					<input type="text" class="form-control" id="partnerName<?php echo $i; ?>" name="partnerName<?php echo $i; ?>" placeholder="Full Name" value="<?php echo $data['valids']['partnerName'.$i];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="partnerName<?php echo $i; ?>" name="partnerName<?php echo $i; ?>" placeholder="Full Name">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['partnerName'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerName'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerPhone<?php echo $i; ?>" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['partnerPhone'.$i])) { ?>
					<input type="text" class="form-control" id="partnerPhone<?php echo $i; ?>" name="partnerPhone<?php echo $i; ?>" placeholder="Phone"  value="<?php echo $data['valids']['partnerPhone'.$i];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="partnerPhone<?php echo $i; ?>" name="partnerPhone<?php echo $i; ?>" placeholder="Phone">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['partnerPhone'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerPhone'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerAddress<?php echo $i; ?>" class=" control-label">Address</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['partnerAddress'.$i])) { ?>
					<input type="textarea" class="form-control" id="partnerAddress<?php echo $i; ?>" name="partnerAddress<?php echo $i; ?>" placeholder="Address" value="<?php echo $data['valids']['partnerAddress'.$i];?>">
					<?php } else { ?>
					<input type="textarea" class="form-control" id="partnerAddress<?php echo $i; ?>" name="partnerAddress<?php echo $i; ?>" placeholder="Address">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['partnerAddress'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerAddress'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerState<?php echo $i; ?>" class=" control-label">State</label>
				  </div>
				  <div class="col-md-4">
					  <select name="partnerState<?php echo $i; ?>">
							<?php if (isset($data['valids']['partnerState'.$i])) { 
								$selected_value = $data['valids']['partnerState'.$i];
							?>
							<option value="select">Select...</option>
							<option value="vic" <?php if ($selected_value == 'vic') echo 'selected';?>>Victoria</option>
							<option value="nsw" <?php if ($selected_value == 'nsw') echo 'selected';?>>New South Wales</option>
							<option value="qld" <?php if ($selected_value == 'qld') echo 'selected';?>>Queensland</option>
							<option value="sa" <?php if ($selected_value == 'sa') echo 'selected';?>>South Autralia</option>
							<option value="wa" <?php if ($selected_value == 'wa') echo 'selected';?>>Western Australia</option>
							<option value="tas" <?php if ($selected_value == 'tas') echo 'selected';?>>Tasmania</option>
							<option value="act" <?php if ($selected_value == 'act') echo 'selected';?>>Australian Capital Territory</option>
							<option value="nt" <?php if ($selected_value == 'nt') echo 'selected';?>>Northern Territory</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="vic">Victoria</option>
							<option value="nsw">New South Wales</option>
							<option value="qld">Queensland</option>
							<option value="sa">South Autralia</option>
							<option value="wa">Western Australia</option>
							<option value="tas">Tasmania</option>
							<option value="act">Australian Capital Territory</option>
							<option value="nt">Northern Territory</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['partnerState'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerState'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerPostcode<?php echo $i; ?>" class=" control-label">Postcode</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['partnerPostcode'.$i])) { ?>
					<input type="text" class="form-control" id="partnerPostcode<?php echo $i; ?>" name="partnerPostcode<?php echo $i; ?>" placeholder="Postcode" value="<?php echo $data['valids']['partnerPostcode'.$i];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="partnerPostcode<?php echo $i; ?>" name="partnerPostcode<?php echo $i; ?>" placeholder="Postcode">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['partnerPostcode'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerPostcode'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <?php } ?>
			  
			  <span id="extraBusinessPartners">
			  
			  </span>
			  
			  
			  <div class="row">
				  <div class="col-md-6 col-md-offset-3">
					 <br />
					 <a class="btn btn btn-warning" id="addPartner" href="#">Add Extra Business Partner</a>
				  </div>
			  </div>

			  <div class="row">
				<div class="col-md-3">
					 <br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=3">&laquo; Back</a>
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
	  $(document).on('click','#addPartner', function(event) {
	    event.preventDefault();
		
		//first get the number of current business partners
		var numberPartners = $('#numberOfPartners').val();
		
		var nextPartnerNumb = Number(numberPartners) + 1;
		

		$('#extraBusinessPartners').before('<div class="row form-subheading"><div class="col-md-12"><h4>Business Partner '+nextPartnerNumb+'</h4></div></div>');	  
		
		$('#extraBusinessPartners').before('<div class="row"><div class="col-md-3"><label for="partnerName'+nextPartnerNumb+'" class=" control-label">Full Name</label></div><div class="col-md-4"><input type="text" class="form-control" id="partnerName'+nextPartnerNumb+'" name="partnerName'+nextPartnerNumb+'" placeholder="Full Name"></div></div>');
		
		$('#extraBusinessPartners').before('<div class="row"><div class="col-md-3"><label for="partnerPhone'+nextPartnerNumb+'" class="control-label">Phone</label></div><div class="col-md-4"><input type="text" class="form-control" id="partnerPhone'+nextPartnerNumb+'" name="partnerPhone'+nextPartnerNumb+'" placeholder="Phone"></div></div>');
		
		$('#extraBusinessPartners').before('<div class="row"><div class="col-md-3"><label for="partnerAddress'+nextPartnerNumb+'" class=" control-label">Address</label></div><div class="col-md-4"><input type="textarea" class="form-control" id="partnerAddress'+nextPartnerNumb+'" name="partnerAddress'+nextPartnerNumb+'" placeholder="Address"></div></div>');
		
		$('#extraBusinessPartners').before('<div class="row"><div class="col-md-3"><label for="partnerState'+nextPartnerNumb+'" class=" control-label">State</label></div><div class="col-md-4"><select name="partnerState'+nextPartnerNumb+'"><option value="select">Select...</option><option value="vic">Victoria</option><option value="nsw">New South Wales</option><option value="qld">Queensland</option><option value="sa">South Autralia</option><option value="wa">Western Australia</option><option value="tas">Tasmania</option><option value="act">Australian Capital Territory</option><option value="nt">Northern Territory</option></select></div></div>');
		
		$('#extraBusinessPartners').before('<div class="row"><div class="col-md-3"><label for="partnerPostcode'+nextPartnerNumb+'" class=" control-label">Postcode</label></div><div class="col-md-4"><input type="text" class="form-control" id="partnerPostcode'+nextPartnerNumb+'" name="partnerPostcode'+nextPartnerNumb+'" placeholder="Postcode"></div></div>');
		
		//update the business partner number value
		$('#numberOfPartners').val(nextPartnerNumb);
		
	  });

});
</script>

<?=$data['footer'];?>
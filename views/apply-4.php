<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 3 - Business Partners</h1>
	<div class="row">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			Details
		</div>
		<div class="col-md-1 apply-progress">
			Rerferences
		</div>
		<div class="col-md-1 apply-progress">
			<b>Partners</b>
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
			   <h4>Business Partner 1</h4>
			   </div>
			  </div>
			  <input type="hidden" class="form-control" name="page" id="page" value="4">
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerName1" class=" control-label">Full Name</label>
				  </div>
				  <div class="col-md-4">
					<input type="text" class="form-control" id="partnerName1" name="partnerName1" placeholder="Full Name">
				  </div>
				  <?php if (isset($data['errors']['partnerName1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerName1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerPhone1" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					 <input type="text" class="form-control" id="partnerPhone1" name="partnerPhone1" placeholder="Phone">
				  </div>
				  <?php if (isset($data['errors']['partnerPhone1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerPhone1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerAddress1" class=" control-label">Address</label>
				  </div>
				  <div class="col-md-4">
					<input type="textarea" class="form-control" id="partnerAddress1" name="partnerAddress1" placeholder="Address">
				  </div>
				  <?php if (isset($data['errors']['partnerAddress1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerAddress1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerState1" class=" control-label">State</label>
				  </div>
				  <div class="col-md-4">
					  <select name="partnerState1">
							<?php if (isset($data['valids']['partnerState1'])) { 
								$selected_value = $data['valids']['partnerState1'];
							?>
							<option value="select">Select...</option>
							<option value="Victoria" <?php if ($selected_value == 'sole') echo 'selected';?>>Victoria</option>
							<option value="New South Wales" <?php if ($selected_value == 'nsw') echo 'selected';?>>New South Wales</option>
							<option value="Queensland" <?php if ($selected_value == 'qld') echo 'selected';?>>Queensland</option>
							<option value="South Autralia" <?php if ($selected_value == 'sa') echo 'selected';?>>South Autralia</option>
							<option value="Western Australia" <?php if ($selected_value == 'wa') echo 'selected';?>>Western Australia</option>
							<option value="Tasmania" <?php if ($selected_value == 'government') echo 'tas';?>>Tasmania</option>
							<option value="Australian Capital Territory" <?php if ($selected_value == 'act') echo 'selected';?>>Australian Capital Territory</option>
							<option value="Northern Territory" <?php if ($selected_value == 'nt') echo 'selected';?>>Northern Territory</option>
							<?php } else { ?>
							<option value="select">Select...</option>
							<option value="Victoria">Victoria</option>
							<option value="New South Wales">New South Wales</option>
							<option value="Queensland">Queensland</option>
							<option value="South Autralia">South Autralia</option>
							<option value="Western Australia">Western Australia</option>
							<option value="Tasmania">Tasmania</option>
							<option value="Australian Capital Territory">Australian Capital Territory</option>
							<option value="Northern Territory">Northern Territory</option>
							<?php } ?>
						</select>
				  </div>
				  <?php if (isset($data['errors']['partnerState1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['partnerState1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="partnerPostcode1" class=" control-label">Postcode</label>
				  </div>
				  <div class="col-md-3">
					<input type="text" class="form-control" id="partnerPostcode1" name="partnerPostcode1" placeholder="Postcode">
				  </div>
				  <?php if (isset($data['errors']['partnerPostcode1'])) { ?>
				  <div class="col-md-4 col-md-offset-2 red-text">	
					<?php echo $data['errors']['partnerPostcode1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Partner 2</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Full Name</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="inputName" placeholder="Full Name">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputPhone" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					 <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Address</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="inputName" placeholder="Address">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">State</label>
				  </div>
				  <div class="col-md-3">
					<input type="text" class="form-control" id="inputName" placeholder="State">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Postcode</label>
				  </div>
				  <div class="col-md-3">
					<input type="text" class="form-control" id="inputName" placeholder="Postcode">
				  </div>
			  </div>
			  
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Partner 3</h4>
			   </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Full Name</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="inputName" placeholder="Full Name">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputPhone" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					 <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Address</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="inputName" placeholder="Address">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">State</label>
				  </div>
				  <div class="col-md-3">
					<input type="text" class="form-control" id="inputName" placeholder="State">
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="inputName" class=" control-label">Postcode</label>
				  </div>
				  <div class="col-md-3">
					<input type="text" class="form-control" id="inputName" placeholder="Postcode">
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

<?=$data['footer'];?>
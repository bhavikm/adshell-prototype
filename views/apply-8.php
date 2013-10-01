<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 7 - Acceptance of Terms and Conditions</h1>
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
			Payment Details
		</div>
		<div class="col-md-1 apply-progress">
			Authorization
		</div>
		<div class="col-md-1 apply-progress">
			<b>Terms and Conditions</b>
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
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-right.jpeg" />
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">

			<form class="form" method="post" role="form" action="index.php?apply">
				
			  <input type="hidden" class="form-control" name="page" id="page" value="8">
			   <div class="row form-subheading">
			   <div class="col-md-12">
				<h4>Acceptance</h4>
				<p>I/We hereby state that the above information is true and correct and agree to be bound by the Terms and Conditions attached hereto concerning the use of APJ Petro Chemicals Card.</p>
			   </div>
			  </div>
			  
			  <?php if (!isset($data['errors']['numberOfPartners'])) { ?>
				  <?php 
				  for ($i = 1; $i <= (int)$data['valids']['numberOfPartners']; $i++)
				  {
				  ?>
				  
				  <div class="row form-subheading">
				   <div class="col-md-12">
					<h4>Business Partner <?php echo $i; ?> Acceptance</h4>
				   </div>
				  </div>
				  <div class="row">
					  <div class="col-md-3">
						<label for="acceptanceName<?php echo $i; ?>" class=" control-label">Full Name</label>
					  </div>
					  <div class="col-md-4">
						<?php if (isset($data['valids']['acceptanceName'.$i])) { ?>
						<input type="text" class="form-control" id="acceptanceName<?php echo $i; ?>" name="acceptanceName<?php echo $i; ?>" placeholder="Full Name" value="<?php echo $data['valids']['acceptanceName'.$i];?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="acceptanceName<?php echo $i; ?>" name="acceptanceName<?php echo $i; ?>" placeholder="Full Name">
						<?php } ?>
					  </div>
					  <?php if (isset($data['errors']['acceptanceName'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['acceptanceName'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  
				  
				  <div class="row">
					  <div class="col-md-3">
						<label for="acceptanceSignature<?php echo $i; ?>" class=" control-label">Signature (Full Name)</label>
					  </div>
					  <div class="col-md-4">
						<?php if (isset($data['valids']['acceptanceSignature'.$i])) { ?>
						<input type="text" class="form-control" id="acceptanceSignature<?php echo $i; ?>" name="acceptanceSignature<?php echo $i; ?>" placeholder="Full Name" value="<?php echo $data['valids']['acceptanceSignature'.$i]; ?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="acceptanceSignature<?php echo $i; ?>" name="acceptanceSignature<?php echo $i; ?>" placeholder="Full Name">
						<?php } ?>
					  </div>
					  
					  <?php if (isset($data['errors']['acceptanceSignature'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['acceptanceSignature'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  <?php } ?>
			  <?php } else { ?>
			  
				<?php echo $data['errors']['numberOfPartners']; ?>
			  
			  <?php } ?>

			  <div class="row">
				  <div class="col-md-3">
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=7">&laquo; Back</a>
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
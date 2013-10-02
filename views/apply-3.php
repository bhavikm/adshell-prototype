<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 2 - Business References</h1>
	<div class="row">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			Details
		</div>
		<div class="col-md-1 apply-progress">
			<b>Rerferences</b>
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
			   <h4>Business/Trade References</h4>
			   </div>
			  </div>
			  <input type="hidden" class="form-control" name="page" id="page" value="3">
			  <div class="row">
				  <div class="col-md-3">
					<label for="refName1" class=" control-label">Reference 1</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['refName1'])) { ?>
					<input type="text" class="form-control" id="refName1" name="refName1" placeholder="Reference Name 1" value="<?php echo $data['valids']['refName1'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="refName1" name="refName1" placeholder="Reference Name 1">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['refName1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['refName1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="refPhone1" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['refPhone1'])) { ?>
					<input type="text" class="form-control" id="refPhone1" name="refPhone1" placeholder="Phone" value="<?php echo $data['valids']['refPhone1'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="refPhone1" name="refPhone1" placeholder="Phone">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['refPhone1'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['refPhone1']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="refName2" class=" control-label">Reference 2</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['refName2'])) { ?>
					<input type="text" class="form-control" id="refName2" name="refName2" placeholder="Reference Name 2" value="<?php echo $data['valids']['refName2'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="refName2" name="refName2" placeholder="Reference Name 2">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['refName2'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['refName2']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="refPhone2" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['refPhone2'])) { ?>
					<input type="text" class="form-control" id="refPhone2" name="refPhone2" placeholder="Phone" value="<?php echo $data['valids']['refPhone2'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="refPhone2" name="refPhone2" placeholder="Phone">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['refPhone2'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['refPhone2']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
			  <div class="row form-subheading">
				<div class="col-md-12">
				<h4>Existing Fuel Supplier</h4>
				</div>
			  </div>
			  
			  <div class="row">
				  <div class="col-md-3">
					<label for="fuelSupplierName" class="control-label">Existing Fuel Supplier</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['fuelSupplierName'])) { ?>
					<input type="text" class="form-control" id="fuelSupplierName" name="fuelSupplierName" placeholder="Existing Fuel Supplier Name"  value="<?php echo $data['valids']['fuelSupplierName'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="fuelSupplierName" name="fuelSupplierName" placeholder="Existing Fuel Supplier Name">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['fuelSupplierName'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['fuelSupplierName']; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  <div class="row">
				  <div class="col-md-3">
					<label for="fuelSupplierPhone" class="control-label">Phone</label>
				  </div>
				  <div class="col-md-4">
					<?php if (isset($data['valids']['fuelSupplierPhone'])) { ?>
					<input type="text" class="form-control" id="fuelSupplierPhone" name="fuelSupplierPhone" placeholder="Phone" value="<?php echo $data['valids']['fuelSupplierPhone'];?>">
					<?php } else { ?>
					<input type="text" class="form-control" id="fuelSupplierPhone" name="fuelSupplierPhone" placeholder="Phone">
					<?php } ?>
				  </div>
				  <?php if (isset($data['errors']['fuelSupplierPhone'])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['fuelSupplierPhone']; ?>
				  </div>	
				  <?php } ?>
			  </div>
	
			  <div class="row">
				  <div class="col-md-3">
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=2">&laquo; Back</a>
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
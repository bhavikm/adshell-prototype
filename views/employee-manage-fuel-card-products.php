<h4 class="red-text">Manage Customer Fuel Cards > Update Fuel Card Products</h4>
<br />
<?php if (isset($data['notification'])) { ?>
<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $data['notification']; ?>
</div>
<?php } ?>

<form class="form" method="post" role="form" action="index.php?employee">

<input type="hidden" class="form-control" name="action" id="action" value="managefuel">
<input type="hidden" class="form-control" name="second" id="second" value="updateproducts">
<input type="hidden" class="form-control" name="cardid" id="cardid" value="<?php echo $data['fuelCard']['fuelCardID']; ?>">
<input type="hidden" class="form-control" name="appid" id="appid" value="<?php echo $data['fuelCard']['applicationID']; ?>">

<div class="row short-form-row">
  <div class="col-md-4">
	<label class="control-label">Fuel Card ID:</label>
  </div>
  <div class="col-md-4">
	<?php echo $data['fuelCard']['fuelCardID']; ?>
  </div>
</div>

<div class="row short-form-row">
  <div class="col-md-4">
	<label class="control-label">Card Holder Name:</label>
  </div>
  <div class="col-md-4">
	<?php echo $data['fuelCard']['holderName']; ?>
  </div>
</div>
  
<div class="row short-form-row">
  <div class="col-md-4">
	<label class="control-label">Fuel Card Products:</label>
  </div>
  <div class="col-md-5">
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="unleaded" class="productCheckbox" <?php if (in_array('unleaded',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Unleaded 
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="biodiesel" class="productCheckbox" <?php if (in_array('biodiesel',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> BioDiesel
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="unleadedMax" class="productCheckbox" <?php if (in_array('unleadedMax',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Unleaded Max e10
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="lpg" class="productCheckbox" <?php if (in_array('lpg',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> LPG
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="gas" class="productCheckbox" <?php if (in_array('gas',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Gas
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="carWash" class="productCheckbox" <?php if (in_array('carWash',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Car Wash
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="shop" class="productCheckbox" <?php if (in_array('shop',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Shop
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="premiumUnleaded" class="productCheckbox" <?php if (in_array('premiumUnleaded',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> Premium Unleaded
	</label>
	<br />
	<label class="checkbox-inline">
	  <input type="checkbox" name="fuelCardProducts[]" value="octane" class="productCheckbox" <?php if (in_array('octane',$data['fuelCard']['fuelCardProducts'])) { ?> checked="checked" <?php } ?>> 98 Octane
	</label>
  </div>
  <?php if (isset($data['errors'])) { ?>
  <div class="col-md-4 col-md-offset-1 red-text">	
	<?php echo $data['errors']; ?>
  </div>	
  <?php } ?>
</div>	

<div class="row">
  <div class="col-md-6 col-md-offset-4">
	 <br />
	 <button class="btn btn btn-primary" type="submit">Update &raquo;</button>
  </div>
</div>

</form>
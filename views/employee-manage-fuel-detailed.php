
<h4 class="red-text">Manage Customer Fuel Cards</h4>
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
			<td>Required
			<?php if ($fuelCard['cardStatus'] != 'cancelled') { ?>
			<br /><br />
			<a class="btn btn-danger" href="index.php?employee&action=managefuel&second=resetpin&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Reset &raquo;</a>
			<?php } ?>
			</td>
			<?php } else { ?>
			<td>Not Required</td>
			<?php } ?>
			<td>
			<?php foreach ($fuelCard['fuelCardProducts'] as $product) { ?>
			<?php echo $product['productName']; ?><br />
			<?php } ?>
			<?php if ($fuelCard['cardStatus'] != 'cancelled') { ?>
			<br /><a class="btn btn-primary" href="index.php?employee&action=managefuel&second=changeproducts&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Edit &raquo;</a>
			<?php } ?>
			</td>
			<?php if ($fuelCard['cardStatus'] == 'enabled') { ?>
			<td class="success">
			<?php } elseif ($fuelCard['cardStatus'] == 'disabled') { ?>
			<td class="warning">
			<?php } else { ?>
			<td class="danger">
			<?php } ?>
				<select name="status-<?php echo $fuelCard['fuelCardID']; ?>" class="cardProducts">
					<option value="enabled" <?php if ($fuelCard['cardStatus'] == 'enabled') echo 'selected';?>>Enabled</option>
					<option value="disabled" <?php if ($fuelCard['cardStatus'] == 'disabled')  echo 'selected';?>>Disabled</option>
					<option value="cancelled" <?php if ($fuelCard['cardStatus'] == 'cancelled')  echo 'selected';?>>Cancelled</option>
				</select>
				<br /><br /><a class="btn btn-primary" href="index.php?employee&action=managefuel&second=changeproducts&appid=<?php echo $fuelCard['applicationID']; ?>&cardid=<?php echo $fuelCard['fuelCardID']; ?>">Update &raquo;</a>
			</td>
		</tr>
		<?php } ?>
		<?php } ?>
		<tr>
			<td colspan="7"></td>
		</tr>
	</tbody>
</table>

<script type="text/javascript">
$(document).ready(function(){

	  //once user presses button to add another partner
	  $('.cardProducts').on('change', function(event) {

		var selectedOption = $(this).val();	
		var cardID =  $(this).attr('name').substring(7);
		var newStatus = 'index.php?employee&action=managefuel&second=updatestatus&appid=<?php echo $fuelCard['applicationID']; ?>&cardid='+cardID;
		var newButtonLink = newStatus+"&status="+selectedOption;
		$(this).parent().children('a').attr('href', newButtonLink);
		
	  });

});
</script>
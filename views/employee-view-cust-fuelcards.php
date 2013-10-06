
<h4 class="red-text">View Customer Fuel Cards</h4>
<br />

<table class="table table-striped">
	<thead>
          <tr>
            <th>#</th>
			<th>Card Holder Name</th>
            <th>Card Status</th>
			<th>Date Created</th>
			<th>Registration No.</th>
			<th>Pin Required</th>
			<th>Number Products</th>
			<th>View Reports</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['fuelCards']) && count($data['fuelCards']) > 0 && $data['fuelCards']) { ?>
		<?php foreach ($data['fuelCards'] as $index => $fuelCard) { ?>
		<tr>
			<td><?php echo $index+1; ?></td>
			<td><?php echo $fuelCard['cardHolderName']; ?></td>
			<?php if ($fuelCard['cardStatus'] == 'enabled') { ?>
			<td class="success"><?php echo $fuelCard['cardStatus']; ?></td>
			<?php } else { ?>
			<td class="danger"><?php echo $fuelCard['cardStatus']; ?></td>
			<?php } ?>
			<td><?php echo $fuelCard['dateCreated']; ?></td>
			<td><?php echo $fuelCard['registrationNo']; ?></td>
			<?php if ($fuelCard['pinRequired']) { ?>
			<td class="success">Yes</td>
			<?php } else { ?>
			<td class="warning">No</td>
			<?php } ?>
			<td><?php echo $fuelCard['productsCount']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=managefuel&second=viewcardreport&cardid=<?php echo $fuelCard['fuelCardID']; ?>">View &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
		<tr>
			<td colspan="8"></td>
		</tr>
	</tbody>
</table>

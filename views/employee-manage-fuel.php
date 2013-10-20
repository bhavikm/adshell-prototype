
<h4 class="red-text">Manage Customer Fuel Cards</h4>
<br />
<?php if (isset($data['notification'])) { ?>
<div class="alert alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $data['notification']; ?>
</div>
<?php } ?>
<table class="table table-striped">
	<thead>
          <tr>
            <th>#</th>
			<th>Business Name</th>
            <th>Contact Name</th>
			<th>No. Fuel Cards</th>
			<th>Monthly Credit Limit</th>
			<th>Modify</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['briefCustomers']) && count($data['briefCustomers']) > 0 && $data['briefCustomers']) { ?>
		<?php foreach ($data['briefCustomers'] as $index => $briefCustomer) { ?>
		<tr>
			<td><?php echo $index+1; ?></td>
			<td><?php echo $briefCustomer['businessName']; ?></td>
			<td><?php echo $briefCustomer['contactFirstName'].' '.$briefCustomer['contactLastName']; ?></td>
			<td><?php echo $briefCustomer['cardsCount']; ?></td>
			<td><?php echo $briefCustomer['creditLimit']; ?></td>
			<td><a class="btn btn-warning" href="index.php?employee&action=managefuel&second=manage&appid=<?php echo $briefCustomer['applicationID']; ?>">Manage &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
		<tr>
			<td colspan="7">
			
			</td>
		</tr>
	</tbody>
</table>

<br />
<br />
<h4>Search For Customer:</h4>
<br />
<div class="col-xs-12 col-sm-6 col-md-12 spacing-under">
	<form action="index.php?employee" method="post">
		<input type="hidden" name="action" value="managefuel" />
		<input type="hidden" name="second" value="searchcust" />
		  <div class="row">
			  <div class="col-md-3">
				<label for="custSearch" class="control-label">Business Name</label>
			  </div>
			  <div class="col-md-5">
				<input class="form-control" type="text" name="custSearch" id="custSearch" placeholder="Business Trading Name or Registered Name" />
			
			  </div>
			  <div class="col-md-4">
				<button class="btn btn btn-primary" type="submit">Search</button>
			
			  </div>
		  </div>
		
	</form>
</div>
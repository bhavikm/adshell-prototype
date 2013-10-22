<h4 class="red-text">View Customer Requests</h4>
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
            <th>Customer Name</th>
			<th>Request</th>
			<th>Date</th>
			<th>Respond</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['creditRequests']) && count($data['creditRequests']) > 0 && $data['creditRequests']) { ?>
		<?php foreach ($data['creditRequests'] as $index => $request) { ?>
		<tr>
			<td><?php echo $index+1; ?></td>
			<td><?php echo $request['contactFirstName']; ?> <?php echo $request['contactLastName']; ?></td>
			<td>Change Credit Limit</td>
			<td><?php echo $request['dateCreated']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=respondcredit&requestid=<?php echo $request['requestID']; ?>&appid=<?php echo $request['applicationID']; ?>">Respond &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } else { ?>
		<tr>
			<td colspan="5">
			No new requests.
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
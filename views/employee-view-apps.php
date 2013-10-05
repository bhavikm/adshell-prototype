<h4>New Customer Applications:</h4>
<br />

<table class="table table-striped">
	<thead>
          <tr>
            <th>#</th>
			<th>Date</th>
            <th>Business Name</th>
			<th>Status</th>
			<th>Review</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['briefApplications'])) { ?>
		<?php foreach ($data['briefApplications'] as $index => $briefApplication) { ?>
		<tr>
			<td><?php echo $index+1; ?></td>
			<td><?php echo $briefApplication['applicationDate']; ?></td>
			<td><?php echo $briefApplication['businessName']; ?></td>
			<td><?php echo $briefApplication['applicationStatus']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=manageapps&second=detailapp&appid=<?php echo $briefApplication['applicationID']; ?>">Review &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>

<br />
<br />
<h4>Search For Customer Application:</h4>
<br />
<div class="col-xs-12 col-sm-6 col-md-12">
	<form action="index.php?employee" method="post">
		<input type="hidden" name="action" value="manageapps" />
		<input type="hidden" name="second" value="searchapp" />
		  <div class="row">
			  <div class="col-md-3">
				<label for="appSearch" class="control-label">Application ID</label>
			  </div>
			  <div class="col-md-5">
				<input class="form-control" type="text" name="appSearch" id="appSearch" placeholder="Application ID" />
			
			  </div>
			  <div class="col-md-4">
				<button class="btn btn btn-primary" type="submit">Search</button>
			
			  </div>
		  </div>
		
	</form>
</div>
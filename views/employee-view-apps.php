<h4 class="red-text spacing-under">Manage Customer Applications</h4>
<br />

<h4 style="color:#528bff;">New Customer Applications:</h4>
<br />

<table class="table table-striped spacing-under">
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
		<?php if (isset($data['briefApplications']) && count($data['briefApplications']) > 0 && $data['briefApplications']) { ?>
		<?php foreach ($data['briefApplications'] as $index => $briefApplication) { ?>
		<tr>
			<td><?php echo $briefApplication['applicationID']; ?></td>
			<td><?php echo $briefApplication['applicationDate']; ?></td>
			<td><?php echo $briefApplication['businessName']; ?></td>
			<td><?php echo $briefApplication['applicationStatus']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=manageapps&second=detailapp&appid=<?php echo $briefApplication['applicationID']; ?>">Review &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>

<h4 style="color:#528bff;">Recently Approved Customer Applications:</h4>
<br />

<table class="table table-striped spacing-under">
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
		<?php if (isset($data['briefApplicationsApproved']) && count($data['briefApplicationsApproved']) > 0 && $data['briefApplicationsApproved']) { ?>
		<?php foreach ($data['briefApplicationsApproved'] as $index => $briefApplication) { ?>
		<tr>
			<td><?php echo $briefApplication['applicationID']; ?></td>
			<td><?php echo $briefApplication['applicationDate']; ?></td>
			<td><?php echo $briefApplication['businessName']; ?></td>
			<td><?php echo $briefApplication['applicationStatus']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=manageapps&second=detailapp&appid=<?php echo $briefApplication['applicationID']; ?>">View &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>

<h4 style="color:#528bff;">Recently Rejected Customer Applications:</h4>
<br />

<table class="table table-striped spacing-under">
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
		<?php if (isset($data['briefApplicationsRejected']) && count($data['briefApplicationsRejected']) > 0 && $data['briefApplicationsRejected']) { ?>
		<?php foreach ($data['briefApplicationsRejected'] as $index => $briefApplication) { ?>
		<tr>
			<td><?php echo $briefApplication['applicationID']; ?></td>
			<td><?php echo $briefApplication['applicationDate']; ?></td>
			<td><?php echo $briefApplication['businessName']; ?></td>
			<td><?php echo $briefApplication['applicationStatus']; ?></td>
			<td><a class="btn btn-primary" href="index.php?employee&action=manageapps&second=detailapp&appid=<?php echo $briefApplication['applicationID']; ?>">View &raquo;</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
	</tbody>
</table>

<br />
<br />
<h4 style="color:#528bff;">Search For Customer Application:</h4>
<br />
<div class="col-xs-12 col-sm-6 col-md-12 spacing-under">
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
<?php if (isset($data['error'])) { ?>
	<h4 style="color:#528bff;">Search Results:</h4>
	<br />
	<div class="col-xs-12 col-sm-6 col-md-12">
	<?php if ($data['error'] || (isset($data['searchResults']) && count($data['searchResults']) == 0)) { ?>
	<div class="row">
	    <div class="col-md-12">
		Your search produced no results.
		</div>
	</div>
	<?php } else { ?>
	<?php if (!$data['error'] && isset($data['searchResults']) && count($data['searchResults']) > 0 && $data['searchResults']) { ?>
	<div class="row">
	<div class="col-md-12">
		<table class="table table-striped">
			<thead>
				  <tr>
					<th>Date</th>
					<th>Business Name</th>
					<th>Status</th>
					<th>Review</th>
				  </tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $data['searchResults']['applicationDate']; ?></td>
					<td><?php echo $data['searchResults']['businessName']; ?></td>
					<td><?php echo $data['searchResults']['applicationStatus']; ?></td>
					<td><a class="btn btn-primary" href="index.php?employee&action=manageapps&second=detailapp&appid=<?php echo $result['applicationID']; ?>">Review &raquo;</a></td>
				</tr>
			</tbody>
		</table>
	  </div>
	 </div> 
	<?php } else { ?>
	<div class="row">
	    <div class="col-md-12">
		Your search produced no results.
		</div>
	</div>
	<?php } ?>
	<?php } ?>
	</div>
	<?php } ?>
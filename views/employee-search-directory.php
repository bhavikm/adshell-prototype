<h4 class="red-text">Search Employee Directory</h4>
<br />

<div class="col-xs-12 col-sm-6 col-md-12 spacing-under">
	<form action="index.php?employee" method="post">
		<input type="hidden" name="action" value="searchemployee" />
		<input type="hidden" name="second" value="search" />
		  <div class="row">
			  <div class="col-md-3">
				<label for="empSearch" class="control-label">Employee Name</label>
			  </div>
			  <div class="col-md-5">
				<input class="form-control" type="text" name="empSearch" id="empSearch" placeholder="Employee Name" />
			  </div>
			  <div class="col-md-4">
				<button class="btn btn btn-primary" type="submit">Search</button>
			
			  </div>
		  </div>
	</form>
</div>

	<?php if (isset($data['error'])) { ?>
	<h4>Search Results:</h4>
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
					<th>Name</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Job</th>
				  </tr>
			</thead>
			<tbody>
			<?php foreach ($data['searchResults'] as $result) { ?>
				<tr>
					<td><?php echo $result['empName']; ?></td>
					<td><?php echo $result['empPhone']; ?></td>
					<td><?php echo $result['empAddress']; ?></td>
					<td><?php echo $result['jobDescription']; ?></td>
				</tr>
	  
			<?php } ?>
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

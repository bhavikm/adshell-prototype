<h4>Search Employee Directory:</h4>
<br />

<div class="col-xs-12 col-sm-6 col-md-12">
	<form action="index.php?employee" method="post">
		<input type="hidden" name="action" value="searchemp" />
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
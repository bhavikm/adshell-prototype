<div class="col-xs-12 col-sm-6 col-md-10">

		
			<form class="form" role="form" action="index.php?employee" method="post">
				
				<input type="hidden" name="action" value="modifyaccount" />
				<input type="hidden" name="second" value="update" />
			  <div class="row form-subheading">
			   <div class="col-md-12 spacing-under-small">
			   <h4>Employee Details</h4>
			   </div>
			  </div>	
			  <div class="row spacing-under-small">
				  <div class="col-md-5">
					<label for="empName" class="control-label">Employee Name</label>
				  </div>
				  <div class="col-md-7">
					<input type="text" class="form-control" id="empName"  name="empName" value="<?php echo $data['employeeDetails']['empName']; ?>">
				  </div>
			  </div>
			  <div class="row spacing-under-small">
				  <div class="col-md-5">
					<label for="empAddress" class="control-label">Employee Address</label>
				  </div>
				  <div class="col-md-7">
					<textarea type="text" class="form-control" id="empAddress" name="empAddress"><?php echo $data['employeeDetails']['empAddress']; ?></textarea>
				  </div>
			  </div>
			  <div class="row spacing-under-small">
				  <div class="col-md-5">
					<label for="empPhone" class="control-label">Employee Phone Number</label>
				  </div>
				  <div class="col-md-7">
					<input type="text" class="form-control" id="empPhone" name="empPhone" value="<?php echo $data['employeeDetails']['empPhone']; ?>">
				  </div>
			  </div>
			  <div class="row spacing-under-small">
				  <div class="col-md-5">
					<label for="jobDesc" class="control-label">Employee Address</label>
				  </div>
				  <div class="col-md-7">
					<textarea type="text" class="form-control" id="jobDesc" name="jobDesc"><?php echo $data['employeeDetails']['jobDescription']; ?></textarea>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-6 col-md-offset-5">
					 <br />
					 <a class="btn btn btn-primary" href="">Apply Changes &raquo;</a>
				  </div>
			  </div>
			</form>
</div>
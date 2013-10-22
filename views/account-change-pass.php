<p><h4 class="red-text">Change your login password</h4></p>
  <br />
  <?php if (isset($data['passmessage'])) { ?>
	<div class="row spacing-under-small">
		  <div class="col-md-9">
			To complete recovery of your account, please provide your temporary password and provide a new password.
		  </div>
	</div>
	<br />
	<br />
	<?php } ?>
	
	<?php if (isset($data['error'])) { ?>
		<?php if ($data['error']) { ?>
		<div class="row spacing-under-small">
			  <div class="col-md-9">
				<div class="alert alert-danger"><?php echo $data['error'];?></div>
			  </div>
		</div>
		<?php } else { ?>
		<div class="row spacing-under-small">
			  <div class="col-md-9">
				<div class="alert alert-success">Your password was succesfully updated.</div>
			  </div>
		</div>
		<?php } ?>
	<?php } ?>
	<form class="form" method="post" role="form" action="index.php?<?php echo $data['accountType']; ?>">
	
		<input type="hidden" class="form-control" name="action" id="action" value="changepass">
		
		<input type="hidden" class="form-control" name="second" id="second" value="newpass">
		
		
		<div class="row">
		  <div class="col-md-4">
			<?php if (isset($data['passmessage'])) { ?>
			<label for="passwordCurrent" class="control-label">Temporary Password</label>
			<?php } else { ?>
			<label for="passwordCurrent" class="control-label">Current Password</label>
			<?php } ?>
		  </div>
		  <div class="col-md-4">
			 <input type="password" class="form-control" id="passwordCurrent" name="passwordCurrent">
		  </div>
		</div>
		
		<br />
		<br />
		
		<div class="row spacing-under-small">
		  <div class="col-md-4">
			<label for="newPassword1" class="control-label">New Password</label>
		  </div>
		  <div class="col-md-4">
			 <input type="password" class="form-control" id="newPassword1" name="newPassword1">
		  </div>
		</div>

		<div class="row">
		  <div class="col-md-4">
			<label for="newPassword2" class="control-label">Confirm New Password</label>
		  </div>
		  <div class="col-md-4">
			 <input type="password" class="form-control" id="newPassword2" name="newPassword2">
		  </div>
		</div>
		
		<div class="row">
		  <div class="col-md-6 col-md-offset-4">
			 <br />
			 <button class="btn btn btn-primary" type="submit">Change &raquo;</button>
		  </div>
		</div>
		
	</form>

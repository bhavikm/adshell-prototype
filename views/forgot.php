<?=$data['header'];?>

<div class="container login-wrap">
    <h1>Forgot Password</h1>
    <div class="col-xs-12 col-sm-6 col-md-8">
		<form class="form-signin" action="index.php">
			<input type="hidden" name="login" value="" />	
			<?php if ($data['valid_user'] == 'incorrect') { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					<div class="alert alert-danger">You did not provide a valid email address!</div>
				  </div>
			</div>
			<?php } ?>
			<?php if (($data['valid_user'] == 'incorrect') || ($data['valid_user'] == 'not checked')) { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					Please provide the email address attached to your account:
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-3">
					<label for="email" class="col-lg-2 control-label">Email</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email address" autofocus>
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-9 col-md-offset-3">
					 <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
				  </div>
			</div>
			<input type="hidden" name="action" value="forgot" />
			<?php } ?>
		</form>	
		<?php if ($data['valid_user'] == 'confirmed') { ?>
		<div class="row spacing-under-small">
			  <div class="col-md-10">
				Your password has been reset. Please check your email for instructions.
			  </div>
		</div>
		<?php } ?>
		
				
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-4  border-on-left">
		<div class="col-md-11 col-md-offset-1">
			<br />
			 Want to sign in? <br /><a href="index.php?login">Login &raquo;</a>
			<br />
			<br />
			Don't have an account? <br /><a href="index.php?apply">Apply Today &raquo;</a>
			<br />
			<br />
			Adshell Staff Member? <br /><a href="index.php?login&logtype=staff">Employee Login &raquo;</a>
		</div>
	</div>

</div>


<?=$data['footer'];?>
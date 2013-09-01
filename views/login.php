<?=$data['header'];?>

<div class="container login-wrap">
    <h1><?=$data['heading'];?></h1>
    <div class="col-xs-12 col-sm-6 col-md-8 border-on-right">
		<form class="form-signin" action="index.php">
			<input type="hidden" name="login" value="" />
			<?php if ($data['valid_user'] == 'incorrect') { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					<div class="alert alert-danger">You did not provide a valid email address!</div>
				  </div>
			</div>
			<?php } ?>
			<?php if ($data['heading'] != 'Adshell Staff Login') { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					Customers and Fuel Card holders:
				  </div>
			</div>
			<?php } ?>
			<div class="row">
				  <div class="col-md-3">
					<label for="email" class="col-lg-2 control-label">Email</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="email" name="email" placeholder="Email address" autofocus>
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-3">
					<label for="password" class="col-lg-2 control-label">Password</label>
				  </div>
				  <div class="col-md-9">
					<input type="password" id="password" class="form-control" name="password" placeholder="Password">
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-9 col-md-offset-3">
					 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				  </div>
			</div>
			<input type="hidden" name="action" value="login" />
		</form>
				
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="col-md-11 col-md-offset-1">
			<br />
			 Forgot your password? <br /><a href="index.php?login&logtype=forgot">Get new password &raquo;</a>
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
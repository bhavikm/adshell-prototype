<?=$data['header'];?>

<div class="container login-wrap">
    
	  <div class="col-xs-12 col-sm-6 col-md-8">	
		 <div class="row spacing-under-small" style="padding-left: 15px;">
			  <div class="col-md-9 col-md-offset-2">
				<h1><?=$data['heading'];?></h1>
			  </div>
		</div>
	  </div>
	
    <div class="col-xs-12 col-sm-6 col-md-8 border-on-right">
		
		<form class="form-signin" action="index.php?login" method="post">
		
			<?php if ($data['heading'] == 'Forgot Password') { ?>
			<input type="hidden" name="action" value="forgot" />
			<?php } else { ?>
			<input type="hidden" name="action" value="login" />
			<?php } ?>
			
			
			<?php if ($data['heading'] == 'Adshell Staff Login') { ?>
			<input type="hidden" name="logtype" value="staff" />
			<?php } elseif ($data['heading'] == 'Forgot Password') { ?>
			<input type="hidden" name="logtype" value="forgot" />
			<?php } else { ?>
			<input type="hidden" name="logtype" value="customer" />
			<?php } ?>
			
			
			<?php if ($data['error']) { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					<div class="alert alert-danger"><?php echo $data['error_message'];?></div>
				  </div>
			</div>
			<?php } ?>
			
			
			<?php if ($data['heading'] == 'Customer Login') { ?>
			<div class="row spacing-under-small">
				  <div class="col-md-9 col-md-offset-3">
					Customers and Fuel Card holders:
				  </div>
			</div>
			<?php } ?>
			
			<div class="row">
				  <div class="col-md-3">
					<label for="email" class="control-label">User Name</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="username" name="username" placeholder="User Name" autofocus>
				  </div>
			</div>
			<?php if ($data['heading'] != 'Forgot Password') { ?>
			<div class="row">
				  <div class="col-md-3">
					<label for="password" class="control-label">Password</label>
				  </div>
				  <div class="col-md-9">
					<input type="password" id="password" class="form-control" name="password" placeholder="Password">
				  </div>
			</div>
			<?php } ?>
			<div class="row">
				  <div class="col-md-9 col-md-offset-3">
					 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				  </div>
			</div>
		</form>
				
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="col-md-11 col-md-offset-1">
			
			<?php if ($data['heading'] != 'Forgot Password') { ?>
			<br />
			 Forgot your password? <br /><a href="index.php?login&logtype=forgot">Get new password &raquo;</a>
			 <br />
			<br />
			 <?php } ?>
			
			Don't have an account? <br /><a href="index.php?apply">Apply Today &raquo;</a>
			<br />
			<br />
			<?php if ($data['heading'] == 'Customer Login') { ?>
			Adshell Staff Member? <br /><a href="index.php?login&logtype=staff">Employee Login &raquo;</a>
			<?php } elseif ($data['heading'] == 'Forgot Password') { ?>
			Adshell Staff Member? <br /><a href="index.php?login&logtype=staff">Employee Login &raquo;</a>
			<br />
			<br />
			Customer or Fuel Card Holder? <br /><a href="index.php?login">Customer Login &raquo;</a>
			<?php } else { ?>
			Customer or Fuel Card Holder? <br /><a href="index.php?login">Customer Login &raquo;</a>
			<?php } ?>
		</div>
	</div>

</div>


<?=$data['footer'];?>
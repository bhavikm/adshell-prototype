<?=$data['header'];?>

<div class="container login-wrap">
    <h1><?=$data['heading'];?></h1>
    <div class="col-xs-12 col-sm-6 col-md-8 border-on-right">
		<form class="form-signin">
			<div class="row">
				  <div class="col-md-3">
					<label for="custEmailLogin" class="col-lg-2 control-label">Email</label>
				  </div>
				  <div class="col-md-9">
					<input type="text" class="form-control" id="custEmailLogin" placeholder="Email address" autofocus>
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-3">
					<label for="custPassLogin" class="col-lg-2 control-label">Password</label>
				  </div>
				  <div class="col-md-9">
					<input type="password" id="custPassLogin" class="form-control" placeholder="Password">
				  </div>
			</div>
			<div class="row">
				  <div class="col-md-9 col-md-offset-3">
					 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				  </div>
			</div>

		</form>
				
	</div>
	
	<div class="col-xs-6 col-sm-6 col-md-4">
		<div class="col-md-11 col-md-offset-1">
			<br />
			 Forgot your password? <br /><a href="index.php?apply">Get new password &raquo;</a>
			<br />
			<br />
			Don't have an account? <br /><a href="index.php?apply">Apply Today &raquo;</a>
		</div>
	</div>

</div>


<?=$data['footer'];?>
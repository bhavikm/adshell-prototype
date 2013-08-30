<?=$data['header'];?>

<div class="container">
    <h1>Calculator</h1>
	<div id="contact-page">
		<div class="row">
			<div class="col-md-10">
			   Have any questions? <br />
			   No problems! Just use the form below to get in touch, call us or email us and we will get back to you fast.
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8 border-on-right">

				<form class="form" role="form">

				  <div class="row">
					  <div class="col-md-2">
						<label for="inputName" class="col-lg-2 control-label">Distance (kms)</label>
					  </div>
					  <div class="col-md-6">
						<input type="text" class="form-control" id="inputName" placeholder="Distance in kilometers">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-2">
						<label for="inputEmail1" class="col-lg-2 control-label">Fuel Type</label>
					  </div>
					  <div class="col-md-6">
						<select class="form-control">
						  <option>Unleaded</option>
						  <option>Bio-Diesel</option>
						  <option>High Octane</option>
						</select>
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-2">
						 <br />
						 <button type="submit" class="btn btn-primary">Calculate</button>
					  </div>
				  </div>
				</form>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-4">
				<div class="col-md-11 col-md-offset-1">
					Get the calculator as an app:
					<br /><br />
					<img src="images/app-store.jpg" />
					<br /><br /><br />
					<img src="images/android-app-on-google-play.jpeg" />
				</div>
			</div>
		</div>
	</div>
</div>

<?=$data['footer'];?>
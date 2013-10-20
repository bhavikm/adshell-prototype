<?=$data['header'];?>

<div class="container body-container">
    <h1>Contact</h1>
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
						<label for="inputName" class="col-lg-2 control-label">Name</label>
					  </div>
					  <div class="col-md-6">
						<input type="text" class="form-control" id="inputName" placeholder="Name">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-2">
						<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
					  </div>
					  <div class="col-md-6">
						<input type="email" class="form-control" id="inputEmail1" placeholder="Email">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-2">
						<label for="inputPhone" class="col-lg-2 control-label">Phone</label>
					  </div>
					  <div class="col-md-6">
						 <input type="text" class="form-control" id="inputPhone" placeholder="Phone">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-2">
						<label for="inputEnquiry" class="col-lg-2 control-label">Enquiry</label>
					  </div>
					  <div class="col-md-6">
						 <textarea class="form-control" id="inputEnquiry" placeholder="Enquiry" rows="4"></textarea>
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-2">
						 <br />
						 <button type="submit" class="btn btn-primary">Submit</button>
					  </div>
				  </div>
				</form>
			</div>
			
			<div class="col-xs-6 col-sm-6 col-md-4">
				<div class="col-md-11 col-md-offset-1">
					<br />
					<h4>Phone Number: </h4>1800 000 000
					<br />
					<h4>Email: </h4><span class="contact-email">contact@adshell.com.au</span>
				</div>
			</div>
		</div>
	</div>
</div>

<?=$data['footer'];?>
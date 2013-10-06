<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="row spacing-under">
		<h4 class="red-text">Application Detailed View</h4>
	</div>
	
	<div class="row form-subheading">
	   <div class="col-md-12">
	   <h4>Business Details</h4>
	   </div>
	 </div>
	<div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Business Type:</b>
		 </div>
		 <div class="col-md-4">
			<?php
				if (isset($data['detailedApplication']['biztype']))
				  {	
					echo $data['detailedApplication']['biztype']; 
				  }
			?>
		 </div>
	</div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Business Name:</b>
		 </div>
		 <div class="col-md-4">
			<?php 
				  if (isset($data['detailedApplication']['businessName']))
				  {	
					echo $data['detailedApplication']['businessName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Trading Name:</b>
		 </div>
		 <div class="col-md-4">
			<?php 
				   if (isset($data['detailedApplication']['tradingName']))
				  {	
					echo $data['detailedApplication']['tradingName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Business Year Start:</b>
		 </div>
		 <div class="col-md-4">
			<?php 
				   if (isset($data['detailedApplication']['businessStartYear']))
				  {	
					echo $data['detailedApplication']['businessStartYear']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>ABN/ACN:</b>
		 </div>
		 <div class="col-md-4">
			<?php 
				    if (isset($data['detailedApplication']['abn']))
				  {	
					echo $data['detailedApplication']['abn']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Nature of Operations:</b>
		 </div>
		 <div class="col-md-4">
			<?php
				    if (isset($data['detailedApplication']['operationsNaure']))
				  {	
					echo $data['detailedApplication']['operationsNaure']; 
				  }
			?>
		 </div>
	  </div>
	  <br />
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact First Name:</b>
		 </div>
		 <div class="col-md-4">
			<?php   if (isset($data['detailedApplication']['contactFirstName']))
				  {	
					echo $data['detailedApplication']['contactFirstName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Last Name:</b>
		 </div>
		 <div class="col-md-4">
			<?php   if (isset($data['detailedApplication']['contactLastName']))
				  {	
					echo $data['detailedApplication']['contactLastName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Position:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['position']))
				  {	
					echo $data['detailedApplication']['position']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Phone Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['phone']))
				  {	
					echo $data['detailedApplication']['phone']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Fax Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['fax']))
				  {	
					echo $data['detailedApplication']['fax']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Mobile Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['mobile']))
				  {	
					echo $data['detailedApplication']['mobile']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Email:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['email']))
				  {	
					echo $data['detailedApplication']['email']; 
				  }
			?>
		 </div>
	  </div>
	  <br />
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Account Credit Limit:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedApplication']['creditLimit']))
				  {	
					echo $data['detailedApplication']['creditLimit']; 
				  }
			?>
		 </div>
	  </div>
	  <!-- -----------------PAGE 1 END-------------------- -->
	  
	  <br /><br />
	  <?php    if (isset($data['detailedApplication']['applicationStatus']) && $data['detailedApplication']['applicationStatus'] == 'pending')
				  {	
	   ?>
	  
	  <div class="row">
		 <div class="col-md-4">
			<a class="btn btn-success" href="index.php?employee&action=approveapp&appid=<?php echo $data['detailedApplication']['applicationID'];?>">Approve Application</a>
		 </div>
		 <div class="col-md-4">
			<a class="btn btn-danger" href="index.php?employee&action=rejectapp&appid=<?php echo $data['detailedApplication']['applicationID'];?>">Reject Application</a>
		 </div>
	  </div>
	  
	  <?php } ?>
</div>
<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="row spacing-under">
		 <h4 class="red-text">Customer Detailed View</h4>
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
				if (isset($data['detailedCustomer']['biztype']))
				  {	
					echo $data['detailedCustomer']['biztype']; 
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
				  if (isset($data['detailedCustomer']['businessName']))
				  {	
					echo $data['detailedCustomer']['businessName']; 
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
				   if (isset($data['detailedCustomer']['tradingName']))
				  {	
					echo $data['detailedCustomer']['tradingName']; 
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
				   if (isset($data['detailedCustomer']['businessStartYear']))
				  {	
					echo $data['detailedCustomer']['businessStartYear']; 
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
				    if (isset($data['detailedCustomer']['abn']))
				  {	
					echo $data['detailedCustomer']['abn']; 
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
				    if (isset($data['detailedCustomer']['operationsNaure']))
				  {	
					echo $data['detailedCustomer']['operationsNaure']; 
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
			<?php   if (isset($data['detailedCustomer']['contactFirstName']))
				  {	
					echo $data['detailedCustomer']['contactFirstName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Last Name:</b>
		 </div>
		 <div class="col-md-4">
			<?php   if (isset($data['detailedCustomer']['contactLastName']))
				  {	
					echo $data['detailedCustomer']['contactLastName']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Position:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['position']))
				  {	
					echo $data['detailedCustomer']['position']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Phone Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['phone']))
				  {	
					echo $data['detailedCustomer']['phone']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Fax Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['fax']))
				  {	
					echo $data['detailedCustomer']['fax']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Mobile Number:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['mobile']))
				  {	
					echo $data['detailedCustomer']['mobile']; 
				  }
			?>
		 </div>
	  </div>
	  <div class="row">
		 <div class="col-md-offset-1 col-md-5">
			<b>Contact Email:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['email']))
				  {	
					echo $data['detailedCustomer']['email']; 
				  }
			?>
		 </div>
	  </div>
	  <br />
	  <div class="row spacing-under">
		 <div class="col-md-offset-1 col-md-5">
			<b>Account Credit Limit:</b>
		 </div>
		 <div class="col-md-4">
			<?php    if (isset($data['detailedCustomer']['creditLimit']))
				  {	
					echo $data['detailedCustomer']['creditLimit']; 
				  }
			?>
		 </div>
	  </div>
	  <!-- -----------------PAGE 1 END-------------------- -->
	  
	  
</div>
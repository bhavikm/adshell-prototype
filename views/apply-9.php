<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<div class="row">
		<div class="col-md-12 center">
		<h2 class="spacing-under">Page 8 of 8 - Review and Finish</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 center">
			<div class="apply-progress">
				Details
			</div>
			<div class="apply-progress">
				Rerferences
			</div>
			<div class="apply-progress">
				Partners
			</div>
			<div class="apply-progress">
				Fuel Cards
			</div>
			<div class="apply-progress">
				Payment Details
			</div>
			<div class="apply-progress">
				Authorization
			</div>
			<div class="apply-progress">
				Terms and Conditions
			</div>
			<div class="apply-progress">
				<b>Review and Finish</b>
			</div>
		</div>
	</div>
	<div class="row spacing-under">
		<div class="col-md-12 center">
			<div class="apply-progress">
			<img src="images/progress-green-left-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-middle-big.jpeg" />
			</div>
			<div class="apply-progress">
				<img src="images/progress-green-right-big.jpeg" />
			</div>
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">

			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Details - Page 1</h4>
			   </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Business Type:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['biztype']))
						  {	
							echo $data['completedPages']['page1']['biztype']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Business Name:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['businessName']))
						  {	
							echo $data['completedPages']['page1']['businessName']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Trading Name:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['tradingName']))
						  {	
							echo $data['completedPages']['page1']['tradingName']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Business Year Start:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['yearBizStart']))
						  {	
							echo $data['completedPages']['page1']['yearBizStart']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>ABN/ACN:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['abn']))
						  {	
							echo $data['completedPages']['page1']['abn']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Nature of Operations:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['operations']))
						  {	
							echo $data['completedPages']['page1']['operations']; 
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
					<?php if (isset($data['completedPages']['page1']['contactFirstName']))
						  {	
							echo $data['completedPages']['page1']['contactFirstName']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Last Name:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['contactLastName']))
						  {	
							echo $data['completedPages']['page1']['contactLastName']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Position:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['inputPosition']))
						  {	
							echo $data['completedPages']['page1']['inputPosition']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Phone Number:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['inputPhone']))
						  {	
							echo $data['completedPages']['page1']['inputPhone']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Fax Number:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['inputFax']))
						  {	
							echo $data['completedPages']['page1']['inputFax']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Mobile Number:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['inputMobile']))
						  {	
							echo $data['completedPages']['page1']['inputMobile']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Contact Email:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page1']['inputEmail1']))
						  {	
							echo $data['completedPages']['page1']['inputEmail1']; 
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
					<?php if (isset($data['completedPages']['page1']['creditLimit']))
						  {	
							echo $data['completedPages']['page1']['creditLimit']; 
						  }
					?>
				 </div>
			  </div>
			  <!-- -----------------PAGE 1 END-------------------- -->
			  
			  <br /><br />
			  
			  <!-- -----------------PAGE 2 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Trade References - Page 2</h4>
			   </div>
			  </div>
			  
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Reference Name 1:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['refName1']))
						  {	
							echo $data['completedPages']['page2']['refName1']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Reference Phone Number 1:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['refPhone1']))
						  {	
							echo $data['completedPages']['page2']['refPhone1']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Reference Name 2:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['refName2']))
						  {	
							echo $data['completedPages']['page2']['refName2']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Reference Phone Number 2:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['refPhone2']))
						  {	
							echo $data['completedPages']['page2']['refPhone2']; 
						  }
					?>
				 </div>
			  </div>
			  <br />
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Previous Fuel Suuplier Name:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['fuelSupplierName']))
						  {	
							echo $data['completedPages']['page2']['fuelSupplierName']; 
						  }
					?>
				 </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Previous Fuel Supplier Phone:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page2']['fuelSupplierPhone']))
						  {	
							echo $data['completedPages']['page2']['fuelSupplierPhone']; 
						  }
					?>
				 </div>
			  </div>
			  <!-- -----------------PAGE 2 END-------------------- -->
			  
			  <br /><br />
			  
			  <!-- -----------------PAGE 3 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Business Partners - Page 3</h4>
			   </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-9">
					<table class="table table-condensed table-bordered">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Name</th>
						  <th>Phone</th>
						  <th>Address</th>
						  <th>State</th>
						  <th>Postcode</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if (isset($data['completedPages']['page3']['partnerDetails'])) {	?>
							<?php for ($i = 0; $i < (int)$data['completedPages']['page3']['numberOfPartners']; $i++) { ?>
							<tr>
							  <td><?php echo $i+1; ?></td>
							  <td><?php echo $data['completedPages']['page3']['partnerDetails'][$i]['partnerName']; ?></td>
							  <td><?php echo $data['completedPages']['page3']['partnerDetails'][$i]['partnerPhone']; ?></td>
							  <td><?php echo $data['completedPages']['page3']['partnerDetails'][$i]['partnerAddress']; ?></td>
							  <td><?php echo $data['completedPages']['page3']['partnerDetails'][$i]['partnerState']; ?></td>
							  <td><?php echo $data['completedPages']['page3']['partnerDetails'][$i]['partnerPostcode']; ?></td>
							</tr>
							<?php } ?>
					   <?php } ?>
					  </tbody>
					</table>
				 </div>
			  </div>
			  <!-- -----------------PAGE 3 END-------------------- -->
			  
			  <br /><br />
			  
			  <!-- -----------------PAGE 4 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Fuel Cards - Page 4</h4>
			   </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Trading Name for Fuel Cards:</b>
				 </div>
				 <div class="col-md-4">
					<?php if (isset($data['completedPages']['page4']['tradingNameFuelCard']))
						  {	
							echo $data['completedPages']['page4']['tradingNameFuelCard']; 
						  }
					?>
				 </div>
			  </div>
			  <br />
			  <div class="row">
			     <div class="col-md-offset-1 col-md-9">
					<table class="table table-condensed table-bordered">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Name</th>
						  <th>Registration No.</th>
						  <th>Pin</th>
						  <th>Products</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if (isset($data['completedPages']['page4']['cardHolderDetails'])) {	?>
							<?php for ($i = 0; $i < (int)$data['completedPages']['page4']['numberOfCardholders']; $i++) { ?>
							<tr>
							  <td><?php echo $i+1; ?></td>
							  <td><?php echo $data['completedPages']['page4']['cardHolderDetails'][$i]['cardHolderName']; ?></td>
							  <td><?php echo $data['completedPages']['page4']['cardHolderDetails'][$i]['registrationNo']; ?></td>
							  <td><?php echo $data['completedPages']['page4']['cardHolderDetails'][$i]['pinRequired']; ?></td>
							  <td>
								<?php foreach ($data['completedPages']['page4']['cardHolderDetails'][$i]['fuelCardProducts'] as $product => $boolProduct) { ?>
									<?php 
										if ($boolProduct)
										{	
											echo $product.'<br />';
										}
									?>
								<?php } ?>
							  </td>
							</tr>
							<?php } ?>
					   <?php } ?>
					  </tbody>
					</table>
				 </div>
			  </div>
			  <!-- -----------------PAGE 4 END-------------------- -->
			  
			  <br /><br />
			  
			  
			  <!-- -----------------PAGE 5 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Payment Details - Page 5</h4>
			   </div>
			  </div>
			  <?php if (isset($data['completedPages']['page5']['paymentType'])) { ?> 
				<div class="row">
			     <div class="col-md-offset-1 col-md-5">
					<b>Payment Type:</b>
				 </div>
				 <div class="col-md-4">
					<?php echo $data['completedPages']['page5']['paymentType']; ?>
				 </div>
				</div>
				<br />
				<?php if ($data['completedPages']['page5']['paymentType'] == 'directDebit') { ?>
					<!-- -----------------DIRECT DEBIT------------------- -->
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Direct Debit Authorisation Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ddAuthoriseName']))
								  {	
									echo $data['completedPages']['page5']['ddAuthoriseName']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Bank Account Type:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['accountType']))
								  {	
									echo $data['completedPages']['page5']['accountType']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Bank Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['bankName']))
								  {	
									echo $data['completedPages']['page5']['bankName']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Account Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['accountName']))
								  {	
									echo $data['completedPages']['page5']['accountName']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>BSB:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['bsbNo']))
								  {	
									echo $data['completedPages']['page5']['bsbNo']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Account Number:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['accountNo']))
								  {	
									echo $data['completedPages']['page5']['accountNo']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Direct Debit Acknowledgement Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ddAcknowdledgeName']))
								  {	
									echo $data['completedPages']['page5']['ddAcknowdledgeName']; 
								  }
							?>
						 </div>
					  </div>
				<?php } else { ?>
					<!-- -----------------CREDIT CARD------------------- -->
					<div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Authorisation Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccAuthoriseName']))
								  {	
									echo $data['completedPages']['page5']['ccAuthoriseName']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Payment Date:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccPaymentDate']))
								  {	
									echo $data['completedPages']['page5']['ccPaymentDate']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccName']))
								  {	
									echo $data['completedPages']['page5']['ccName']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Number:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccNo']))
								  {	
									echo $data['completedPages']['page5']['ccNo']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Expiry:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccExpiryMonth']))
								  {	
									echo $data['completedPages']['page5']['ccExpiryMonth'].' '; 
								  }
								  if (isset($data['completedPages']['page5']['ccExpiryYear']))
								  {	
									echo $data['completedPages']['page5']['ccExpiryYear']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Type:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccType']))
								  {	
									echo $data['completedPages']['page5']['ccType']; 
								  }
							?>
						 </div>
					  </div>
					  <div class="row">
						 <div class="col-md-offset-1 col-md-5">
							<b>Credit Card Acknowledgement Name:</b>
						 </div>
						 <div class="col-md-4">
							<?php if (isset($data['completedPages']['page5']['ccAcknowdledgeName']))
								  {	
									echo $data['completedPages']['page5']['ccAcknowdledgeName']; 
								  }
							?>
						 </div>
					  </div>
					
				<?php } ?>
			  <?php } ?>
			  <!-- -----------------PAGE 5 END-------------------- -->
			  
			  <br /><br />
			
			  <!-- -----------------PAGE 6 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Authorisation and Acknowledgements - Page 6</h4>
			   </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-9">
					<table class="table table-condensed table-bordered">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Name</th>
						  <th>DOB</th>
						  <th>Licence</th>
						  <th>Signature</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if (isset($data['completedPages']['page6']['partnerAuthorisations'])) {	?>
							<?php for ($i = 0; $i < (int)$data['completedPages']['page3']['numberOfPartners']; $i++) { ?>
							<tr>
							  <td><?php echo $i+1; ?></td>
							  <td><?php echo $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckName']; ?></td>
							  <td>
								  <?php echo $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckDOBDay'].'/'; ?>
								  <?php echo $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckDOBMonth'].'/'; ?>
								  <?php echo $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckDOBYear']; ?>
							  </td>
							  <td><?php echo $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckLicence']; ?></td>
							  <?php if ($data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckSignature'] == $data['completedPages']['page6']['partnerAuthorisations'][$i]['authoriseAckName']) {	?>
								<td class="success">Yes</td>
							  <?php } else { ?>	
							    <td class="danger">No</td>
							  <?php } ?>
							</tr>
							<?php } ?>
					   <?php } ?>
					  </tbody>
					</table>
				 </div>
			  </div>
			  <!-- -----------------PAGE 6 END--------------------->
			  
			  <br /><br />
			  
			   <!-- -----------------PAGE 7 START-------------------- -->
			  <div class="row form-subheading">
			   <div class="col-md-12">
			   <h4>Acceptance of Terms and Conditions - Page 7</h4>
			   </div>
			  </div>
			  <div class="row">
			     <div class="col-md-offset-1 col-md-9">
					<table class="table table-condensed table-bordered">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Name</th>
						  <th>Signature</th>
						  <th>Date</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if (isset($data['completedPages']['page7']['partnerAcceptances'])) {	?>
							<?php for ($i = 0; $i < (int)$data['completedPages']['page3']['numberOfPartners']; $i++) { ?>
							<tr>
							  <td><?php echo $i+1; ?></td>
							  <td><?php echo $data['completedPages']['page7']['partnerAcceptances'][$i]['acceptanceName']; ?></td>
							  <?php if ($data['completedPages']['page7']['partnerAcceptances'][$i]['acceptanceSignature'] == $data['completedPages']['page7']['partnerAcceptances'][$i]['acceptanceSignature']) {	?>
								<td class="success">Yes</td>
							  <?php } else { ?>	
							    <td class="danger">No</td>
							  <?php } ?>
							  <td>
							  <?php date_default_timezone_set('Australia/Melbourne');
									echo date('m/d/Y', time()); ?>
							  </td>
							</tr>
							<?php } ?>
					   <?php } ?>
					  </tbody>
					</table>
				 </div>
			  </div>
			  <!-- -----------------PAGE 7 END--------------------->
			  
			  
				
				
			  <div class="row">
				<div class="col-md-12">
					<br />
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=8">&laquo; Back</a>
					 <a class="btn btn btn-danger pull-right" href="index.php?apply&page=10&apply=start">Complete and Submit Application &raquo;</a>
					 <br />
					<br />
				  </div>
			  </div>
			
			
		</div>
		
	</div>
	
</div>

<?=$data['footer'];?>
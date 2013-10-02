<?=$data['header'];?>

<!-- Main component for a primary marketing message or call to action -->
<div class="container" id="apply-page">
	<h1 class="spacing-under">Application - Page 6 - Authorisations and Acknowledgements</h1>
	<div class="row">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			Details
		</div>
		<div class="col-md-1 apply-progress">
			Rerferences
		</div>
		<div class="col-md-1 apply-progress">
			Partners
		</div>
		<div class="col-md-1 apply-progress">
			Fuel Cards
		</div>
		<div class="col-md-1 apply-progress">
			Payment Details
		</div>
		<div class="col-md-1 apply-progress">
			<b>Authorization</b>
		</div>
		<div class="col-md-1 apply-progress">
			Terms and Conditions
		</div>
		<div class="col-md-1 apply-progress">
			Review and Finish
		</div>
	</div>
	<div class="row" id="progress-circles">
		<div class="col-md-1 col-md-offset-2 apply-progress">
			<img src="images/progress-green-left.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-green-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-middle.jpeg" />
		</div>
		<div class="col-md-1 apply-progress">
			<img src="images/progress-grey-right.jpeg" />
		</div>
	</div>
	
	<div class="row">
	
		<div class="col-xs-12 col-sm-6 col-md-12">

			<form class="form" method="post" role="form" action="index.php?apply">
			  <input type="hidden" class="form-control" name="page" id="page" value="7">
			  
			  <div class="row form-subheading">
			   <div class="col-md-12">
				<h4>Privacy Act Authorisations and Acknowledgements</h4>
				<p>If Adshell Chemicals Card considers it relevant to assessing my/our application for commercial credit, I/we agree to Adshell Chemicals
				Card obtaining from a credit reporting agency a credit report containing personal credit information about me/us in relation to commercial
				credit provided by Adshell Chemicals Card. I/we agree that Adshell Chemicals Card may give to and seek from any credit providers named in
				this credit application any any credit providers that may be named in a credit report issued by a credit reporting agency information
				about my/our credit arrangements. I/we understand that this information can include any information about my/our credit worthiness, credit
				standing, credit history or credit capacity that credit providers are allowed to receive or give to each other under the Privacy Act.</p>
			   </div>
			  </div>
			  
			  <?php if (!isset($data['errors']['numberOfPartners'])) { ?>
				  <?php 
				  for ($i = 1; $i <= (int)$data['valids']['numberOfPartners']; $i++)
				  {
				  ?>
				  
				  <div class="row form-subheading">
				   <div class="col-md-12">
					<h4>Business Partner <?php echo $i; ?> Authorisation and Acknowledgement</h4>
				   </div>
				  </div>
				  <div class="row">
					  <div class="col-md-3">
						<label for="authoriseAckName<?php echo $i; ?>" class=" control-label">Full Name</label>
					  </div>
					  <div class="col-md-4">
						<?php if (isset($data['valids']['authoriseAckName'.$i])) { ?>
						<input type="text" class="form-control" id="authoriseAckName<?php echo $i; ?>" name="authoriseAckName<?php echo $i; ?>" placeholder="Full Name" value="<?php echo $data['valids']['authoriseAckName'.$i];?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="authoriseAckName<?php echo $i; ?>" name="authoriseAckName<?php echo $i; ?>" placeholder="Full Name">
						<?php } ?>
					  </div>
					  <?php if (isset($data['errors']['authoriseAckName'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['authoriseAckName'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  
				  
				  <div class="row">
				  <div class="col-md-3">
					<label for="authoriseAckDOB<?php echo $i; ?>" class=" control-label">Date of Birth</label>
				  </div>
				  
				  <div class="col-md-2">
					    <select name="authoriseAckDOBDay<?php echo $i; ?>">
							<?php if (isset($data['valids']['authoriseAckDOBDay'.$i])) { 
								$selected_value = $data['valids']['authoriseAckDOBDay'.$i];
							?>
							<option value="select">Select Day...</option>
							<option value="01" <?php if ($selected_value == '01') echo 'selected';?>>01</option>
							<option value="02" <?php if ($selected_value == '02') echo 'selected';?>>02</option>
							<option value="03" <?php if ($selected_value == '03') echo 'selected';?>>03</option>
							<option value="04" <?php if ($selected_value == '04') echo 'selected';?>>04</option>
							<option value="05" <?php if ($selected_value == '05') echo 'selected';?>>05</option>
							<option value="06" <?php if ($selected_value == '06') echo 'selected';?>>06</option>
							<option value="07" <?php if ($selected_value == '07') echo 'selected';?>>07</option>
							<option value="08" <?php if ($selected_value == '08') echo 'selected';?>>08</option>
							<option value="09" <?php if ($selected_value == '09') echo 'selected';?>>09</option>
							<option value="10" <?php if ($selected_value == '10') echo 'selected';?>>10</option>
							<option value="11" <?php if ($selected_value == '11') echo 'selected';?>>11</option>
							<option value="12" <?php if ($selected_value == '12') echo 'selected';?>>12</option>
							<option value="13" <?php if ($selected_value == '13') echo 'selected';?>>13</option>
							<option value="14" <?php if ($selected_value == '14') echo 'selected';?>>14</option>
							<option value="15" <?php if ($selected_value == '15') echo 'selected';?>>15</option>
							<option value="16" <?php if ($selected_value == '16') echo 'selected';?>>16</option>
							<option value="17" <?php if ($selected_value == '17') echo 'selected';?>>17</option>
							<option value="18" <?php if ($selected_value == '18') echo 'selected';?>>18</option>
							<option value="19" <?php if ($selected_value == '19') echo 'selected';?>>19</option>
							<option value="20" <?php if ($selected_value == '20') echo 'selected';?>>20</option>
							<option value="21" <?php if ($selected_value == '21') echo 'selected';?>>21</option>
							<option value="22" <?php if ($selected_value == '22') echo 'selected';?>>22</option>
							<option value="23" <?php if ($selected_value == '23') echo 'selected';?>>23</option>
							<option value="24" <?php if ($selected_value == '24') echo 'selected';?>>24</option>
							<option value="25" <?php if ($selected_value == '25') echo 'selected';?>>25</option>
							<option value="26" <?php if ($selected_value == '26') echo 'selected';?>>26</option>
							<option value="27" <?php if ($selected_value == '27') echo 'selected';?>>27</option>
							<option value="28" <?php if ($selected_value == '28') echo 'selected';?>>28</option>
							<option value="29" <?php if ($selected_value == '29') echo 'selected';?>>29</option>
							<option value="30" <?php if ($selected_value == '30') echo 'selected';?>>30</option>
							<option value="31" <?php if ($selected_value == '31') echo 'selected';?>>31</option>
							<?php } else { ?>
							<option value="select">Select Day...</option>
							<option value="01">01</option>
							<option value="02" >02</option>
							<option value="03" >03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							<?php } ?>
						</select>
				  </div>
				  <div class="col-md-2">
					  <select name="authoriseAckDOBMonth<?php echo $i; ?>">
							<?php if (isset($data['valids']['authoriseAckDOBMonth'.$i])) { 
								$selected_value = $data['valids']['authoriseAckDOBMonth'.$i];
							?>
							<option value="select">Select Month...</option>
							<option value="01" <?php if ($selected_value == '01') echo 'selected';?>>January</option>
							<option value="02" <?php if ($selected_value == '02') echo 'selected';?>>February</option>
							<option value="03" <?php if ($selected_value == '03') echo 'selected';?>>March</option>
							<option value="04" <?php if ($selected_value == '04') echo 'selected';?>>April</option>
							<option value="05" <?php if ($selected_value == '05') echo 'selected';?>>May</option>
							<option value="06" <?php if ($selected_value == '06') echo 'selected';?>>June</option>
							<option value="07" <?php if ($selected_value == '07') echo 'selected';?>>July</option>
							<option value="08" <?php if ($selected_value == '08') echo 'selected';?>>August</option>
							<option value="09" <?php if ($selected_value == '09') echo 'selected';?>>September</option>
							<option value="10" <?php if ($selected_value == '10') echo 'selected';?>>October</option>
							<option value="11" <?php if ($selected_value == '11') echo 'selected';?>>November</option>
							<option value="12" <?php if ($selected_value == '12') echo 'selected';?>>December</option>
							<?php } else { ?>
							<option value="select">Select Month...</option>
							<option value="01">January</option>
							<option value="02">February</option>
							<option value="03">March</option>
							<option value="04">April</option>
							<option value="05">May</option>
							<option value="06">June</option>
							<option value="07">July</option>
							<option value="08">August</option>
							<option value="09">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
							<?php } ?>
						</select>
				  </div>
				  
				  <?php if (isset($data['errors']['authoriseAckDOB'.$i])) { ?>
				  <div class="col-md-4 col-md-offset-1 red-text">	
					<?php echo $data['errors']['authoriseAckDOB'.$i]; ?>
				  </div>	
				  <?php } ?>
			  </div>
			  
				  
				  <div class="row">
					 <div class="col-md-3">
						<label for="authoriseAckDOBYear<?php echo $i; ?>" class=" control-label">Date of Birth Year</label>
					  </div>
					 <div class="col-md-4">
						<?php if (isset($data['valids']['authoriseAckDOBYear'.$i])) { ?>
						<input type="text" class="form-control" id="authoriseAckDOBYear<?php echo $i; ?>" name="authoriseAckDOBYear<?php echo $i; ?>" placeholder="Date of Birth Year" value="<?php echo $data['valids']['authoriseAckDOBYear'.$i]; ?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="authoriseAckDOBYear<?php echo $i; ?>" name="authoriseAckDOBYear<?php echo $i; ?>" placeholder="Date of Birth Year">
						<?php } ?>
					 </div>
					  <?php if (isset($data['errors']['authoriseAckDOBYear'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['authoriseAckDOBYear'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  
				  
				  <div class="row">
					  <div class="col-md-3">
						<label for="authoriseAckLicence<?php echo $i; ?>" class=" control-label">Driver's Licence Number</label>
					  </div>
					  <div class="col-md-4">
						<?php if (isset($data['valids']['authoriseAckLicence'.$i])) { ?>
						<input type="text" class="form-control" id="authoriseAckLicence<?php echo $i; ?>" name="authoriseAckLicence<?php echo $i; ?>" placeholder="Driver's Licence Number" value="<?php echo $data['valids']['authoriseAckLicence'.$i]; ?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="authoriseAckLicence<?php echo $i; ?>" name="authoriseAckLicence<?php echo $i; ?>" placeholder="Driver's Licence Number">
						<?php } ?>
					  </div>
					  <?php if (isset($data['errors']['authoriseAckLicence'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['authoriseAckLicence'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  
				  <div class="row">
					  <div class="col-md-3">
						<label for="authoriseAckSignature<?php echo $i; ?>" class=" control-label">Signature (Full Name)</label>
					  </div>
					  <div class="col-md-4">
						<?php if (isset($data['valids']['authoriseAckSignature'.$i])) { ?>
						<input type="text" class="form-control" id="authoriseAckSignature<?php echo $i; ?>" name="authoriseAckSignature<?php echo $i; ?>" placeholder="Full Name" value="<?php echo $data['valids']['authoriseAckSignature'.$i]; ?>">
						<?php } else { ?>
						<input type="text" class="form-control" id="authoriseAckSignature<?php echo $i; ?>" name="authoriseAckSignature<?php echo $i; ?>" placeholder="Full Name">
						<?php } ?>
					  </div>
					  
					  <?php if (isset($data['errors']['authoriseAckSignature'.$i])) { ?>
					  <div class="col-md-4 col-md-offset-1 red-text">	
						<?php echo $data['errors']['authoriseAckSignature'.$i]; ?>
					  </div>	
					  <?php } ?>
				  </div>
				  <?php } ?>
			  <?php } else { ?>
			  
			  <?php echo $data['errors']['numberOfPartners']; ?>
			  
			  <?php } ?>
			  

			  <div class="row">
				  <div class="col-md-3">
					<br />
					 <a class="btn btn btn-primary" href="index.php?apply&page=6">&laquo; Back</a>
				  </div>
				  <div class="col-md-6">
					 <br />
					 <button class="btn btn btn-primary" type="submit">Next Step &raquo;</button>
				  </div>
			  </div>
			</form>
			
			
		</div>
		
	</div>
	
</div>

<?=$data['footer'];?>
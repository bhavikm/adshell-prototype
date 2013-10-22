<h4 class="red-text spacing-under-small">Change Credit Limit</h4>
<br />
<?php if (isset($data['notification'])) { ?>
<div class="alert alert-dismissable alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <?php echo $data['notification']; ?>
</div>
<?php } ?>

<?php if ($data['pendingChange']) { ?>
<p><b>Your current account limit is $<?php echo $data['detailedCustomer']['creditLimit'];?> per month.</b></p>
<p><b>Your request for an increase in credit limit to $<?php echo $data['pendingChange']['newCreditLimit'];?> per month is being reviewed by Adshell.</b></p>
<?php } else { ?>
<p><b>Your current account limit is $<?php echo $data['detailedCustomer']['creditLimit'];?> per month.</b></p>
<p>Please note you may decrease your credit limit without approval but increases will need to approved by Adshell.</p>
<br />
<div class="row">
  <div class="col-md-3">
	<label for="creditLimit" class="col-lg-2 control-label">Credit Limit</label>
  </div>
  <div class="col-md-4">
	 <input type="text" class="form-control" id="creditLimit" name="creditLimit" value="<?php echo $data['detailedCustomer']['creditLimit'];?>">
	 <input type="hidden" id="oldCreditLimit" value="<?php echo $data['detailedCustomer']['creditLimit'];?>">
  </div>
  <div class="col-md-4 red-text" id="creditError">
	 &nbsp;
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
	 <br />
	 <a class="btn btn btn-primary" href="#" id="changeButton">Change &raquo;</a>
  </div>
</div>
<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
	
	  function IsNumeric(input)
	  {
		return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
	  }
	  
	  function checkLength(input, maxLength)
	  {
		return (input.length > 0) && (input.length <= maxLength);
	  }
	  
	  $('#changeButton').on('click', function(event) {
		var error = false;
		var valToCheck = $('#creditLimit').val();
		var oldCredit = $('#oldCreditLimit').val();
		if (!IsNumeric(valToCheck) || !checkLength(valToCheck, 6))
		{
			errorMessage = 'Credit Limit must be 6 digits or less.';
			error = true;
		}
		if ((valToCheck == oldCredit))
		{
			errorMessage = 'Credit Limit must be different.';
			error = true;
		}
		
		if (error)
		{
			$('#creditError').empty().append(errorMessage);
		} else {
			$('#creditError').empty();
			
			if (parseInt(valToCheck) > parseInt(oldCredit))
			{
				$('#changeButton').attr('href','index.php?customer&action=changecredit&second=approvechange&appid=<?php echo $data['detailedCustomer']['applicationID'];?>&newlimit='+valToCheck);
			} else {
				$('#changeButton').attr('href','index.php?customer&action=changecredit&appid=<?php echo $data['detailedCustomer']['applicationID'];?>&second=change&newlimit='+valToCheck);
			}
			
			$('#changeButton').trigger( "click" );
		}
		
	  });

});
</script>
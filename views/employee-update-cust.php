<div class="col-xs-12 col-sm-6 col-md-12">
	<div class="row spacing-under">
		 <h4 class="red-text"><a class="red-text"  href="index.php?employee&action=managecust">Manage Customer Accounts</a> > Manage <?php echo $data['businessName']; ?> </h4>
	</div>
	<br />
	
	<?php if (isset($data['notification'])) { ?>
	<div class="alert alert-dismissable alert-info">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?php echo $data['notification']; ?>
	</div>
	<?php } ?>
	
	<div class="row">
		<h4>Update Account Status</h4>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-3">
		Current Status
		</div>
		<div class="col-md-3">
			<select name="status" id="customerStatus">
				<?php 
					$selected_value = $data['detailedCustomer']['customerStatus'];
				?>
				<option value="active" <?php if ($selected_value == 'active') echo 'selected';?>>Active</option>
				<option value="disabled" <?php if ($selected_value == 'disabled') echo 'selected';?>>Disabled</option>
				<option value="cancelled" <?php if ($selected_value == 'cancelled') echo 'selected';?>>Cancelled</option>
			</select>
		</div>
		<div class="col-md-3">
			<a class="btn btn-primary" href="index.php?employee&action=managecust&second=updatestatus&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>" id="statusLink">Update Status &raquo;</a>
		</div>
	</div>
	<?php 
		if ($data['detailedCustomer']['customerStatus'] != 'cancelled') {
	?>
	
	<div class="row">
		<h4>Modify Business and Contact Details</h4>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-6">
		Change Customer Details
		</div>
		<div class="col-md-3">
			<a class="btn btn-primary" href="index.php?employee&action=managecust&second=updatedetails&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>" id="statusLink">Update &raquo;</a>
		</div>
	</div>
	
	
	<div class="row">
		<h4>Change Credit Limit</h4>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-3">
		Current limit:
		</div>
		<div class="col-md-3">
			<input type="text" class="col-md-9" id="creditLimit" value="<?php echo $data['detailedCustomer']['creditLimit']; ?>" />
		</div>
		<div class="col-md-3">
			<a class="btn btn-primary" href="index.php?employee&action=managecust&second=updatecredit&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>" id="changeCredit">Update Limit &raquo;</a>
		</div>
	</div>
	<?php } ?>
	
	<div class="row">
		<h4>Add Account Comment</h4>
	</div>
	<div class="row spacing-under">
		<div class="col-md-offset-1 col-md-5">
		<a href="index.php?employee&action=managecust&second=customercomments&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>">View Account Comments ></a>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-offset-1 col-md-3">
		&nbsp;
		</div>
	</div>
	
	
	<form  class="form" method="post" role="form" id="commentForm" action="index.php?employee">
	<input type="hidden" class="form-control" name="action" id="action" value="managecust">
	<input type="hidden" class="form-control" name="second" id="second" value="addcomment">
	<input type="hidden" class="form-control" name="custid" id="custid" value="<?php echo $data['detailedCustomer']['customerID']; ?>">
	<input type="hidden" class="form-control" name="appid" id="appid" value="<?php echo $data['detailedCustomer']['applicationID']; ?>">
	<input type="hidden" class="form-control" name="empID" id="empID" value="<?php echo $data['empID']; ?>">
	<div class="row">
		
		<div class="col-md-offset-1 col-md-3">
		<b>Add Comment:</b>
		</div>
	</div>
	<div class="row">
		
		<div class="col-md-offset-1 col-md-3">
		Employee ID:
		</div>
		<div class="col-md-5">
			<input type="text" class="col-md-9" id="empID" name="empID" value="<?php echo $data['empID']; ?>" disabled>
		</div>
		
	</div>
	<div class="row">
		
		<div class="col-md-offset-1 col-md-3">
		Comment:
		</div>
		<div class="col-md-7">
			<textarea type="text" class="col-md-12" id="comment" name="comment" rows="5" ></textarea>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-7 red-text" id="commentErrors">
			&nbsp;
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-offset-4 col-md-7">
			 <button class="btn btn btn-primary" type="submit" id="commentSubmit">Submit Comment &raquo;</button>
		</div>
		
	</div>
	</form>
</div>	

<script type="text/javascript">
$(document).ready(function(){

	  $('#statusLink').on('click', function(event) {

		var selectedOption = $('#customerStatus').val();	
		var newButtonLink = 'index.php?employee&action=managecust&second=updatestatus&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>&status='+selectedOption;
		$('#statusLink').attr('href', newButtonLink);
		
	  });
	  
	   $('#changeCredit').on('click', function(event) {

		var selectedOption = $('#creditLimit').val();	
		var newButtonLink = 'index.php?employee&action=managecust&second=updatecredit&appid=<?php echo $data['detailedCustomer']['applicationID']; ?>&limit='+selectedOption;
		$('#changeCredit').attr('href', newButtonLink);
		
	  });
	  
	  $('#commentSubmit').on('click', function(event) {
	    event.preventDefault();
		var comment = $('#comment').val();	
		
		if ($.trim(comment).length == 0)
		{
			$('#commentErrors').empty().append('Comment must not be empty!');
		} else {
			$('#commentForm').submit();
		}	
		
	  });

});
</script>
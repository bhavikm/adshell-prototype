<h4 class="red-text spacing-under-small">Spending Summaries</h4>
<br />
<div class="row spacing-under-small">
	<div class="col-md-6">
	<h4>Invoice Period</h4>
	<select>
		<option value="select">23/08 - Current</option>
		<option value="vic">22/07 - 23-08</option>
		<option value="vic">22/06 - 23-07</option>
	</select>
	</div>
</div>
<table class="table table-striped">
	<thead>
          <tr>
            <th>Card #</th>
			<th>Holder Name</th>
            <th>Registration No.</th>
			<th>Total Spend (inc. GST)</th>
			<th>Purchase Breakdown</th>
          </tr>
    </thead>
	<tbody>
		<?php if (isset($data['fuelCards']) && count($data['fuelCards']) > 0 && $data['fuelCards']) { ?>
		<?php foreach ($data['fuelCards'] as $index => $fuelCard) { ?>
		<tr>
			<td><?php echo $fuelCard['fuelCardID']; ?></td>
			<td><?php echo $fuelCard['holderName']; ?></td>
			<td><?php echo $fuelCard['registrationNo']; ?></td>
			<?php if ($fuelCard['fuelCardID'] == 16) { ?>
			<td>$1342.21</td>
			<?php } elseif ($fuelCard['fuelCardID'] == 14) { ?>
			<td>$457.00</td>
			<?php } else { ?>
			<td>$221.35</td>
			<?php } ?>
			<td><a class="btn btn btn-warning viewmoredetail" id="<?php echo $fuelCard['fuelCardID']; ?>" href="#">View</a></td>
		</tr>
		<?php } ?>
		<?php } ?>
		<tr>
			<td colspan="7"></td>
		</tr>
	</tbody>
</table>
<br />

<?php if (isset($data['fuelCards']) && count($data['fuelCards']) > 0 && $data['fuelCards']) { ?>
<?php foreach ($data['fuelCards'] as $index => $fuelCard) { ?>
<div class="row spacing-under-small breakdowns" id="breakdown-<?php echo $fuelCard['fuelCardID']; ?>">
	<div class="col-md-12">
	<h4>Purchase Breakdown For <?php echo $fuelCard['holderName']; ?> </h4>
	
	<table class="table table-striped">
	<thead>
          <tr>
            <th>Product Type</th>
			<th>Quantity</th>
            <th>Date</th>
			<th>Time</th>
			<th>Location</th>
			<th>Total Price</th>
          </tr>
    </thead>

	<tbody>
		<?php if ($fuelCard['fuelCardID'] == 16) { ?>
		<tr>
			<td>Unleaded </td>
			<td>51</td>
			<td>24/08/2013</td>
			<td>5:12pm</td>
			<td>Melbourne</td>
			<td><b>$76.00</b></td>
		</tr>
		
		<tr>
			<td>BioDiesel</td>
			<td>35</td>
			<td>29/08/2013</td>
			<td>6:05pm</td>
			<td>Clayton, Melbourne</td>
			<td><b>$41.30</b></td>
		</tr>
		
		<tr>
			<td>Unleaded Max e10</td>
			<td>36</td>
			<td>29/08/2013</td>
			<td>3:00pm</td>
			<td>Tullamarine, Melbourne</td>
			<td><b>$89.00</b></td>
		</tr>
		
		<tr>
			<td>Car Wash</td>
			<td>1</td>
			<td>02/09/2013</td>
			<td>9:34am</td>
			<td>Melbourne</td>
			<td><b>$34.00</b></td>
		</tr>
		
		<tr>
			<td>Unleaded</td>
			<td>49</td>
			<td>03/09/2013</td>
			<td>5:12pm</td>
			<td>Melbourne</td>
			<td><b>$76.00</b></td>
		</tr>
		
		<tr>
			<td>Premium Unleaded </td>
			<td>16</td>
			<td>06/09/2013</td>
			<td>3:12pm</td>
			<td>Carnegie, Melbourne</td>
			<td><b>$91.00</b></td>
		</tr>
		<?php } elseif ($fuelCard['fuelCardID'] == 14) { ?>
		<tr>
			<td>BioDiesel </td>
			<td>32</td>
			<td>24/08/2013</td>
			<td>2:00am</td>
			<td>Sydney</td>
			<td><b>$61.00</b></td>
		</tr>
		
		<tr>
			<td>BioDiesel</td>
			<td>35</td>
			<td>29/08/2013</td>
			<td>8:09pm</td>
			<td>Newcastle</td>
			<td><b>$58.30</b></td>
		</tr>
		
		
		<tr>
			<td>Unleaded</td>
			<td>12</td>
			<td>30/08/2013</td>
			<td>6:15am</td>
			<td>Paramatta</td>
			<td><b>$27.00</b></td>
		</tr>
		
		<tr>
			<td>Car Wash</td>
			<td>1</td>
			<td>02/09/2013</td>
			<td>9:34am</td>
			<td>Sydnet</td>
			<td><b>$34.00</b></td>
		</tr>
		
		<tr>
			<td>BioDiesel</td>
			<td>41</td>
			<td>05/09/2013</td>
			<td>7:00pm</td>
			<td>Sydney</td>
			<td><b>$60.30</b></td>
		</tr>
		
		<?php }  else { ?>
		<tr>
			<td>Shop </td>
			<td>2</td>
			<td>25/08/2013</td>
			<td>9:05am</td>
			<td>Brisbane</td>
			<td><b>$15.00</b></td>
		</tr>
		
		<tr>
			<td>Gas</td>
			<td>98</td>
			<td>28/08/2013</td>
			<td>7:05pm</td>
			<td>Gold Coast</td>
			<td><b>$89.30</b></td>
		</tr>
		
		
		<tr>
			<td>Unleaded</td>
			<td>51</td>
			<td>30/08/2013</td>
			<td>7:15am</td>
			<td>Sunshine Coast</td>
			<td><b>$119.00</b></td>
		</tr>
		
		<?php } ?>
		<tr>
			<td colspan="7"></td>
		</tr>
	</tbody>
</table>
<br />
	</div>
</div>
<?php } ?>
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
	  
	  $('.breakdowns').hide();
	  
	  $('.viewmoredetail').on('click', function(event) {
	    event.preventDefault();
		var idnumb = $(this).attr('id');
		$('.breakdowns').hide();
		$('#breakdown-'+idnumb).show();
	  });
	  
});
</script>
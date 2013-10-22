<?=$data['header'];?>

<div class="container body-container">
    <h1>Calculator</h1>
	<div id="contact-page">
		<div class="row">
			<div class="col-md-10">
			   Use this calculator to estimate the cost of using our different fuel types.
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8 border-on-right">

				<form class="form" role="form">

				  <div class="row">
					  <div class="col-md-4">
						<label for="inputName" class="control-label">Distance (kms)</label>
					  </div>
					  <div class="col-md-6">
						<input type="text" class="form-control" id="distance" placeholder="Distance in kilometers">
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-4 red-text" id="distanceError">
						 &nbsp;
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-4">
						<label for="inputEmail1" class="control-label">Fuel Type</label>
					  </div>
					  <div class="col-md-6">
						<select id="fuelselect" class="form-control">
						  <option value="134">Unleaded</option>
						  <option value="105">Bio-Diesel</option>
						  <option value="198">High Octane</option>
						  <option value="145">Unleaded Max e10</option>
						  <option  value="78">LPG</option>
						  <option  value="64">Gas</option>
						  <option  value="156">Premium Unleaded </option>
						  <option  value="140">98 Octane</option>
						</select>
					  </div>
				  </div>
				  <div class="row">
					<div class="col-md-4">
						<label for="inputEmail1" class="control-label">Price per unit</label>
					  </div>
					  <div class="col-md-6" id="priceunit">
						 &nbsp;
					  </div>
				  </div>
				  <div class="row">
					<div class="col-md-4">
						<label for="inputEmail1" class="control-label">Total Price</label>
					  </div>
					  <div class="col-md-6" id="totalPrice">
						 &nbsp;
					  </div>
				  </div>
				  <div class="row">
					  <div class="col-md-6 col-md-offset-4">
						 <br />
						 <button type="submit" class="btn btn-primary" id="calcPrice">Calculate</button>
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
	  
	  $('#calcPrice').on('click', function(event) {
			event.preventDefault();
			var fuelprice = $('#fuelselect').find(':selected').attr('value');
			var fuelprice2 = parseFloat(fuelprice)/100;
			var calcval = $('#distance').val();
			console.log();
			if (IsNumeric(calcval) && checkLength(calcval, 6))
			{
				 $('#distanceError').empty();
				 $('#priceunit').empty();
				 $('#totalPrice').empty();
				 $('#priceunit').append(fuelprice2);
				 $('#totalPrice').append('$'+(fuelprice2 * parseFloat(calcval)).toFixed(1));
			} else {
				$('#distanceError').empty();
				 $('#priceunit').empty();
				 $('#totalPrice').empty();
				 
				 $('#distanceError').append('Invalid Distance');
			}
	  });
	  
});
</script>
<?=$data['footer'];?>
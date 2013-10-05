<?=$data['header'];?>

<div class="container">
	<div class="col-xs-6 col-sm-6 col-md-3">
		<div class="row" style="margin-top:139px;">
			<ul class="nav nav-pills nav-stacked account-menu">
				<li><a href="index.php?employee&action=viewrequests">View Customer Requests</a></li>
				<li><a href="index.php?employee&action=managecust">Manage Customer Account</a></li>
				<li><a href="index.php?employee&action=managefuel">Manage Customer Fuel Cards</a></li>
				<li><a href="index.php?employee&action=manageapps">Manage Applications</a></li>
				<li><a href="index.php?employee&action=modifyaccount">Modify Account Details</a></li>
				<li><a href="index.php?employee&action=searchemployee">Search Employee Directory</a></li>
				<li><a href="index.php?employee&action=changepass">Change Account Password</a></li>
			</ul>
		</div>	
	</div>
	
	<div class="col-md-offset-1 col-md-7">
		<div class="row page-header">
			<h1>Employee Account - <?php echo $_SESSION['emp_name']; ?></h1>
		</div>
		<div class="row">
			<?=$data['content'];?>
		</div>
	</div>
	
</div>

<?=$data['footer'];?>
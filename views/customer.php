<?=$data['header'];?>

<div class="container">
	<div class="col-xs-6 col-sm-6 col-md-3">
		<div class="row" style="margin-top:139px;">
			<ul class="nav nav-pills nav-stacked account-menu">
				<li><a href="index.php?customer&action=notifications">Notifications (0)</a></li>
				<li><a href="index.php?customer&action=modifyaccount">Modify Account Details</a></li>
				<li><a href="index.php?customer&action=managecards">Manage Fuel Cards</a></li>
				<li><a href="index.php?customer&action=changecredit">Chnge Credit Limit</a></li>
				<li><a href="index.php?customer&action=viewinvoice">View Invoices</a></li>
				<li><a href="index.php?customer&action=changepay">Change Payment Method</a></li>
				<li><a href="index.php?customer&action=spendingsum">Generate Spending Summaries</a></li>
				<li><a href="index.php?customer&action=changepass">Change Account Password</a></li>
			</ul>
		</div>	
	</div>
	
	<div class="col-md-offset-1 col-md-7">
		<div class="row page-header">
			<h1>Customer</h1>
		</div>
		<div class="row">
			<?=$data['content'];?>
		</div>
	</div>
	
	
	
</div>

<?=$data['footer'];?>
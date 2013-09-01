<?=$data['header'];?>

<div class="container">
	<div class="page-header">
		<h1>Customer</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8">
			<?=$data['content'];?>
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-4">
			<div class="col-md-11 col-md-offset-1">
				<ul id="right-menu" class="nav nav-pills nav-stacked">
					<b>Customer Actions</b>
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
	</div>
</div>

<?=$data['footer'];?>
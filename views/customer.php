<?=$data['header'];?>

<div class="container body-container">
	<div class="col-xs-6 col-sm-6 col-md-3">
		<div class="row" style="margin-top:139px;">
			<ul class="nav nav-pills nav-stacked account-menu">
				<li><a href="index.php?customer&action=notifications" <?php if ($data['activeLink'] == "notifications") { ?>class="active-sidebar-link" <?php } ?>>Notifications (0)</a></li>
				<li><a href="index.php?customer&action=modifyaccount" <?php if ($data['activeLink'] == "modifyaccount") { ?>class="active-sidebar-link" <?php } ?>>Modify Account Details</a></li>
				<li><a href="index.php?customer&action=managecards" <?php if ($data['activeLink'] == "managecards") { ?>class="active-sidebar-link" <?php } ?>>Manage Fuel Cards</a></li>
				<li><a href="index.php?customer&action=changecredit" <?php if ($data['activeLink'] == "changecredit") { ?>class="active-sidebar-link" <?php } ?>>Change Credit Limit</a></li>
				<li><a href="index.php?customer&action=viewinvoice" <?php if ($data['activeLink'] == "viewinvoice") { ?>class="active-sidebar-link" <?php } ?>>View Invoices</a></li>
				<li><a href="index.php?customer&action=changepay" <?php if ($data['activeLink'] == "changepay") { ?>class="active-sidebar-link" <?php } ?>>Change Payment Method</a></li>
				<li><a href="index.php?customer&action=spendingsum" <?php if ($data['activeLink'] == "spendingsum") { ?>class="active-sidebar-link" <?php } ?>>Generate Spending Summaries</a></li>
				<li><a href="index.php?customer&action=changepass" <?php if ($data['activeLink'] == "changepass") { ?>class="active-sidebar-link" <?php } ?>>Change Account Password</a></li>
			</ul>
		</div>	
	</div>
	
	<div class="col-md-offset-1 col-md-7">
		<div class="row page-header">
			<h1><?php echo $_SESSION['cust_name']; ?></h1>
		</div>
		<div class="row">
			<?=$data['content'];?>
		</div>
	</div>
	
	
	
</div>

<?=$data['footer'];?>
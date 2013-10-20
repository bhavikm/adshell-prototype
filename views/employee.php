<?=$data['header'];?>

<div class="container body-container">
	<div class="col-xs-6 col-sm-6 col-md-3">
		<div class="row" style="margin-top:139px;">
			<ul class="nav nav-pills nav-stacked account-menu">
				<li><a href="index.php?employee&action=viewrequests" <?php if ($data['activeLink'] == "viewrequests") { ?>class="active-sidebar-link" <?php } ?>>View Customer Requests</a></li>
				<li><a href="index.php?employee&action=managecust" <?php if ($data['activeLink'] == "managecust") { ?>class="active-sidebar-link" <?php } ?>>Manage Customer Account</a></li>
				<li><a href="index.php?employee&action=managefuel" <?php if ($data['activeLink'] == "managefuel") { ?>class="active-sidebar-link" <?php } ?>>Manage Customer Fuel Cards</a></li>
				<li><a href="index.php?employee&action=manageapps" <?php if ($data['activeLink'] == "manageapps") { ?>class="active-sidebar-link" <?php } ?>>Manage Applications</a></li>
				<li><a href="index.php?employee&action=modifyaccount" <?php if ($data['activeLink'] == "modifyaccount") { ?>class="active-sidebar-link" <?php } ?>>Modify Account Details</a></li>
				<li><a href="index.php?employee&action=searchemployee" <?php if ($data['activeLink'] == "searchemployee") { ?>class="active-sidebar-link" <?php } ?>>Search Employee Directory</a></li>
				<li><a href="index.php?employee&action=changepass" <?php if ($data['activeLink'] == "changepass") { ?>class="active-sidebar-link" <?php } ?>>Change Account Password</a></li>
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
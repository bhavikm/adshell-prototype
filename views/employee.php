<?=$data['header'];?>

<div class="container">
	<div class="page-header">
		<h1>Employee</h1>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8">
			<?=$data['content'];?>
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-4">
			<div class="col-md-11 col-md-offset-1">
				<ul id="right-menu" class="nav nav-pills nav-stacked">
					<b>Employee Actions</b>
					<li><a href="index.php?employee&action=notifications">Notifications (0)</a></li>
					<li><a href="index.php?employee&action=modifyaccount">Modify Account Details</a></li>
					<li><a href="index.php?employee&action=managecust">Manage Customer Account</a></li>
					<li><a href="index.php?employee&action=viewrequests">View Customer Requests</a></li>
					<li><a href="index.php?employee&action=viewapplications">View Applications</a></li>
					<li><a href="index.php?employee&action=changepass">Change Account Password</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?=$data['footer'];?>
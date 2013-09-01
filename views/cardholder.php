<?=$data['header'];?>

<div class="container">
	<div class="page-header">
		<h1>Card Holder</h1>
	</div>
    
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8">
			<?=$data['content'];?>
		</div>
		
		<div class="col-xs-6 col-sm-6 col-md-4">
			<div class="col-md-11 col-md-offset-1">
				<ul id="right-menu" class="nav nav-pills nav-stacked">
					<b>Card Holder Actions</b>
					<li><a href="index.php?cardholder&action=notifications">Notifications (0)</a></li>
					<li><a href="index.php?cardholder&action=modifypin">Modify PIN</a></li>
					<li><a href="index.php?cardholder&action=spendingsum">Generate Spending Summaries</a></li>
					<li><a href="index.php?cardholder&action=changepass">Change Account Password</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?=$data['footer'];?>
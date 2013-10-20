<?=$data['header'];?>

<div class="container body-container">
    <h1>Search Results</h1>
    <p>Here are the results for your search <b><?=$data['query'];?></b>:</p>
	<br />
	
	<?php if ($data['results']) { ?>
	<?php foreach ($data['results'] as $result) { ?>
	<div class="row spacing-under-small">
		<div class="col-md-7">
		<a href="index.php?<?php echo $result['pageControllerKey']; ?>" style="color: blue;"><?php echo $result['pageName']; ?></a><br />
		<?php 
			$words = explode(" ",$result['content']);
			$limitedString = implode(" ", array_splice($words, 0, 20));
			echo $limitedString." ..."; 
		?>
		<br />
		<a style="color: green;">www.adshell.com.au/index.php?<?php echo $result['pageControllerKey']; ?></a>
		</div>
	</div>
	<?php } ?>
	<?php } else { ?>
	<div class="row spacing-under-small">
		<div class="col-md-7">
		<b>Your search produced no results</b>
		</div>
	</div>
	<?php } ?>
</div>

<?=$data['footer'];?>
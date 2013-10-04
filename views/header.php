<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>Adshell Chemicals Fuel Card Program</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	
	<link href="css/navbar.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
	<script src="js/jquery.js"></script>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
     
	<div class="container">

	<!-- Static navbar -->
	  <div class="row login">
		<div class="pull-right">
		 <?php if (isset($data['logged_in'])) { ?>
		 Welcome,  <?php echo $data['user_name']; ?> (<a href="index.php?login">Log Out</a>)
		 <?php } else {?>
			<a href="index.php?login">Login</a>
		<?php } ?>
		</div>
		<div class="pull-left search">
			<div class="button-search"></div>
			<form class="form-signin" action="index.php">
				<input type="hidden" name="search" value="" />
				<input type="text" name="query" id="query" value="Search" onclick="this.value = '';" onkeydown="this.style.color = '#000000';" />
			</form>
		</div>
	  </div>
      <div class="navbar navbar-default">
		
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="images/adshell-logo-grey.gif" /></a>
        </div>
		
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom-navbar">
            <li <?php if ($data['active_nav'] == 'home') { ?> class="active" <?php } ?>><a href="index.php">Home</a></li>
            <li <?php if ($data['active_nav'] == 'apply') { ?> class="active" <?php } ?>><a href="index.php?apply">Apply</a></li>
			<li <?php if ($data['active_nav'] == 'about') { ?> class="active" <?php } ?>><a href="index.php?about">About Us</a></li>
            <li <?php if ($data['active_nav'] == 'faq') { ?> class="active" <?php } ?>><a href="index.php?faq">FAQs</a></li>
			<li <?php if ($data['active_nav'] == 'franchise') { ?> class="active" <?php } ?>><a href="index.php?franchise">Franchises</a></li>
			<li <?php if ($data['active_nav'] == 'calculator') { ?> class="active" <?php } ?>><a href="index.php?calculator">Calculator</a></li>
			<li <?php if ($data['active_nav'] == 'contact') { ?> class="active" <?php } ?>><a href="index.php?contact">Contact</a></li>
			<!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
			-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
	  
	  </div>
	  
<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>CAREER GURU | Contact :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Tutorage a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- menu -->
<link rel="stylesheet"  href="<?php echo base_url() ?>assets/css/toastr.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/css/cm-overlay.css" />
<!-- //menu -->
<link href="<?php echo base_url() ?>assets/css/jquery.fatNav.css" rel="stylesheet" type="text/css">
<!-- custom css theme files -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css" media="all">
<!-- //custom css theme files -->
<!-- google fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<!-- //google fonts -->
</head>
<!-- Body -->
<body>
<!-- banner -->
<header>
	<nav class="w3-navbar py-2">
						<div class="nav-top">
							  <!-- Logo -->
								<div class="logo">
								  <a href="index.html">
									CAREER GURU
								  </a>
							  </div>
							  <!-- Logo -->
							<div class="right">
								<div class="w3-socials">
										<li>
										<a href="<?php echo base_url('AdminModule') ?>" style="color:#000;"><i class="fas fa-user"></i></a>
										</li>
								</div>
								
							</div>
							<div class="clearfix"></div>
						</div>
						
					 <!-- end container -->
				
	</nav>
	</header>
<div class="w3l-banner-1">
<div class="wthree-dot">
	<!-- nav -->
	<div class="w3layouts-nav-right">
		<div class="fat-nav">
			<div class="fat-nav__wrapper">
				<ul>
					<li><a href="<?php echo base_url('PublicModule/index') ?>">Home</a></li>
					<li><a href="<?php echo base_url('PublicModule/about') ?>">About</a></li>
					<li><a href="<?php echo base_url('PublicModule/services') ?>">Services</a></li>
					<li><a href="<?php echo base_url('PublicModule/contact') ?>">Contact</a></li>
					<li><a href="<?php echo base_url('PublicModule/login') ?>">Sign In</a></li>
					<li><a href="<?php echo base_url('PublicModule/register') ?>">Create Account</a></li>
				</ul>
			</div>
		</div>
	</div>		
	<!-- //nav -->
	<!-- //Header -->
	</div>
</div>
<!-- //banner -->
<!-- contact -->
	<section class="contact-innpage py-5">
		<div class="container py-md-4 mt-md-3">
			<h3 class="w3ls-title text-uppercase text-center">Admin Login</h3>
			<form method="post" action="<?php echo base_url('AdminModule/loginform'); ?>">
			<div class="row mail_grid_w3l mt-md-5 pt-3">
				<div class="col-md-2"></div>
					<div class="col-md-8 contact_left_grid">
						<div class="contact-fields-w3ls">
							<input type="email" name="email" id="email" placeholder="Email" required="">
						</div>
						<div class="contact-fields-w3ls">
							<input type="password" name="pwd" id="pwd" placeholder="Password" required="" maxlength="10" minlength="6" style="outline: none;
	padding: 14px;
	font-size: 14px;
	color: #212121;
	background: none;
	width: 100%;
	border: 1px solid #b5b5b5;
	letter-spacing: 1px;
	font-weight: 500;
	font-family: 'Open Sans', sans-serif;">
						</div>
						<div class="contact-fields-w3ls">
							<input type="submit" value="SIGN IN"><br><br>
						</div>
					</div>
				<div class="col-md-2"></div>
			</div>
			</form>
		</div>
	</section>
	<!-- //contact -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->
<!--menu script-->
<script src="<?php echo base_url() ?>assets/js/toastr.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/modernizr-2.6.2.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/careerscript.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.fatNav.js"></script>
		<script>
		(function() {
			
			$.fatNav();
			
		}());
		</script>

</body>
<!-- //Body -->
</html>
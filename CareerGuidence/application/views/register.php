
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
			<h3 class="w3ls-title text-uppercase text-center">Create Account</h3>
			<form role="form" id="registerform" method="post">
			<div class="row mail_grid_w3l register mt-md-5 pt-3">
				<div class="col-md-2"></div>
					<div class="col-md-8 contact_left_grid">
						<div class="contact-fields-w3ls">
							<input type="text" name="name" id="name" placeholder="Name" required="" pattern="^[A-Za-z ]{1,15}$" title="Name Only contains lowercase and uppercase alphabets">
						</div>
						<div class="contact-fields-w3ls">
							<input type="email" name="email" id="email" placeholder="Email" required="" >
						</div>
						<div class="contact-fields-w3ls">
							<input type="password" name="pwd" id="pwd" placeholder="Password" required="" maxlength="6" minlength="6" style="outline: none;
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
							<input type="password" name="cpwd" id="cpwd" placeholder="Confirm Password" required="" maxlength="6" minlength="6" style="outline: none;
	padding: 14px;
	font-size: 14px;
	color: #212121;
	background: none;
	width: 100%;
	border: 1px solid #b5b5b5;
	letter-spacing: 1px;
	font-weight: 500;
	font-family: 'Open Sans', sans-serif;">
						</div><br>
						<div class="contact-fields-w3ls">
							<input type="date" name="dob" id="dob" placeholder="Date of Birth" required="" style="outline: none;
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
							<select name="gender" id="gender" style="outline: none;
	padding: 14px;
	font-size: 14px;
	color: #212121;
	background: none;
	width: 100%;
	border: 1px solid #b5b5b5;
	letter-spacing: 1px;
	font-weight: 500;
	font-family: 'Open Sans', sans-serif;">
								<option selected="selected">Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Female">Other</option>
							</select>
						</div>
						<div class="contact-fields-w3ls">
							<input type="text" pattern="[0-9]{10}"  maxlength="10" minlength="10" name="phone" id="phone" placeholder="Phone" required="">
						</div>
						<div class="contact-fields-w3ls">
							<textarea required="" name="address" id="address">Address</textarea>
						</div>
						<div class="contact-fields-w3ls">
							<input type="file" name="image" id="image" required="" style="outline: none;
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
							<input type="submit" value="SIGN UP">
						</div>
					</div>
				<div class="col-md-2"></div>
			</div>
			</form>
		</div>
	</section>
	<!-- //contact -->

	<!--footer -->
<footer>
<section class="footer footer_w3layouts_section_1its py-md-5">
	<div class="container py-5">
		<div class="row footer-top">
			<div class="col-lg-3 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>About Us</h3>
				</div>
				<div class="footer-text">
					<p>Curabitur non nulla sit amet nislinit tempus convallis quis ac lectus. lac inia eget consectetur sed, convallis at tellus.
						Nulla porttitor accumsana tincidunt. Vestibulum ante ipsum primis tempus convallis.</p>
					<ul class="social_section_1info">
						<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i class="fab fa-google-plus-g"></i></i></a></li>
						<li><a href="#"><i class="fab fa-linkedin-in"></i></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>Contact Info</h3>
				</div>
				<div class="contact-info">
					<h4>Location :</h4>
					<p>0926k 4th block building, king Avenue, New York City.</p>
					<div class="phone">
						<h4>Phone :</h4>
						<p>Phone : +121 098 8907 9987</p>
						<p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-2 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>Useful Links</h3>
				</div>
				<ul class="links">
					<li><a href="<?php echo base_url('PublicModule/index') ?>">Home</a></li>
					<li><a href="<?php echo base_url('PublicModule/about') ?>">About</a></li>
					<li><a href="<?php echo base_url('PublicModule/services') ?>">Services</a></li>
					<li><a href="<?php echo base_url('PublicModule/contact') ?>">Contact Us</a></li>
				</ul>
			</div>
			<div class="col-lg-4 footer-grid_section_1its_w3">
				<div class="footer-title">
					<h3>Latest News</h3>
				</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g1.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g2.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g3.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
					<div class="d-flex justify-content-around">
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g4.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g5.jpg" class="img-fluid" alt="Responsive image">
						</a>
						<a href="#" class="col-4 fot_tp p-2">
							<img src="<?php echo base_url() ?>assets/images/g6.jpg" class="img-fluid" alt="Responsive image">
						</a>
					</div>
			</div>
		</div>
		<div class="copyright">
			<p>© 2018 Tutorage. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
		</div>
	</div>
</section>
</footer>
<!-- //footer -->
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
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>SkyRope | Contact :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Straggle a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- menu -->
<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />
<!-- //menu -->
<link href="css/jquery.fatNav.css" rel="stylesheet" type="text/css">
<!-- custom css theme files -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
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
									SkyRope
								  </a>
							  </div>
							  <!-- Logo -->
							<div class="right">
								<a href="a_signin.php" style="color:black"><div class="w3-socials">
										<li><i class="fas fa-user"></i></li>
								</div></a>
								
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
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="destinations.php">Destinations</a></li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="u_signin.php">Sign In</a></li>
					<li><a href="u_signup.php">Sign Up</a></li>
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
			<h3 class="w3ls-title text-uppercase text-center">Login Here</h3>
			<form action="" method="post">
			<div class="row mail_grid_w3l mt-md-5 pt-3">
				
					<div class="col-md-12 contact_left_grid">
						<div class="contact-fields-w3ls">
							<input type="email" name="aemail" placeholder="Email" required="">
						</div>
						<div class="contact-fields-w3ls">
							<input type="password" name="apwd" placeholder="Password" required="" min="6" max="13">
						</div>
						<div class="contact-fields-w3ls">
							<input type="submit" value="Submit" name="asignin">
						</div>
					</div>
				<?php
include("connection.php");

if (isset($_POST['asignin']))
{
	$email =$_POST['aemail'];
	$pwd =$_POST['apwd'];


	

	$sqls = "select * from admin_details where a_email='$email' and a_pwd='$pwd'";

	$results = mysqli_query($con,$sqls);

	$number=mysqli_num_rows($results);

	if($number != null)
	{ 
		session_start();
		$_SESSION['a_email']=$email;
		echo"<script>alert('Login Successfull')</script>";
		echo "<script>window.location.href='a_index.php'</script>";
	}
	else
	{
		echo"<script>alert('Login Failed')</script>";
	}
}

?>
			</div>
			</form>
		</div>
	</section>
	<!-- //contact -->

	<!--footer -->
<footer>
<section class="footer footer_w3layouts_section_1its py-md-5">
	<div class="container py-5">
		<div class="copyright">
			<p>© 2018 Straggle. All Rights Reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> </p>
		</div>
	</div>
</section>
</footer>
<!-- //footer -->
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- //Default-JavaScript-File -->
<!--menu script-->
<script type="text/javascript" src="js/modernizr-2.6.2.min.js"></script>
		<script src="js/jquery.fatNav.js"></script>
		<script>
		(function() {
			
			$.fatNav();
			
		}());
		</script>

</body>
<!-- //Body -->
</html>

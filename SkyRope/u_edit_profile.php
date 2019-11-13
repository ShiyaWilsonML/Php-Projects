<?php
$row = 0;
session_start();
if(!isset($_SESSION['u_email']))
{
	echo "<script>window.location.href='404.php'</script>";
}
else
{
	include("connection.php");
	$email = $_SESSION['u_email'];
	$sql = "select * from user_details where u_email='$email'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_row($result);
} 
?>
<?php include('u_header.php'); ?>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section col-md-12 ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				
				
				
				
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								
								<div class="profile_img">	
									<span class="prfil-img"><!-- <img src="" width="50px" height="50px" alt=""> --> </span> 
									<div class="user-name">
										<p><?php echo $row[1]; ?></p>
										<span>User</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
								<br>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="u_logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>

		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1"></h2>
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>View & Edit Profile :</h4>
							</div>
							<div class="form-body">
								<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Name</label> 
										<div class="col-sm-9"> <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $row[1]; ?>" > 
										</div> 
									</div> 
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Email</label> 
										<div class="col-sm-9"> 
											<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row[2]; ?>" readonly>  
										</div> 
									</div>
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Phone</label> 
										<div class="col-sm-9"> 
											<input type="text" pattern="[0-9]{10}" class="form-control" id="phno"  name="phno" placeholder="Phone" value="<?php echo $row[4]; ?>"> 
										</div> 
									</div> 
									<div class="form-group"> 
										<label  class="col-sm-2 control-label">Address</label> 
										<div class="col-sm-9"> 
											<textarea style="width: 100%; padding-left:15px;" id="addr" name="addr" ><?php echo $row[5]; ?></textarea>
										</div> 
									</div>  
									<div class="form-group"> 
										<label class="col-sm-2 control-label">City</label> 
										<div class="col-sm-9"> 
											<input type="text" class="form-control" id="city"  name="city" placeholder="City" value="<?php echo $row[6]; ?>"> 
										</div> 
									</div>
									<div class="col-sm-offset-2"> 
										<input type="submit" class="btn btn-success" value="Update" name="update">
									</div> 
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	   </div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='loginindex/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
	<script src="assets/js/careerscript.js"></script>
		<script src="loginindex/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
	
	<!--scrolling js-->
	<script src="loginindex/js/jquery.nicescroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
	<script src="loginindex/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="loginindex/js/bootstrap.js"> </script>
   
</body>
</html>

<?php

if (isset($_POST['update']))
{
	$name =$_POST['name'];
	$phno =$_POST['phno'];
	$addr =$_POST['addr'];	
	$city =$_POST['city'];	

	$sql = "update user_details set u_name='$name',u_phno='$phno',u_addr='$addr',u_city='$city' where u_email='$email'";

	$result = mysqli_query($con,$sql);

	if($result)
	{ 
		echo "<script>window.location.href='u_edit_profile.php'</script>";
	}
}

?>
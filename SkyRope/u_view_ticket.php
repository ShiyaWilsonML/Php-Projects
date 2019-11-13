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
				<div class="tables">
					<h2 class="title1"></h2>
					<div class="table-responsive bs-example widget-shadow">
						<?php 
									$fbid=$_SESSION['fbid'];
									$uid = $row[0];
									$book = 0;
									$flight = 0;
									$sql2 = "select * from book_details where fb_id='$fbid'";
									$result1 = mysqli_query($con,$sql2);
									$i= 0;
									$book = mysqli_fetch_row($result1); 
										# code...
									$flid = $book[2];
									$sql3 = "select * from flight_details where fl_id='$flid'";
									$results = mysqli_query($con,$sql3);
									$i++;
									$flight = mysqli_fetch_row($results);

								?>
						<h3><a href="u_view_payment.php">View Payments</a></h3><br>
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th colspan="4" align="center"><?php echo $flight[2]; ?></th>
								</tr> 
								<tr> 
									<th>#</th> 
								  	<th>Name</th>
								  	<th>Age</th>
								  	<th>Adhar</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php 
									$sqls4 = "select * from traveler_details where fb_id='$fbid'";
									$res4 = mysqli_query($con,$sqls4);
									while($travel = mysqli_fetch_row($res4))
									{
										?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th>
									<td><?php echo $travel[4]; ?></td>
								  	<td><?php echo $travel[5]; ?></td>
								  	<td><?php echo $travel[6]; ?></td>
								</tr> 
								<?php 
									}
								?>
								<tr>
									<th colspan="3">Final Amount</th>
									<th>Rs : <?php echo $book[5] ?></th>
								</tr>
							</tbody> 
						</table> 
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
	<script src="loginindex/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="loginindex/js/bootstrap.js"> </script>
   
</body>
</html>
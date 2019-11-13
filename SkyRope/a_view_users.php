<?php
include("connection.php");
$row = 0;
session_start();
if(!isset($_SESSION['a_email']))
{
	echo "<script>window.location.href='404.php'</script>";
}
else
{
	$email = $_SESSION['a_email'];
	$sql = "select * from admin_details where a_email='$email'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_row($result);
} 
?>
<?php include('a_header.php'); ?>
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
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
								<br>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="a_logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
						<h4>View Users</h4>
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>#</th> 
								  	<th>Name</th>
								  	<th>Email</th>
								  	<th>Phone</th>
								  	<th>Address</th>
								  	<th>City</th>
								  	<th>Status</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php 
									$users = 0;
									$sql2 = "select * from user_details";
									$result = mysqli_query($con,$sql2);
									$i= 0;
									while ($users = mysqli_fetch_row($result)) {
										# code...
										
										$i++;
									
								?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th> 
								  	<td><?php echo $users[1]; ?></td>
								  	<td><?php echo $users[2]; ?></td>
									<td><?php echo $users[4]; ?></td>
									<td><?php echo $users[5]; ?></td>
									<td><?php echo $users[6]; ?></td>
									<td><?php 
										if($users[7]=="active")
										{ ?>
											<a class="btn btn-danger" href="a_user_inactive.php?id=<?php echo $users[0];?>">Inactive</a>

										<?php
										} 
										else
										{ ?>
											<a class="btn btn-success" href="a_user_active.php?id=<?php echo $users[0];?>">Active</a>
										<?php
										}
									?></td>
								</tr> 
								<?php 
									}
								?>
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
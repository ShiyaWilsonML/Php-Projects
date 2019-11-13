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
						<h4>View Flight Categories <input style="float:right;" id="myInput" type="text" placeholder="Search.."></h4>
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>#</th> 
								  	<th>Image</th>
								  	<th>Flight</th>
								  	<th>Name</th>
								  	<th>Date</th>
								  	<th>Depature</th>
								  	<th>Arrival</th>
								  	<th>Duration</th>
								  	<th>Adults</th>
								  	<th>Children</th>
								  	<th>Book Now</th>
								</tr> 
							</thead> 
							<tbody id="myTable"> 
								<?php 
									$fdet = 0;
									$fcat = 0;
									$sql2 = "select * from flight_details";
									$result = mysqli_query($con,$sql2);
									$i= 0;
									while ($fdet = mysqli_fetch_row($result)) {
										# code...
										$fcatid = $fdet[1];
										$sql3="select * from flight_categories where fc_id='$fcatid'";
										$results=mysqli_query($con,$sql3);
										$i++;
										while($fcat = mysqli_fetch_row($results))
										{
										
									
								?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th> 
								  	<td><img src="uploads/<?php echo $fcat[2]; ?>" width="100px" height="75px"></td>
								  	<td><?php echo $fcat[1]; ?></td>
								  	<td><?php echo $fdet[2]; ?></td>
								  	<td><?php echo $fdet[5]; ?></td>
								  	<td><?php echo $fdet[3]; ?> <?php echo $fdet[6]; ?></td>
								  	<td><?php echo $fdet[4]; ?> <?php echo $fdet[7]; ?></td>
								  	<td><?php echo $fdet[8]; ?></td>
								  	<td><?php echo $fdet[9]; ?></td>
								  	<td><?php echo $fdet[10]; ?></td>
								  	<td><a href="u_book_flight.php?id=<?php echo $fdet[0];?>" class="fa fa-check"></a></td>
								</tr> 
								<?php 
									} }
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
	<script src="js/jquery-2.2.3.min.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="loginindex/js/bootstrap.js"> </script>
   <script type="text/javascript">
   	$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
   </script>

   
</body>
</html>

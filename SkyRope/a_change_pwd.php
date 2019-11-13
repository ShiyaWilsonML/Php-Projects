<?php
$row = 0;
session_start();
if(!isset($_SESSION['a_email']))
{
	echo "<script>window.location.href='404.php'</script>";
}
else
{
	include("connection.php");
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
										<span>Adminstrator</span>
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
								<h4>Change Password :</h4>
							</div>
							<div class="form-body">
								<form class="form-horizontal" action=""  method="post"> 
									
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Old Password</label> 
										<div class="col-sm-9"> <input type="password" class="form-control" id="opwd" name="opwd"  maxlength="6" minlength="6" readonly value="<?php echo $row[3]; ?>"> 
										</div> 
									</div> 
									<div class="form-group"> 
										<label class="col-sm-2 control-label">New Password</label> 
										<div class="col-sm-9"> <input type="password" class="form-control" id="npwd" name="npwd" maxlength="6" minlength="6" > 
										</div> 
									</div> 
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Confirm Password</label> 
										<div class="col-sm-9"> 
											<input type="password" class="form-control" id="cpwd" name="cpwd" maxlength="6" minlength="6">  
										</div> 
									</div>
									<div class="col-sm-offset-2"> 
										<input type="submit" class="btn btn-success" value="Change Password" name="chpwd">
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
		   <p>&copy; 2019 AyurHerba. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
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

<?php

if (isset($_POST['chpwd']))
{
	$npwd =$_POST['npwd'];
	$cpwd =$_POST['cpwd'];
	if($npwd == $cpwd)
	{
		$sql = "update admin_details set a_pwd='$npwd' where a_email='$email'";
		$results = mysqli_query($con,$sql);

		if($results)
		{ 
			echo "<script>alert('Password Changed');</script>";
		}
	}
	else
	{
		echo "<script>alert('New password and Confirm password does not match');</script>";
	}
}

?>
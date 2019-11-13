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
		<?php 
			
			 $fbid = $_SESSION['fbid'];
			 $sqls = "select * from book_details where fb_id='$fbid'";
			 $res = mysqli_query($con,$sqls);
			 $book = mysqli_fetch_row($res);
			 $adultno = $book[3];
			 $childno = $book[4];
			 try
			 {

			 $sqls1 = "select * from traveler_details where fb_id='$fbid' and t_type='adult'";
			 $res1 = mysqli_query($con,$sqls1);
			 $adult = mysqli_num_rows($res1);
			 if($adult != 0)
			 {
			 	$adultno = $adultno-$adult;
			 }

			 $sqls2 = "select * from traveler_details where fb_id='$fbid' and t_type='child'";
			 $res2 = mysqli_query($con,$sqls2);
			 $child = mysqli_num_rows($res2);
			 if($child != 0)
			 {
			 	$childno = $childno - $child;
			 }

			}
			catch(Exception $e)
			{
				echo " ";
			}

		?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1"></h2>
					<div class="table-responsive bs-example widget-shadow">
					<?php if($adultno != 0 || $childno != 0){ ?>
					<?php if($adultno != 0){ ?>
						<h4>Add Adults </h4>
						<table class="table table" border="0" > 
							<tr>
								<td>Name</td>
								<td>Age</td>
								<td>Aadhar</td>
								<td>Add</td>
							</tr>
							<?php for($i=1;$i<=$adultno;$i++){ ?>
							<tr>
								<form action="" method="post">
								<td><input type="text" id="name" name="name" class="form-control">
								</td>
								<td><input type="text" id="age" name="age" class="form-control">
								</td>
								<td><input type="text" id="adhar" name="adhar" class="form-control">
								</td>
								<td><input type="submit" name="addadult" class="btn btn-success">
								</td>
								</form>
							</tr>
					<?php } ?>
						</table> 
					<?php } ?>
					<?php if($childno != 0){ ?>
						<h4>Add Childs </h4>
						<table class="table table" border="0" > 
							<tr>
								<td>Name</td>
								<td>Age</td>
								<td>Aadhar</td>
								<td>Add</td>
							</tr>
							<?php for($i=1;$i<=$childno;$i++){ ?>
							<tr>
								<form action="" method="post">
								<td><input type="text" id="name" name="name" class="form-control">
								</td>
								<td><input type="text" id="age" name="age" class="form-control">
								</td>
								<td><input type="text" id="adhar" name="adhar" class="form-control">
								</td>
								<td><input type="submit" name="addchild"  class="btn btn-success">
								</td>
								</form>
							</tr>
					<?php } ?>
						</table> 
					<?php } ?>
					<?php }else
					{ ?>
						<a href="u_add_payment.php?id=<?php echo $fbid; ?>" class="btn btn-success">Add Payment</a>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
			<?php

include("connection.php");

if (isset($_POST['addadult']))
{
	$uid =$row[0];
	$fids =$_SESSION['fl_id'];
	$name =$_POST['name'];
	$age =$_POST['age'];
	$adhar =$_POST['adhar'];	
	$type="adult";

	echo $sql = "insert into traveler_details(u_id,fl_id,fb_id,t_name,t_age,t_adhar,t_type) values('$uid','$fids','$fbid','$name','$age','$adhar','$type')";

	$result = mysqli_query($con,$sql);

	if($result)
	{ 
		echo "<script>window.location.href='u_traveler_details.php'</script>";
	}
}

if (isset($_POST['addchild']))
{
	$uid =$row[0];
	$fids =$_SESSION['fl_id'];
	$name =$_POST['name'];
	$age =$_POST['age'];
	$adhar =$_POST['adhar'];	
	$type="child";

	echo $sql = "insert into traveler_details(u_id,fl_id,fb_id,t_name,t_age,t_adhar,t_type) values('$uid','$fids','$fbid','$name','$age','$adhar','$type')";

	$result = mysqli_query($con,$sql);

	if($result)
	{ 
		echo "<script>window.location.href='u_traveler_details.php'</script>";
	}
}

?>
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
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

			$flid = $_GET['id'];
			$_SESSION['fl_id']=$flid;
			$sqls = "select * from flight_details where fl_id='$flid'";
			$results = mysqli_query($con,$sqls);
			$fdet = mysqli_fetch_row($results);

		?>
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h2 class="title1"></h2>
					<div class="table-responsive bs-example widget-shadow">
						<h4>Book Flight </h4>
						<table class="table table-bordered" height="150px"> 
							<form action="" method="post">
							<div class="row">
								<div class="col-lg-6 fields">
									<span>From</span>
									<input type="text" id="from" name="from" readonly value="<?php echo $fdet[3] ?>" class="form-control">
								</div>
								<div class="col-lg-6 fields">
									<span>To</span>
									<input type="text" class="form-control" id="to" name="to" readonly value="<?php echo $fdet[4] ?>">
								</div>
								</div>
								<div class="row">
								<div class="col-lg-6 fields">
									<span>Departing</span>
									<input type="date" class="form-control" id="day" name="day" readonly value="<?php echo $fdet[5] ?>">
								</div>
								<div class="col-lg-6 fields">
									<span>Amount</span>
									<input type="text" class="form-control" id="amt" name="amt" readonly >
								</div>
								</div>
								<div class="row">
								<div class="col-lg-3 fields">
									<span>Adults</span>
									<select class="form-control" id="adult" name="adult" onchange="getAdult()" required>
											<?php for($i=0;$i<=10;$i++) { ?>
											<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php } ?>
									</select>
								</div>
								<div class="col-lg-3 fields">
									<span>Child's</span>
									<select class="form-control" id="child" name="child" onchange="getChild()" required>
											<?php for($i=0;$i<=10;$i++) { ?>
											<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php } ?>
									</select>
								</div>
								</div>
								<div class="col-lg-2 fields">
									<br>
									<input type="submit" value="Submit" class="btn btn-success" name="submit">
								</div>
							</form>
						</table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		<div class="footer">
			</body>
</html>

<?php

if (isset($_POST['submit']))
{
	$uid =$row[0];
	$adult =$_POST['adult'];
	$child =$_POST['child'];
	$amt =$_POST['amt'];
	$s = "0";


	$sql = "insert into book_details(u_id,fl_id,fb_adults,fb_child,fb_amt,fb_status) values('$uid','$flid','$adult','$child','$amt','$s')";

	$result = mysqli_query($con,$sql);

	$fbid =  mysqli_insert_id($con);

	$_SESSION['fbid'] = $fbid;

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
		<script type="text/javascript">

		var adultamt = "<?php echo $fdet[9]; ?>";
		var childamt = "<?php echo $fdet[10]; ?>";
			 
			 function getAdult()
  			{
  				var amount=document.getElementById("amt").value;
  				var adult=document.getElementById("adult").value;
  				var a=parseInt(adult);

  				if(a != 0)
  				{
  					var amts= parseInt(a*adultamt);
  					var amount=amount+amts;
 			 		document.getElementById("amt").value=amount;
  				}
  				else
  				{
  					alert("No travelers");
  					document.getElementById("amt").value="0";
  				}
  			}

  			function getChild()
  			{
  				var amount=document.getElementById("amt").value;
  				var child=document.getElementById("child").value;
  				var c=parseInt(child);

  				if(c != 0)
  				{
  					var amts= parseInt(c*childamt);
  					var amount=parseInt(amount)+parseInt(amts);
 			 		document.getElementById("amt").value=amount;
  				}
  				else if(c == 0)
  				{
  					document.getElementById("amt").value=amount;
  					var adult=document.getElementById("adult").value;
  					var a=parseInt(adult);
  					if(a != 0)
  					{
  						var amts= parseInt(a*adultamt);
  						var amount=amount+amts;
 			 			document.getElementById("amt").value=amount;
  					}
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

   

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
										<span>Adminstrator</span>
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
				<div class="forms">
					<h2 class="title1"></h2>
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add Flight Categories :</h4>
							</div>
							<div class="form-body">
								<form class="form-horizontal" method="post"  enctype="multipart/form-data"> 
									
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Flight Category</label> 
										<div class="col-sm-9"> <input type="text" class="form-control" id="fcat" name="fcat"  maxlength="25"> 
										</div> 
									</div> 
									<div class="form-group"> 
										<label class="col-sm-2 control-label">Flight Image</label> 
										<div class="col-sm-9"> <input type="file" class="form-control" id="fimg" name="fimg"> 
										</div> 
									</div> 
									<div class="col-sm-offset-2"> 
										<input type="submit" class="btn btn-success" value="Add" name="afcats">
									</div> 
								</form> 
							</div>
						</div>
					</div>
				</div>
				<div class="tables">
					<h2 class="title1"></h2>
					<div class="table-responsive bs-example widget-shadow">
						<h4>View Flight Categories</h4>
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>#</th> 
								  	<th>Category</th>
								  	<th>Icon</th>
								  	<th>Delete</th>
								</tr> 
							</thead> 
							<tbody> 
								<?php 
									$fcat = 0;
									$sql2 = "select * from flight_categories";
									$result = mysqli_query($con,$sql2);
									$i= 0;
									while ($fcat = mysqli_fetch_row($result)) {
										# code...
										
										$i++;
									
								?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th> 
								  	<td><?php echo $fcat[1]; ?></td>
								  	<td width="250px" height="100px"><img src="uploads/<?php echo $fcat[2] ?>" width="100%" height="100%"></td>
								  	<td><a href="a_delete_fcat.php?id=<?php echo $fcat[0];?>" class="fa fa-trash"></a></td>
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

<?php

include("connection.php");
if(isset($_POST['afcats']))
{
  $fcat=$_POST['fcat'];
  $image=$_FILES['fimg']['name'];
    $image1=explode('.',$image);
    $allowedExtsImage = array("jpeg", "jpg", "png");
    $extension_image=end($image1);
    $time = Time();
    $image_name=$time.'.'.$extension_image;
    if(in_array($extension_image, $allowedExtsImage)) 
    {
    if(move_uploaded_file($_FILES['fimg']['tmp_name'], 'uploads/'.$image_name))
        {
            $query="insert into flight_categories(fc_cat,fc_img) values('$fcat','$image_name')";
            $result = mysqli_query($con,$query);
            if($result)
            {
            	echo "<script>window.location.href='a_add_fcats.php'</script>";
            }
        }
	}
}

?>
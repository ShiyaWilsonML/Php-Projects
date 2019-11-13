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
		<?php 

		$fbid = $_SESSION['fbid'];
		$sql11 = "select * from book_details where fb_id='$fbid'";
		$res = mysqli_query($con,$sql11);
		$book = mysqli_fetch_array($res);

		?>
		
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h2 class="title1"></h2>
					<div class=" form-grids row form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Payment Details : <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png" style="float:right;"></h4>
							</div>
							<div class="form-body">
								<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"> 
                        <div class="row">
                            <div class="col-lg-12">
                                    <label for="cardNumber">Card Number</label>
                                    <div class="input-group">
                                        <input 
                                            type="tel"
                                            class="form-control"
                                            name="cno"
                                            placeholder="Valid Card Number"
                                            autocomplete="cc-number"
                                            required autofocus 
                                            maxlength="12"
                                            minlength="12"
                                        />
                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                    </div>                      
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 fields">
                                    <label for="cardExpiry"><span class="hidden-xs">Expiration</span><span class="visible-xs-inline">EXP</span> Date</label>
                                    <input 
                                        type="tel" 
                                        class="form-control" 
                                        name="cex"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
                                    />
                            </div>
                            <div class="col-lg-6 fields">
                                    <label for="cardCVC">Cvv Code</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cvv"
                                        placeholder="CVC"
                                        autocomplete="cc-csc"
                                        required
                                        maxlength="3"
                                        minlength="3"
                                    />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 fields">
                                    <label for="couponCode">Final Amount</label>
                                    <input type="text" class="form-control" name="amt" readonly value="<?php echo $book[5]; ?>"/>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="subscribe btn btn-success btn-lg btn-block" type="submit" value="Pay" name="addpay">
                            </div>
                        </div>
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
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

if (isset($_POST['addpay']))
{
	$cno =$_POST['cno'];
	$cex =$_POST['cex'];
	$cvv =$_POST['cvv'];
	$amt =$_POST['amt'];

	$sqls = "select * from bank_account where ba_cno='$cno' and ba_cex='$cex' and ba_cvv='$cvv'";
	$results = mysqli_query($con,$sqls);
	$bacc = mysqli_fetch_row($results);

	$amount = $bacc[4];

	if($amount >= $amt)
	{
		$balance = $amount-$amt;

		$sqlss = "update bank_account set ba_amt='$balance' where ba_cvv='$cvv'";

		$resultss = mysqli_query($con,$sqlss);

		if($resultss)
		{ 
			$status = "1";
			$query = "update book_details set fb_status='$status' where fb_id='$fbid'";

			$resq = mysqli_query($con,$query);

			if($resq)
			{ 
				echo "<script>alert('Successfully Paid');</script>";
				echo "<script>window.location.href='u_view_ticket.php'</script>";			
			}
		}
		else
		{
			echo "Something Wrong";
		}
	}
	else
	{
		echo "<script>alert('Your Account Balance is Very Low');</script>";
	}
}

?>
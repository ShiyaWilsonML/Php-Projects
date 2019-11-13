<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>CAREER GURU | User</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url() ?>loginindex/css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="<?php echo base_url() ?>loginindex/css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="<?php echo base_url() ?>loginindex/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

 <!-- side nav css file -->
 <link href='<?php echo base_url() ?>loginindex/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
 <!-- side nav css file -->
 
 <!-- js-->
<script src="<?php echo base_url() ?>loginindex/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url() ?>loginindex/js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="<?php echo base_url() ?>loginindex/js/metisMenu.min.js"></script>
<script src="<?php echo base_url() ?>loginindex/js/custom.js"></script>
<link href="<?php echo base_url() ?>loginindex/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
	<?php
									foreach ($users as $row) {
										# code...
										$uid=$row->u_id;
									

								?>
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"> Career Guru</a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="<?php echo base_url('UserModule/user_index') ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>User Profile</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('UserModule/view_profile') ?>"><i class="fa fa-angle-right"></i> View Profile</a></li>
                  <li><a href="<?php echo base_url('UserModule/edit_profile') ?>"><i class="fa fa-angle-right"></i> Edit Profile</a></li>
                  <li><a href="<?php echo base_url('UserModule/change_pwd') ?>"><i class="fa fa-angle-right"></i> Change Password</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>Quiz</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('UserModule/start_quiz') ?>"><i class="fa fa-angle-right"></i> Attend Quiz</a></li>
                  <li><a href="<?php echo base_url('UserModule/view_results') ?>"><i class="fa fa-angle-right"></i> View Results</a></li>
                </ul>
              </li>
			  <li>
                <a href="<?php echo base_url('UserModule/view_courses') ?>">
                <i class="fa fa-mortar-board"></i> <span>View Courses</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/view_colleges') ?>">
                <i class="fa fa-bank"></i> <span>View Colleges</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/chat_box/'.$uid) ?>">
                <i class="fa fa-comments-o"></i> <span>Chatbox</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/view_notifications') ?>">
                <i class="fa fa-bell"></i> <span>View Notifications</span>
                <!-- <small class="label pull-right label-info">08</small> -->
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/view_videos') ?>">
                <i class="fa fa-video-camera"></i> <span>View Videos</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/view_ebooks') ?>">
                <i class="fa fa-book"></i> <span>View Ebooks</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('UserModule/logout') ?>">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
              </li>
          </ul>
              
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>
		<!--left-fixed -navigation-->
		
		<!-- header-starts -->
		<div class="sticky-header header-section col-md-12 ">
			<div class="header-left">
				
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				<div class="profile_details_left"><!--notifications of menu start -->
					<ul class="nofitications-dropdown">
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
							<ul class="dropdown-menu">
								<li>
									<div class="notification_header">
										<h3>You have 3 new notification</h3>
									</div>
								</li>
								<li><a href="#">
									<div class="user_img"><img src="images/4.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p><span>1 hour ago</span></p>
									</div>
								  <div class="clearfix"></div>	
								 </a></li>
								 <li class="odd"><a href="#">
									<div class="user_img"><img src="images/1.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li><a href="#">
									<div class="user_img"><img src="images/3.jpg" alt=""></div>
								   <div class="notification_desc">
									<p>Lorem ipsum dolor amet </p>
									<p><span>1 hour ago</span></p>
									</div>
								   <div class="clearfix"></div>	
								 </a></li>
								 <li>
									<div class="notification_bottom">
										<a href="#">See all notifications</a>
									</div> 
								</li>
							</ul>
						</li>
					</ul>

					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								
								<div class="profile_img">	
									<span class="prfil-img"><img src="<?php echo base_url('uploads/'.$row->u_image); ?>" width="50px" height="50px" alt=""> </span> 
									<div class="user-name">
										<p><?php echo $row->u_name; ?></p>
										<span>User</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
								<br>
								<?php
									}

								?>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?php echo base_url('UserModule/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
						<div class="widget-shadow" data-example-id="basic-forms">
							<div class="form-title" id="hide">
								<h4>Quiz Categories</h4>
							</div>
							<div class="form-body" id="start">
								<table class="table" border="0">
								
						<?php
								
								foreach ($qcids as $row1) 
								{
									foreach ($qcid as $row2) 
									{ 
										foreach ($qcname as $row3) 
										{	if($row1->qc_id == $row2->qc_id && $row2->qc_id == $row3->qc_id)
												{		
												 ?> 
												<tr>
												<td>
												<h4><?php echo $row3->qc_name; ?></h4></td>
												<td>
												<a class="btn btn-primary"  href="<?php echo base_url('UserModule/edit_quiz/'.$row3->qc_id);?>">Restart Quiz</a>
												</td>
												</tr><?php
												}
											}									
										}
									}
									$i=0;
									foreach ($qcidz as $qcidz1) {
										
									foreach ($qcname as $row3) 
											{
												foreach ($qids as $qids1) {
													
												if($qcidz1->qc_id == $qids1->qc_id)
												{
												if($qcidz1->qc_id == $row3->qc_id)
												{
													?> 
												<tr>
												<td>
												<h4><?php echo $row3->qc_name; ?></h4></td>
												<td>
												<a class="btn btn-primary"  href="<?php echo base_url('UserModule/category_quiz/'.$row3->qc_id);?>">Start Quiz</a>
												</td>
												</tr><?php
											}
											}
										}
											}
										}
						?>
							</table>
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
	<script src='<?php echo base_url() ?>loginindex/js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="<?php echo base_url() ?>loginindex/js/classie.js"></script>
		<script>

			function hideDiv()
			{
				var div = document.getElementById('start');
				div.style.display = "none";
			}
			function showDiv()
			{
				var div = document.getElementById('start');
				div.style.display = "block";
				var divs = document.getElementById('hide');
				divs.style.display = "none";
			}
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
	<script src="<?php echo base_url() ?>loginindex/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url() ?>loginindex/js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url() ?>loginindex/js/bootstrap.js"> </script>
   <script type="text/javascript">
   	// var answers = ["A","A","A","A","A","A","A","A","A","A"];
   	<?php
   	$i=0;
   	while ($i<count($qid)) {
   		foreach ($qid as $qids) {
   			foreach ($question as $ques) {
   				if($qids->q_id == $ques->q_id)
   				{ 
   					$arr[$i] = $ques->q_answer;
   					$i++;
   				} 
   			} 
   		} 
   	}
   	$arr_list = '["' . implode('", "', $arr) . '"]';
   	?>
   	var answers = <?php echo $arr_list ?>;
    tot = answers.length;
    var c = <?php echo $count; ?>;

function getCheckedValue( radioName ){
    var radios = document.getElementsByName( radioName ); // Get radio group by-name
    for(var y=0; y<radios.length; y++)
      if(radios[y].checked) return radios[y].value; // return the checked value
}

function getScore(){
  var score = 0;
  for (var i=0; i<c; i++)
    if(getCheckedValue(i)=== answers[i]) score += 1; // increment only
  return score;
}

function returnScore(){
  alert("Your score is "+ getScore() +"/"+ c);
}
   </script>

   
</body>
</html>
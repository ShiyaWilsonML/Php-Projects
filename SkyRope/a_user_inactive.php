<?php

include("connection.php");
session_start();
if(!isset($_SESSION['a_email']))
{
	echo "<script>window.location.href='404.php'</script>";
}
else 
{
	$uid = $_GET['id'];
	$status = "inactive";

	$sql = "update user_details set u_status='$status' where u_id='$uid'";

	$result = mysqli_query($con,$sql);

	if($result)
	{ 
		echo "<script>window.location.href='a_view_users.php'</script>";
	}
}

?>
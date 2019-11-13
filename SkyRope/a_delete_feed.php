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
	$fid = $_GET['id'];
	$sql = "delete from feedback where f_id='$fid'";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<script>window.location.href='a_view_feedbacks.php'</script>";
	}
} 
?>
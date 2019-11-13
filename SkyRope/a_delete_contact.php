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
	$cid = $_GET['id'];
	$sql = "delete from contact_details where c_id='$cid'";
	$result = mysqli_query($con,$sql);
	if($result)
	{
		echo "<script>window.location.href='a_view_contacts.php'</script>";
	}
} 
?>
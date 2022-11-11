<?php

include('connect.php');
session_start();
$user_id = $_SESSION['user_id'];
if(isset($_GET['img_id']))
{
	$id=$_GET['img_id'];
	$sql_delete="DELETE FROM `image` WHERE img_id='$id'";
	$result=mysqli_query($con,$sql_delete);
	if($result)
	{
		echo "<script>alert('Record deleted successfully')</script>";
		echo "<script>window.open('documentsCenter.php?acct_id=$user_id','_self')</script>";
	}
	else
	{
		die(mysqli_error($con));
	}
}

?>
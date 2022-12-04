<?php

session_start();

$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");

//$userid=$_POST('userid');

if(isset($_POST['userid']))
{
	$name=$_POST['userid'];

	$checkdata="SELECT * FROM userdata WHERE UserID='$name'";

	$query=mysqli_query($con,$checkdata);

	if(mysqli_num_rows($query)>0)
 	{
		echo "User Name Already Taken";
 	}
	else
 	{
 		echo "Available";
 	}
}
?>
<?php

session_start();
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
$userid=$_SESSION['userid'];

if(isset($_POST['bulk_delete_submit'])){
	if(!empty($_POST['checked_id'])){
		$idStr= implode(',', $_POST['checked_id']);
		$delete="DELETE FROM $userid WHERE id IN ($idStr)";
		$result=mysqli_query($con,$delete);

		if($result)
		{
			$statusMsg = "Selected users have been successfully deleted";
		}
		else
		{
			$statusMsg = "Some error occured. Please try again!";
		}
	}
	else
	{
		$statusMsg="Select atleast 1 record to delete";
	}
}

$icap="SELECT SUM(Num*Rating) from $userid";
$r1=mysqli_query($con,$icap);
$row=mysqli_fetch_assoc($r1);
$suminstalled=intval($row['SUM(Num*Rating)']);
echo $suminstalled;

$update="UPDATE userdata SET installedcap=$suminstalled WHERE UserID='$userid'";
mysqli_query($con,$update);

$s1="SELECT SUM(installedcap) FROM userdata";
$r1=mysqli_query($con,$s1);
$row= mysqli_fetch_assoc($r1);
$suminstalled= intval($row['SUM(installedcap)']);
$s2= "UPDATE userdata SET fraction= installedcap/$suminstalled";
mysqli_query($con,$s2);
header('location: deleteAppliance.php');
echo $userid;

?>
<?php

session_start();

$con=mysqli_connect('localhost','root','123456','fyusers')or die("ERROR 404");

$userid= $_POST['userid'];
$password= $_POST['pass'];

$s = "select * from admindata where UserID='$userid' && Password='$password'";

$result= mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num==1){
	echo "You are now logged in";
	#$usid="select UserID from userdata where Email='$email' && Password='$password'";
	#$userid=mysqli_query($con,$usid);
	#$qz = "SELECT UserID FROM userdata where email='".$email."' and password='".$password."'" ;
	//$_SESSION['username']=$userid;
	$p= "select First_Name from admindata where UserID='$userid' && Password='$password'";
	$res= mysqli_query($con,$p);
	$row= mysqli_fetch_assoc($res);
	$_SESSION['First_Name']=$row['First_Name'];
	$_SESSION['usersid']=$userid;
	header('location:adminmainpage.php');
}
else{
	echo "Invalid username or password";
	header('location:login.php');
}

?>
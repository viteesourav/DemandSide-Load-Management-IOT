<?php

session_start();

$con=mysqli_connect('localhost','root','123456','fyusers')or die("ERROR 404");

$userid= $_SESSION['userid'];
$p1= $_POST['l1'];
$p2= $_POST['l2'];
$p3= $_POST['m1'];
$p4= $_POST['m2'];
$p5= $_POST['h1'];
$p6= $_POST['h2'];

//$r="UPDATE userloaddata SET P1='$p1',P2='$p2',P3='$p3',P4='$p4',P5='$p5',P6='$p6' WHERE UserID='$userid'";
$r="UPDATE userdata SET P1='$p1',P2='$p2',P3='$p3',P4='$p4',P5='$p5',P6='$p6' WHERE UserID='$userid'";
mysqli_query($con,$r);
echo "User loads Successfully Registered";
header('location: mainpage.php');
?>
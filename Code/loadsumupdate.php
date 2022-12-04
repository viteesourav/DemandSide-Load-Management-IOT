<?php

session_start();

echo $sum1=intval(($_SESSION['p1']*810)/1000);
echo $sum2=intval(($_SESSION['p2']*810)/1000);
echo $sum3=intval(($_SESSION['p3']*810)/1000);
echo $sum4=intval(($_SESSION['p4']*810)/1000);
echo $sum5=intval(($_SESSION['p5']*810)/1000);
echo $sum6=intval(($_SESSION['p6']*810)/1000);


$userid=$_SESSION['usersid'];
$con=mysqli_connect('localhost','root','123456','fyusers') or die('connection error');
$qry= "UPDATE admindata SET totalP1='$sum1',totalP2='$sum2',totalP3='$sum3',totalP4='$sum4',totalP5='$sum5',totalP6='$sum6' WHERE UserID='$userid'";
mysqli_query($con,$qry);
header('location:hardware.php');
?>
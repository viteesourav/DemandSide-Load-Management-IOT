<?php

session_start();

echo $sum1=$_SESSION['p1'];
echo $sum2=$_SESSION['p2'];
echo $sum3=$_SESSION['p3'];
echo $sum4=$_SESSION['p4'];
echo $sum5=$_SESSION['p5'];
echo $sum6=$_SESSION['p6'];


$userid=$_SESSION['usersid'];
$con=mysqli_connect('localhost','root','123456','fyusers') or die('connection error');
$qry= "UPDATE admindata SET totalP1='$sum1',totalP2='$sum2',totalP3='$sum3',totalP4='$sum4',totalP5='$sum5',totalP6='$sum6' WHERE UserID='$userid'";
mysqli_query($con,$qry);


?>
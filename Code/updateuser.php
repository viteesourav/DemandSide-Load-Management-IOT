<?php
session_start();

$load= $_SESSION['loadval'];
$battery=$_SESSION['battery'];

$con=mysqli_connect('localhost','root','123456','fyusers') or die('connection_aborted');
$c1= "UPDATE userdata SET total_load_ofday = ($load+$battery)*fraction";
    mysqli_query($con,$c1);

    $qry2="UPDATE userdata SET P1=total_load_ofday*0.05,P2=total_load_ofday*0.1,P3=total_load_ofday*0.15,P4=total_load_ofday*0.2,P5=total_load_ofday*0.25,P6=total_load_ofday*0.25";
    mysqli_query($con,$qry2);
header('location:adminmainpage.php');
?>
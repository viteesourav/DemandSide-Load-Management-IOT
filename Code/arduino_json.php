<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "fyusers";
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");

$p1="SELECT p1,p2,p3,p4,p5,p6 FROM loadpriority";
$result=mysqli_query($con,$p1);
$data=array();

foreach ($result as $row) {
	$data[]=$row;
}
print json_encode($data);

?>
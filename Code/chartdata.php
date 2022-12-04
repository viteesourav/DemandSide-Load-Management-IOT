<?php
session_start();
header('Content-type: application/json');
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
$var1=$_SESSION['gendate'];
#$var2=strrev($var1);
$yy=substr($var1, 0,4);
$mm=substr($var1, 5,2);
$dd=substr($var1, 8);
$var2="'".$dd."-".$mm."-".$yy."'";
$query=sprintf("SELECT ptime, solarpredict, windpredict, battery, totalgen, consumpredict FROM predictionrecord where pdate=%s",$var2);
$result=mysqli_query($con,$query);
$data=array();
foreach ($result as $row) {
	$data[]=$row;
}
#$result->close();
#$mysqli->close();
print json_encode($data);
?>
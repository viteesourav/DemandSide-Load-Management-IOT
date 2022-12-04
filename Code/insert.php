<?php

//insert.php
session_start();
$userid=$_SESSION['userid'];
$useridl=strtolower("$userid");

$connect = new PDO("mysql:host=localhost;dbname=fyusers", "root", "123456");
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");

$query = "
INSERT INTO $userid 
(Appliance, Num, Rating) 
VALUES (:appliance, :units , :rating)
";

for($count = 0; $count<count($_POST['hidden_appliance']); $count++)
{
 $data = array(
  ':appliance' => $_POST['hidden_appliance'][$count],
  ':units' => $_POST['hidden_units'][$count],
  ':rating' => $_POST['hidden_rating'][$count]
 );
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

$icap="SELECT SUM(Num*Rating) from $useridl";
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
header('location: mainpage.php');

?>

<?php

session_start();
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");

$r11=$_POST['r11'];
$r12=$_POST['r12'];
$r21=$_POST['r21'];
$r22=$_POST['r22'];
$r31=$_POST['r31'];
$r32=$_POST['r32'];
$r41=$_POST['r41'];
$r42=$_POST['r42'];
$r51=$_POST['r51'];
$r52=$_POST['r52'];
$r61=$_POST['r61'];
$r62=$_POST['r62'];
$r71=$_POST['r71'];
$r72=$_POST['r72'];
$r81=$_POST['r81'];
$r82=$_POST['r82'];
$r91=$_POST['r91'];
$r92=$_POST['r92'];
$r101=$_POST['r101'];
$r102=$_POST['r102'];
$r111=$_POST['r111'];
$r112=$_POST['r112'];
$r121=$_POST['r121'];
$r122=$_POST['r122'];
$r131=$_POST['r131'];
$r132=$_POST['r132'];
$r141=$_POST['r141'];
$r142=$_POST['r142'];
$r151=$_POST['r151'];
$r152=$_POST['r152'];
$r160=$_POST['r160'];
$r161=$_POST['r161'];
$r162=$_POST['r162'];

$userid=$_SESSION['userid'];
$useridl=strtolower("$userid");

if($r160==''){

$reg="INSERT INTO $userid(Appliance, Num, Rating) VALUES ('LED Bulb','$r11','$r12'),('LED Tubelight','$r21','$r22'),('CFL Bulb','$r31','$r32'),('Nightlamp','$r41','$r42'),('Fan','$r51','$r52'),('AC','$r61','$r62'),('LED TV','$r71','$r72'),('PC / Laptop','$r81','$r82'),('Geyser','$r91','$r92'),('Music System','$r101','$r102'),('Fridge','$r111','$r112'),('Chimney','$r121','$r122'),('Washing Machine','$r131','$r132'),('Eleveator','$r141','$r142'),('Water Pump','$r151','$r152')";
}
else
{
$reg="INSERT INTO $userid(Appliance, Num, Rating) VALUES ('LED Bulb','$r11','$r12'),('LED Tubelight','$r21','$r22'),('CFL Bulb','$r31','$r32'),('Nightlamp','$r41','$r42'),('Fan','$r51','$r52'),('AC','$r61','$r62'),('LED TV','$r71','$r72'),('PC / Laptop','$r81','$r82'),('Geyser','$r91','$r92'),('Music System','$r101','$r102'),('Fridge','$r111','$r112'),('Chimney','$r121','$r122'),('Washing Machine','$r131','$r132'),('Eleveator','$r141','$r142'),('Water Pump','$r151','$r152'),('$r160','$r161','$r162')";
}
mysqli_query($con,$reg);

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
header('location: Successful.php');

?>
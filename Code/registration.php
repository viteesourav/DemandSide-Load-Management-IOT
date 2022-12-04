<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "fyusers";
$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$email=$_POST['email'];
$userid=$_POST['userid'];
$pass=$_POST['password'];
$cpass=$_POST['confirmpassword'];
$phn=$_POST['number'];

$s="select * from userdata where email='$email'";

$result=mysqli_query($con,$s);

$num=mysqli_num_rows($result);

if($num == 1)
{
	header('location: Unsuccessful.php');
	echo "User Already Exists";	
}
else
{
	$sql = "CREATE TABLE $userid (id int not null AUTO_INCREMENT ,Appliance VARCHAR(20) not NULL, Num int not NULL, Rating int not NULL, PRIMARY KEY(id))";
    $conn->exec($sql);
    echo "Table MyGuests created successfully";

	$reg="INSERT INTO userdata(First_Name,Last_Name,Email,UserID,Password,Phone_Number) VALUES ('$fname','$lname','$email','$userid','$pass','$phn')";
	mysqli_query($con,$reg);
	$_SESSION['userid']=$userid;
	echo "User Successfully Registered";
	header('location: ApplianceRecord.php');

}

?>
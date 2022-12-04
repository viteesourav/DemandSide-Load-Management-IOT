<?php

session_start();

$con=mysqli_connect('localhost','root','123456','fyusers') or die("Couldn't connect to database");
$sql="SELECT Email FROM userdata";
$result=mysqli_query($con,$sql);
$data[] = array();
foreach ($result as $row) {
	$data[]=$row;
}
$n=mysqli_num_rows($result);

if(isset($_POST['notifydate']))
{
	$ndate=$_POST['notifydate'];
}
else
{
	$ndate='Date not set';
}

if(isset($_POST['notifytime']))
{
	$ntime=$_POST['notifytime'];
}
else
{
	$ntime='Time not set';
}

echo $ndate;
echo $ntime;

$msg="Please update priority load value for the date ".$ndate." and at time ".$ntime;

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
for($x=0; $x<$n; $x++){
	//echo $data[$x];
	$string=implode($data[$x]);
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  					// Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'demandsideloadtrial@gmail.com';                 // SMTP username
	$mail->Password = '(xV1qEgdBfaD';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('demandsideloadtrial@gmail.com', 'System Admin');
	$mail->addAddress($string);
	//$mail->addAddress('debdatta12@gmail.com', 'Debdutta');     // Add a recipient
	//$mail->addAddress('souravm.mitra@gmail.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Update Load Values';
	$mail->Body    = $msg;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Message has been sent';
	}
}
header('location: adminrunpython.php');
?>
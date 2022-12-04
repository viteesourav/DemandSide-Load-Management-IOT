<?php

require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'demandsideloadtrial@gmail.com';                 // SMTP username
$mail->Password = '(xV1qEgdBfaD';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('demandsideloadtrial@gmail.com', 'Page Admin');

$con = mysqli_connect('localhost','root','123456','fyusers') or die('404 ERROR');
$qrry = "SELECT Email FROM userdata";
$result = mysqli_query($con,$qrry);
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$mail->addAddress($row['Email']);     // Add a recipient
	}
}
else
echo 'Error in Retrieving Mail From Server...';

//$mail->addAddress('vishwatej888@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mdate= $_POST['maildate'];
$mtime= $_POST['mailtime'];
$mname= $_POST['mailname'];

$mail->Subject = 'Notification Received From Building Administration ';
$mail->Body    = 'This is your building Admin <b>'.$mname.'</b>, We request you to kindly Login to your respective account in our load managment website and provide your actual consumption at '.$mtime.' Hours on '.$mdate.'<br> Your Active Participation in this matter is highly appreciated.<br>Thank You for Your time.';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header('location:adminmainpage.php');
}

?>
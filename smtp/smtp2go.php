<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("Exception.php");
require("PHPMailer.php");
require("SMTP.php");

// START SMTP CONFIGURATION

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "mailhog";
$mail->Port = "1025"; // 1025, 587 can be used. Use Port 465 for SSL.
$mail->SMTPAuth = false;
$mail->SMTPSecure = ''; // tls
$mail->Username = "";
$mail->Password = "";

$mail->From = "noreply@domain.com";
$mail->FromName = "Noreply";
$mail->AddAddress("foo@domain.com", "Foo");
$mail->AddReplyTo("bar@domain.com", "Bar");

// END SMTP CONFIGURATION

$mail->Subject = "Test SMTP Mail Delivery";
$mail->Body = "Seems like your SMTP can send out emails";
$mail->WordWrap = 50;

if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
exit;
} else {
echo 'Message has been sent.';
}
?>

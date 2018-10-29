<?php

// $email and $message are the data that is being
// posted to this page from our html contact form
$email = $_REQUEST['email'] ;
$message = $_REQUEST['message'] ;
$name = $_REQUEST['name'] ;
$subject = $_REQUEST['subject'] ;
echo $message;
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require_once('./config/PHPMailer_5.2.0/class.phpmailer.php');


$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "qbcart123@gmail.com";
$mail->Password = "Qburst@123";
$mail->SetFrom("qbcart123@gmail.com");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }
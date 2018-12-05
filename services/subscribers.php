<?php
   error_reporting(E_ALL);
   ini_set('display_errors', '1');
header('Access-Control-Allow-Origin: http://10.7.20.68:3001');
require_once('../config/PHPMailer_5.2.0/class.phpmailer.php');
$data = json_decode(file_get_contents('php://input'), true);

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ecas";
error_reporting(E_ALL);
   ini_set('display_errors', '1');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $data["email"];
$sql = "INSERT INTO subscribers (email)
VALUES ('$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$message = "Thank you for subscribing to ECAS";
$subject = "Welcome to ECAS circle";
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "qbcart123@gmail.com";
$mail->Password = "Angelotti7#";
$mail->SetFrom("qbcart123@gmail.com");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }



echo $email;


?>


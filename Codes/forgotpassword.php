<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["emailid"])){
$emailTo = $_POST["emailid"];
$mail = new PHPMailer(true);

try {
    //Server settings
  
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'emart.ecommercesite@gmail.com';                     // SMTP username
    $mail->Password   = 'St@rk_Tech7';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('emart.ecommercesite@gmail.com', 'Emart Support');
    $mail->addAddress($emailTo);     // Add a recipient

    $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = ' ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
<?php
// Import PHPMailer classes into the global namespace
// These should be present at the top not inside the function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["emailid"])){
$emailTo = $_POST["emailid"];
$mail = new PHPMailer(true);

try {

  
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                                  
    $mail->Username   = 'emart.ecommercesite@gmail.com';              
    $mail->Password   = 'St@rk_Tech7';                              
    $mail->SMTPSecure = 'tls';                                 
    $mail->Port       = 587;                                    

    //Recipients
    $mail->setFrom('emart.ecommercesite@gmail.com', 'Emart Support');
    $mail->addAddress($emailTo);     

    $mail->addReplyTo('no-reply@gmail.com', 'No reply');
    


    // Content
    $mail->isHTML(true);                              
    $mail->Subject = 'Reset Password';
    $mail->Body    = '<a href = "http://localhost/EMart/Codes/passwordReset.html" >Click here</a>';
    $mail->send();
    echo 'A link to reset your password has been sent to your email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();
}
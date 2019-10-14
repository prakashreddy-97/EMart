<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
// Passing the input values
$error = Null;
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $emailId = $_POST['emailId'];
    $sub = $_POST['sub'];
    $msg = $_POST['msg'];
    
             
                try {
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';  
                    $mail->SMTPAuth   = true;                                  
                    $mail->Username   = 'emart.ecommercesite@gmail.com';              
                    $mail->Password   = 'St@rk_Tech7';                              
                    $mail->SMTPSecure = 'tls';                                 
                    $mail->Port       = 587;                                    
                     //Recipients
                     
                    $mail->setFrom('emart.ecommercesite@gmail.com', 'Customer Mail');
                    $mail->addAddress('emart.ecommercesite@gmail.com');     
                    $mail->addReplyTo($emailId, $name);
                    // Content
                    $mail->isHTML(true);                              
                    $mail->Subject = 'Customer Request from: '. $name;
                    $requestID = substr(md5(time()), 0, 16);
                    $mail->Body    = "<h2>".'Request ID: '."<b>".$requestID."</b>"."</h2>"."<br>".$msg;  
                    $mail->send();
                    
                    echo 'Your request has been successfully sent. We will soon get back to you.';
                    header('Refresh: 5; url=contact-us.html');
                } 
                catch (Exception $e) {
                    echo "Message cannot   be sent. Mailer Error: {$mail->ErrorInfo}";
                } 
        }
    
?>
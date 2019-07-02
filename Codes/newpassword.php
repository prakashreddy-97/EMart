<html>
<head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
// Passing the input values
$error = Null;
if(isset($_POST['reset'])){
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    
    $confirmpassword = $_POST['confirmpassword'];

    if($password != $confirmpassword){
        $error = "<p>Passwords don't Match</p>";
    }
    else{
        $connect = mysqli_connect('localhost','root','','emart');
        echo("Connected");
        if (!$connect) {
            echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($connect);
            exit();
        }
        //to avoid sql injections
        $password = $connect->real_escape_string($password);
        $emailid = $connect->real_escape_string($emailid);
        $confirmpassword = $connect->real_escape_string($confirmpassword);
        //encryption of the password
        $password = md5($password);
        //if the email exist in the database
        $update = "update customer set password = '".$password."' where emailid = '".$emailid."'";
        // echo($update)
        mysqli_query($connect, $update);

        if($update){
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
                $mail->addAddress($emailid);     
                $mail->addReplyTo('no-reply@gmail.com', 'No reply');
                // Content
                $mail->isHTML(true);                              
                $mail->Subject = 'Change of Password';
                $mail->Body    = "Your password has been updated";
                $mail->send();
                echo 'A link to verify your email id has been sent';
                header('Refresh: 2; url=login.html');
            } 
            catch (Exception $e) {
                echo "Message cannot   be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            exit();
                      
            }
            else{
                echo $connect->error;
            }     
        }
    }

?>
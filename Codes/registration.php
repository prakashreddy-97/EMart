
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
// Passing the input values
$error = Null;
if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $emailid = $_POST['emailid'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password != $confirmpassword){
        $error = "<p>Passwords don't Match</p>";
    }
    else{
        $connect = mysqli_connect('localhost','root','','emart');
        echo("Connected..");
        if (!$connect) {
            echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($connect);
            exit();
        }
        //to avoid sql injections
        $firstname = $connect->real_escape_string($firstname);
        $lastname = $connect->real_escape_string($lastname);
        $password = $connect->real_escape_string($password);
        $emailid = $connect->real_escape_string($emailid);
        $confirmpassword = $connect->real_escape_string($confirmpassword);
        //encryption of the verification key
        $vkey = rand(100000,999999);
        //encryption of the password
        $password = md5($password);
        //if the email exist in the database
        $query = "select emailid from customer where emailid = '".$emailid."'";
        $sol = mysqli_query($connect, $query);
        $numberofrows = mysqli_num_rows($sol);
        if ($numberofrows !== 0) {
            echo "EMail already exists. Try again";
            header('Refresh: 2; url=register.html');
    
        } else {
            //new registration
            
            $insert = "insert into customer(firstname, lastname, emailid, password, vkey) values ('".$firstname."','".$lastname."','".$emailid."','".$password."','".$vkey."')";
            
            mysqli_query($connect, $insert);
            // if insert successfull send the email to the dedicated email id.
            if($insert){   
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
                    $mail->Subject = 'Email Verification';
                    $mail->Body    = $vkey;
                    $mail->send();
                    echo 'A link to verify your email id has been sent';
                    header('Refresh: 2; url=validateEmail.html');
                } 
                catch (Exception $e) {
                    echo "Message cannot   be sent. Mailer Error: {$mail->ErrorInfo}";
                }
             
                        
                             
            }
            else{
                echo $connect->error;
            }     
        }
    }
}
?>
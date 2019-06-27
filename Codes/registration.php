<html>
<head>
<?php
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
        echo("Connected");
        if (!$connect) {
            echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($connect);
            exit();
        }
        //to avoid sql injections
        
            $insert = "insert into customer(firstname, lastname, emailid, password, vkey) values ('".$firstname."','".$lastname."','".$emailid."','".$password."','".$vkey."')";
            echo($insert);
            mysqli_query($connect, $insert);
            echo("Before if loop");
            // if insert successfull send the email to the dedicated email id.
            if($insert){
                echo("Inside if loop");
                $to = $emailid;
                $subject = "Email Confirmation";
                $message = "<a href = 'http://localhost/emart/codes/verify.php?vkey=$vkey'>Register Account</a>";
                $headers = "From: emart.ecommercesite@gmail.com \r\n";
                //$headers = "MIME-Version: 1.0" . "\r\n";
                //$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($to, $subject, $message, $headers);
                echo "Email has been sent";
                header('Refresh: 2; url:validateEmail.html');            
            }
            else{
                echo $connect->error;
            }     
        }
    }
}


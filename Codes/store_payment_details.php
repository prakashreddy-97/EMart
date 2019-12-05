<?php

$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
$flag = false;
session_start();
  $uname=$_SESSION['username'];

if($uname == ""){
    header('Location: login.html');
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
// Passing the input values
    $fname = $_POST['fname'];
    $emailid = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $name_on_card = $_POST['cardname'];
    $credit_card_number = $_POST['cardnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];
    $unique_id = rand(100000,999999);

    $cId;
    $getCustomerIdQuery = "SELECT customerid from customer WHERE emailid = '$uname'";
    // $getCustomerId = mysqli_query($connect, $getCustomerIdQuery);
    $getCustomerId = $conn->query($getCustomerIdQuery);
    if($getCustomerId->num_rows>0){
        while($row = $getCustomerId->fetch_assoc()) {
            $cid = $row["customerid"];
        }
    }else{
        echo "0";
    }
    $updateCustomerDetails = "UPDATE `customer` SET `address` = '$address', `city` = '$city', `state` = '$state', `zipcode` = $zip, `cardnumber` = $credit_card_number WHERE  `customerid`  = $cid"; 
    if(mysqli_query($conn, $updateCustomerDetails)){
        $stmt=$conn->prepare($updateCustomerDetails); 
        if($stmt){
            if($stmt->execute()){

                $getCartDetails = "SELECT product_id,quantity from cart where userName = '$uname'";
                $result = $conn->query($getCartDetails);
                while($resultRow = $result->fetch_assoc()){

                    $val = $resultRow["product_id"];
                    $quantity = $resultRow["quantity"];
                    $date = date("Y-m-d");
                    $insertCheckout = "INSERT into `customerproducts` (`customer_id`,`product_id`,`purchaseDate`,`quantity`) VALUES('$cid',$val, '$date',$quantity)";
                    $stmt=$conn->prepare($insertCheckout); 
                    $stmt->execute();
                    $delateCart = "DELETE FROM cart WHERE userName = '$uname' AND product_id = $val";
                    $deleted = mysqli_query($conn,$delateCart);
                    if($deleted){   
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
                            $mail->Subject = 'Order Placed';
                            $mail->Body    = 'Thank you for shopping in Emart.';
                            $mail->send();
                        } 
                        catch (Exception $e) {
                            echo "Message cannot be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                     
                                
                                     
                    }
                    else{
                        echo $connect->error;
                    }
                }
                echo "Your order has been placed. Thank you.";
                header ('Refresh:3; url=emart.php');
            
            }
        }else{
            echo "Error";
        } 
        
    }else{
        echo "Error in Updating";
    }
    

    

   

?>
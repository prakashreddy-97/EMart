<?php
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

    $connect = mysqli_connect('localhost','root','','emart');


    $insert = "insert into orders(fullname, email, address, city, state, zip, name_on_card, card_number, expiry_month, expiry_year, cvv, unique_id) values ('".$fname."','".$emailid."','".$address."','".$city."','".$state."','".$zip."','".$name_on_card."','".$credit_card_number."','".$expmonth."','".$expyear."','".$cvv."','".$unique_id."')";
            
    mysqli_query($connect, $insert);


    echo "Your order has been placed. Thank you.";

    header ('Refresh:3; url=emart.html');

?>
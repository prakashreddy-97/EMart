
<html>
<head>
<?php

// Passing the input values
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
//$phonenumber = $POST_['phonenumber'];
//$address = $POST_['address'];
//$city = $POST_['city'];
//$state = $POST_['state'];
//$zipcode = $POST_['zipcode'];
// $country = $POST_['country'];
$password = $_POST['password'];
$emailid = $_POST['emailid'];


$status = true;

if($firstname == "" || $lastname == "" || $password == "" ||  $emailid == "" )
{
    header('Refresh: 2; url=register.html');
    echo "Error! Text field cannot be blank. Try again";
    $status = false;
}else{

?>
<title><?php
if ($status){
    echo "Welcome to EMart";
} else {
    echo "EMart Registration";
}
?></title>
</head>
<body>
    <?php
    // if (!status) {
    //     exit;
    // }
    //database connection
    $con = mysqli_connect('localhost', 'root', '', 'emart');

    if (!$con) {
        echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($con);
        exit();
    }

    $query = "select emailid from customer where emailid = '".$emailid."'";
    $sol = mysqli_query($con, $query);
    $numberofrows = mysqli_num_rows($sol);

    if ($numberofrows !== 0) {
        header('Refresh: 2; url=register.html');
        echo "EMail already exists. Try again";
    } else {
        $reg = "INSERT INTO customer(firstname, lastname, emailid, password) values('".$firstname."', '".$lastname."', '".$emailid."', '".$password."');";
        mysqli_query($con, $reg);
        header('Refresh: 2; url=login.html');
        echo "Registration Successful. Now Login using Email and Password";
    }
}
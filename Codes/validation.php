
<html>
<head>
<?php
// Passing the input values
$username = $_POST['username'];
$password = $_POST['password'];
$status = true;
if($username == "" || $password == "")
{
    echo "Error! Text field cannot be blank";
    $status = false;
}
?>
<title><?php
if ($status){
    echo "Welcome to EMart";
    
} else {
    echo "EMart Login";
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
    $query = "select * from customer where emailid = '".$username."' && password = '".md5($password)."' && verified = 1" ;
    $isAdminquery = "select AdminAccess from customer  where emailid = '".$username."' && password = '".md5($password)."' && verified = 1";

    $sol = mysqli_query($con, $query);
    $isAdmin = mysqli_query($con,$isAdminquery);
    $numberofrows = mysqli_num_rows($sol);
    if ($numberofrows == 1) {     
        echo "Login Successful";      //if credentials match
        header('Location: homeAfterlogin.html');         // redirects to home page of emart
        echo "Login Successful";    //if credentials match
        $_SESSION['loggedIn'] = true;
        if($isAdmin == 0){
        header('Location: emart.html');  
        }       // redirects to home page of emart
        else{
            header('Location: adminhome.html');
        }// redirect to admin home page of emart
    } else {       
        header('Refresh: 2; url=login.html');
       echo "Wrong Username or Password. Try Again.";
    }
?>

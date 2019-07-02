<?php
if(isset($_POST['submit'])){
    $emailid = $_POST['verifyemail'];
    $vkey = $_POST['validateemail'];

    $connect = new mysqli('localhost','root','','emart');
        if (!$connect) {
            echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($connect);
            exit();
        }
   
    $verificationcode = "select vkey from customer where emailid = '".$emailid."'";
    $result = $connect->query($verificationcode);
    if($result->num_rows == 1){
        while($row = $result->fetch_assoc()){
           
            if($row["vkey"] == $vkey){
                $query = "update customer set verified = 1 where emailid = '".$emailid."'";
                $updated = mysqli_query($connect, $query);
                echo "Success";
                header('Refresh: 2; url=login.html');
            }
            else{
                echo "The verification code doesn't match";
                echo $vkey;              
            }
        }
    }
    else{
        echo "No email id found";
    }
    
    
}
?>
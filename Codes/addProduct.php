<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emart";
$success = "false";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    if(isset($_POST['submit'])){
        $pName = $_POST['productName'];
        $description = $_POST['description'];
        $category = $_POST['dropdown'];
        $price = $_POST['price'];
        $image = $_POST['imageUpload'];    
        $insert = "insert into product(productname, productdescription, category, price , image) values ('".$pName."','".$description."','".$category."','".$price."','".$image."')";
        mysqli_query($conn, $insert);
        $success = "true";
    }
}
if ($success == "true") {
    echo("Success");
}else{
    echo("Failed");
}
?>
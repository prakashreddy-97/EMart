<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "emart";
$success    = "false";
// Create connection
$conn       = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    if (isset($_POST['submit'])) {
        if (!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
            $itemArray     = array(
                $productByCode[0]["code"] => array(
                    'name' => $productByCode[0]["name"],
                    'code' => $productByCode[0]["code"],
                    'quantity' => $_POST["quantity"],
                    'price' => $productByCode[0]["price"],
                    'image' => $productByCode[0]["image"]
                )
            );
            
            if (!empty($_SESSION["cart_item"])) {
                if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($productByCode[0]["code"] == $k) {
                            if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        break;
        $pName       = $_POST['productName'];
        $description = $_POST['description'];
        $category    = $_POST['dropdown'];
        $price       = $_POST['price'];
        $image       = $_POST['imageUpload'];
        $insert      = "insert into product(productname, productdescription, categoryid, price , image) values ('" . $pName . "','" . $description . "','" . $category . "','" . $price . "','" . $image . "')";
        mysqli_query($conn, $insert);
        $success = "true";
    }
}
if ($success == "true") {
    echo ("Success");
} else {
    echo ("Failed");
}
?>
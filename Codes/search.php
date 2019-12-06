<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
$flag = false;
session_start();
$uname=$_SESSION['username'];
if($uname == ""){
    header('Location: login.html');
}
//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY

if (isset($_REQUEST['term'])) {
    $query = $_REQUEST['term'];
    $sql = mysqli_query ($conn,"SELECT p_name FROM c_table WHERE p_name LIKE '%$query%'");
    $array = array();
    if(mysqli_num_rows($sql)>0){
        while ($row = mysqli_fetch_array($sql)) {
            $array[] = $row['p_name'];
        }
    }
    
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>
<?php
$con = mysqli_connect('localhost', 'root', '', 'emart');
if (!$con) {
    echo "<p style='color: red;'>Error connecting to database: </p>" .mysqli_error($con);
    exit();
}
$query = "select * from customer" ;


$sol = mysqli_query($con, $query);

while($row = mysqli_fetch_array($sol)){
    echo $row['firstname'];
}




?>
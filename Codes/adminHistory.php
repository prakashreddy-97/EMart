<?Php
$connection = mysqli_connect('localhost', 'root', '', 'emart');
echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->

    <title>EMart.com </title>";
require "templates/head.php";
echo "<link rel='stylesheet' href='templates/custom.css' type='text/css'>
<style>
.my_div  {
vertical-align: middle;
}
.my_table {width:700px;}
</style>
</head><body>";

require "templates/top.php";

if($stmt = $connection->query("SELECT * FROM `adminHistory` WHERE `action` = 'Added'")){
    $no=$stmt->num_rows;
     $count =0;
    while ($row = $stmt->fetch_assoc()) {
        $count ++;
    echo "<hr>
    <div class='row align-middle'>/t 
    <div class = 'col-md-1'>$count </div>
    <div class='col-md-3'><img src= Images/$row[img] class='square' alt='$row[p_name]'  height ='200' width = '200'></div>
    <div class='col-md-2'>$row[p_name]</div>
    <div class='col-md-1'>$row[category]</div>
    <div class='col-md-1'>$row[dateModified]</div>
    
    </div>";
    }
    
    }else{
    echo $connection->error;
    }
    echo "</div></div>";
    
    
    ?>
    


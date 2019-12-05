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
echo "<hr>
    <div class='row align-middle'>/t 
    <div class = 'col-md-2'><b>Date Modified</b></div>
    <div class='col-md-4'><b>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Image</b></div>
    <div class='col-md-2'><b>Product Name</b></div>
    <div class='col-md-2'><b>Category</b></div>
    <div class='col-md-1'><b>Action</b></div>
    </div>";
if($stmt = $connection->query("SELECT * FROM `adminHistory` order by id desc")){
    $no=$stmt->num_rows;
    
    
    
    while ($row = $stmt->fetch_assoc()) {
        
        
    echo "<hr>
    <div class='row align-middle'>/t 
    <div class = 'col-md-2'>$row[dateModified]</div>
    <div class='col-md-4'><img src= Images/$row[img] class='square' alt='$row[p_name]'  height ='200' width = '200'></div>
    <div class='col-md-2'>$row[p_name]</div>
    <div class='col-md-2'>$row[category]</div>

    <div class='col-md-1'>$row[action]</div>
    
    </div>";
    }
    
    }else{
    echo $connection->error;
    }
    echo "</div></div>";
    
    
    ?>
    


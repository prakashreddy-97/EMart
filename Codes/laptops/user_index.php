<?Php
echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->

    <title>EMart Administrator  </title>";
require "templates/head.php";
echo "<link rel='stylesheet' href='templates/custom.css' type='text/css'>
<style>
.my_div  {
vertical-align: middle;
}
.my_table {width:700px;}
</style>
</head><body>";

require "templates/user_top.php";

require "templates/sidenav2.html";
require "include/config.php";
////////////
echo "<div class='alert alert-danger alert-dismissible fade show' id=msg_display> </div>";

echo "<div class='row'>
<div class='col-md-11 offset-md-1'>";



if($stmt = $connection->query("SELECT * FROM c_table where category='laptops'")){
$no=$stmt->num_rows;
//images display
while ($row = $stmt->fetch_assoc()) {
echo "<b>Laptops</b><hr><div class='row align-middle' id=d_$row[unique_id] >
<div class='col-md-4'><img src=..\Images/$row[img] class='square' alt='$row[p_name] height = '200', width = '200''></div>
<div class='col-md-2'><strong>$row[p_name]</strong></div>

<div class='col-md-2'>$row[price]$</div>
<div class='col-md-1'>$row[description]</div>
<a class='col-md-0' href='/emart/Codes/mycart.html'>Add to Cart</a>
</div>";
}

}else{
echo $connection->error;
}
echo "</div></div>";

/*require "templates/bottom.php";	*/
?>


</body>
</html>
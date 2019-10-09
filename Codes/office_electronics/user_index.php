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



if($stmt = $connection->query("SELECT * FROM officeelectronics")){
$no=$stmt->num_rows;
  
while ($row = $stmt->fetch_assoc()) {
echo "<div class='row align-middle' id=d_$row[p_id] >
<div class='col-md-3'><img src=images/$row[img] class='square' alt='$row[p_name]'></div>
<div class='col-md-2'><strong>$row[p_name]</strong></div>

<div class='col-md-2'>$row[price]$</div>
<div class='col-md-2'>$row[description]</div>
<a class='col-md-0' href='/emart/Codes/emart.html'>Add to Cart</a>
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
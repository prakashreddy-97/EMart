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



if($stmt = $connection->query("SELECT * FROM c_table where category = 'smarthome'")){
  $no=$stmt->num_rows;
    
  while ($row = $stmt->fetch_assoc()) {
    ?>
    <div class = "col-md-3 col-sm-8 my-3 my-md-0">
    <form method = "post" action = "emart.php?action=add&unique_id=<?php echo $row["unique_id"]?>">
  
   
    <hr>
        <div style="border:1px solid #333; background-color:#e6ffe6; border-radius:5px;border-radius: 5px 5px 0 0; padding:10px; margin-left: 50px; text-align:center;">
          <a href = "../productPage.php?id=<?php echo $row["p_id"]; ?>" value = "showProd">
          <img src="../Images/<?php echo $row["img"]; ?>" height ='200' width ='200' id= "prodImg"  /><br />      
      </a>
          <h4 class="text-info" ><?php echo $row["p_name"]; ?></h4>
          <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
         
          <input type = "hidden" name = "unique_id" value = "<php echo $row[unique_id]; ?>">
          <input type = "hidden" name = "hidden_name" value = "<php echo $row[p_name]; ?>">
          <input type = "hidden" name = "hidden_price" value = "<php echo $row[price]; ?>">
         
        </div>
      </form>     
    </div> 
    <?php
  }
  
  }else{
echo $connection->error;
}
echo "</div></div>";

/*require "templates/bottom.php";	*/
?>


</body>
</html>
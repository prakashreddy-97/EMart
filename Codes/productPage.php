<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
?>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   <link rel="stylesheet" href="productPage.css">

   <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="javascript:void(0)" class="closebtn" onclick=openNav()>&#9776;</a></li>
            <li><img src="./Images/newlogo.jpg" height="45" width="40" /></li>
            <li><a href="./emart.php">EMart</a></li>
            <li><a href="./mycart.html">MyCart</a> </li>
            <input type="text" placeholder="Search...">
            <li><a href="./logout.php">Logout</a> </li>
          </ul>
        </div>
      
    </nav>
  </div>
</head>
<body>
<?php

    $data = $_GET['id'];

    $res = mysqli_query($conn, "select * from c_table where p_id = $data");
    $row= mysqli_fetch_array($res);
    ?>
    <div class ="container">
    <div class= "row text-center py-5">
    <div class = "col-md-3 col-sm-6 my-3 my-md-0">      
   
   <img src="Images/<?php echo $row["img"]; ?>" height ='400' width ='400' id= "prodImg"  /><br />
   </div>
   
          <h4 class="text-info" name><?php echo $row["p_name"]; ?></h4>
         
          <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
          <h4 ><?php echo $row["description"]; ?></h4>
          <button type = "submit" class="btn btn-warning my-3"name ="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
       
    </div>
    <?php


?>
     
</body>
</html>
    
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
session_start();
$uname=$_SESSION['username'];
if($uname == ""){
    header('Location: login.html');
}
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");

if (isset($_POST["add"])){
    if(isset($_SESSION["cart"])){ 
        $item_array_id = array_column($_SESSION["cart"], "unique_id");
        
        if(!in_array($_GET["unique_id"],$item_array_id)){
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'unique_id' =>$_GET["unique_id"],
                'item_name'  => $_POST["hidden_name"],
                'product_price' =>$_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
               
            );
            echo '<script>alert("Product is  added to cart")</script>';
            $_SESSION["cart"][$count] = $item_array;
           
            echo '<script>window.location = "emart.php" </script>';

        }else{
            echo '<script>alert("Product is already added to cart")</script>';
        }
       }
        else{
            $item_array = array(
                'unique_id' =>$_GET["unique_id"],
                'item_name'  => $_POST["hidden_name"],
                'product_price' =>$_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }

    }
    if (isset($_GET["action"])){
      if ($_GET["action"] == "delete"){
          foreach ($_SESSION["cart"] as $keys => $value){
              if ($value["product_id"] == $_GET["id"]){
                  unset($_SESSION["cart"][$keys]);
                  echo '<script>alert("Product has been Removed...!")</script>';
                  echo '<script>window.location="Cart.php"</script>';
              }
          }
      }
  }


?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Emart Home Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="emart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
</head>

<body>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
  <!--Start of Tawk.to Script-->

<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5de9c00143be710e1d20cd65/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

  <!--End of Tawk.to Script-->
  
<div class="container">
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">      
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" id ="closebtn" onclick=closeNav()>&times;</a>
      <a href="tablets/user_index.php">Tablets</a>
      <a href="computer&accessories/user_index.php">Computer & Accessories</a>
      <a href="laptops/user_index.php">Laptops</a>
      <a href="mobiles&accessories/user_index.php">Mobiles & Accessories</a>
      <a href="office_electronics/user_index.php">Office Electronics</a>
      <a href="photo&video/user_index.php">Photo & Video</a>
      <a href="smarthome/user_index.php">Smart Home</a>
      <a href="speakers/user_index.php">Speakers</a>
      <a href="tv&video/user_index.php">TV & Video</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="javascript:void(0)" class="closebtn" onclick=openNav()>&#9776;</a></li>
        <li><img src="./Images/newlogo.jpg" height="55" width="55" /></li>
        <li><a href="./emart.php">EMart</a></li>
        <li><a href="./mycart.php">MyCart</a> </li>
        <input type="text" placeholder="Search...">
        <li><a href="./orderhistory.php">Your Orders</a> </li>
        <li><a href="./logout.php" id="log">Logout</a> </li>
      </ul>
    </div>     
  </nav>
</div>
<!--Slide code From Here -->
<!-- 
  <br><br>


  <title>W3.CSS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .mySlides {
      display: none;
    }
  </style>

  <body>

    <h2 class="w3-center">Whats hot?</h2>

    <div class="w3-content" style="max-width:400px">
      <div class="mySlides w3-container w3-red">
        <h1><b>Did You Know?</b></h1>
        <h1><i>Microsoft has launched its new products moments ago!!</i></h1>
      </div>

      <img class="mySlides" src="Images/newlogo.jpg" style="width:100%">

      <div class="mySlides w3-container w3-xlarge w3-white w3-card-4">
        <p><span class="w3-tag w3-yellow">New!</span>
      </div>
      <img class="mySlides" src="Images/newlogo.jpg" style="width:100%">
      <img class="mySlides" src="Images/tg.jpg" style="width:100%">
      <img class="mySlides" src="Images/free.jpg" style="width:100%">
      <img class="mySlides" src="Images/adscopy.jpg" style="width:100%">
    </div>

    <script>
      var slideIndex = 0;
      carousel();

      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > x.length) { slideIndex = 1 }
        x[slideIndex - 1].style.display = "block";
        setTimeout(carousel, 2000);
      }
    </script> -->

    <!-- to here -->
    <div class ="container">
    <div class= "row text-center py-5">  
    <br>
    <?php
      $res = mysqli_query($conn, "select * from c_table ORDER BY rand()");
      if(mysqli_num_rows($res)>0){
      while($row= mysqli_fetch_array($res)){
    ?>
    <div class = "col-md-3 col-sm-8 my-3 my-md-0">
    <form method = "post" action = "emart.php?action=add&unique_id=<?php echo $row["unique_id"]?>">
    <hr>
        <div style="border:1px solid #333; background-color:#e6ffe6; border-radius:5px;border-radius: 5px 5px 0 0; padding:10px; margin-left: 50px; text-align:center;">
          <a href = "productPage.php?id=<?php echo $row["p_id"]; ?>" value = "showProd">
          <img src="Images/<?php echo $row["img"]; ?>" height ='200' width ='200' id= "prodImg"  /><br />      
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
  }
    ?>
    </div>
  <div>

</body>
</html>
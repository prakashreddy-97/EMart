<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
$flag = false;
session_start();
$uname=$_SESSION['username'];
if($uname == ""){
    header('Location: login.html');
}
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
            <li><a href="./mycart.php">MyCart</a> </li>
            <input type="text" placeholder="Search..." >
            <li><a href="./logout.php">Logout</a> </li>
          </ul>
        </div>
      
    </nav>
  </div>
</head>
<body>

  <?php 
if(array_key_exists('add',$_POST)){
        hello();
}
function hello()    
    {   
      $conn = mysqli_connect("localhost","root","");
      mysqli_select_db($conn,"emart");
      $flag = true;
      $uname=$_SESSION['username'];
      $data = $_GET['id'];
      $quantity = $_POST['quantity'];
      $res = mysqli_query($conn, "select * from cart where userName = '$uname' and product_id = $data");
      if(mysqli_num_rows($res)==0){
        $query = "INSERT INTO cart(userName,product_id, quantity) values('$uname',$data ,$quantity)";
        $stmt=$conn->prepare($query);  
        $stmt->execute();
        echo "<script type='text/javascript'>alert('Product added to cart');</script>";    
      }  else{
        $getQuantity = "SELECT quantity from cart WHERE userName = '$uname' and product_id = $data";
        if($getQuantity != $quantity){
          $update = "UPDATE cart SET quantity = $quantity where userName = '$uname' and product_id = $data";
          $stmt=$conn->prepare($update);  
          $stmt->execute();
          echo "<script type='text/javascript'>alert('Product updated in cart');</script>";
        }else{
          echo "<script type='text/javascript'>alert('Product already in cart with same quantity');</script>";  
      }
    }
  }        
?>

<?php

    $data = $_GET['id'];
    $res = mysqli_query($conn, "select * from c_table where p_id = $data");
    $row= mysqli_fetch_array($res);
    ?>
      <div class= "row text-center py-5">
         <div class = "col-md-3 col-sm-6 my-3 my-md-0">      
            <img class = "img" src="Images/<?php echo $row["img"]; ?> " height ='400' width ='400' id= "prodImg"/><br />
         </div>
         <div>
            <h2 class="text-info" name><?php echo $row["p_name"]; ?></h2>
            <h3 class="text-danger">$ <?php echo $row["price"]; ?></h3>
            <h4 ><?php echo $row["description"]; ?></h4>
            <!-- <form met -->
              <form action = "" method = "post">
                  <h4> Quantity: </h4><input type = "number" value = 1 min =1 name ="quantity" style = "width:50px";/>
                  <input type = "submit" class="btn btn-warning my-3" id ="add" name ="add" value = "AddToCart"></input> 
              </form>
  </div>

      </div>      



</body>

</html>   
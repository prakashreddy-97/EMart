<html>
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
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   <link rel="stylesheet" href="mycart.css">

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
            <li><a href="./orderhistory.php">Your Orders</a> </li>
           
            <li><a href="./logout.php">Logout</a> </li>
            
          </ul>
        </div>
      
    </nav>
  </div>
</head>
<body>
<div style="clear: both"></div>
<br/>
  <h2 class ="title2">My Orders</h2>
 
  <div class = "table-responsive">
 
  <?php  
    $uname=$_SESSION['username'];
    $pid;
    $getCustomerIdQuery = "SELECT customerid from customer WHERE emailid = '$uname'";
    $getCustomerId = $conn->query($getCustomerIdQuery);
    if($getCustomerId->num_rows>0){
        while($row = $getCustomerId->fetch_assoc()) {
            $cid = $row["customerid"];
        } 
    }  
    $query = mysqli_query($conn,"select * from customerproducts where customer_id = '$cid' ORDER BY purchaseDate DESC");
    $total =0;
      ?>
      <table class ="table table-bordered" id = "myTable">
    <tr>
        <th width = "25%">Product Image </th>
        <th width = "20%">Product Name </th>
        <th width = 20%> Order Date </th>
        <th width = "10%">Quantity </th>
        <th width = "13%">Price Details </th>
        <th width = "10%">Total Price</th>
    </tr>
    <?php
    while($prodcutData = mysqli_fetch_row($query)){    
    //echo "<script type='text/javascript'>alert('$p_id[0]');</script>";   
    $pid = $prodcutData[2]; 
    $res = mysqli_query($conn, "select * from c_table where p_id = $pid");
  
    if(mysqli_num_rows($res)>0){          
      ?>
       
    <?php
      
    while($row= mysqli_fetch_array($res)){
  ?>
  <tr>
          <td> <img src="Images/<?php echo $row["img"]; ?>" height ='200' width ='200' id= "prodImg"  /><br /> </td>
          <td><?php echo $row["p_name"]; ?></td>
          <td><?php echo $prodcutData[3];?></td>
          <!-- <td><input type="text" value=""  min="1"   style="text-align: center;width:60px; border-radius: 7px;" disabled></td> -->
          <td> <?php echo $prodcutData[4];?></td>
          <td>$ <?php echo $row["price"]; ?></td>
          <td>$ <?php echo $prodcutData[4] * $row["price"];?></td>

        </tr>
        <?php
        $total = $total + ($prodcutData[1]*$row["price"]);
        }
      ?>
      <?php
    }else{
      ?>
      }

      

      <?php
    }
    }
    
  ?>
 
     
</body>

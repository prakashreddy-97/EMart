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
            <input type="text" placeholder="Search...">
            <li><a href="./logout.php">Logout</a> </li>
            
          </ul>
        </div>
      
    </nav>
  </div>
</head>
<body>
<div style="clear: both"></div>
<br/>
  <h2 class ="title2">My Cart Details</h2>
  <?php
  if(isset($_POST['delete']))
  {
    $sql_s = "DELETE FROM cart WHERE  userName = '$uname' and product_id = '".$_POST['p_id']."'";
    $result_s = mysqli_query($conn,$sql_s) ;
    if($result_s == true)
    {
      echo '<script language="javascript">';
      
      echo '</script>';
    }
  }
  ?>
  <div class = "table-responsive">
 
    
  <?php  
    $uname=$_SESSION['username'];
    $query = mysqli_query($conn,"select product_id,quantity from cart where userName = '$uname'");
      $total =0;
      
    while($prodcutData = mysqli_fetch_row($query)){    
    //echo "<script type='text/javascript'>alert('$p_id[0]');</script>";    
    $res = mysqli_query($conn, "select * from c_table where p_id = $prodcutData[0]");
  
    if(mysqli_num_rows($res)>0){  
      ?>
       <table class ="table table-bordered" id = "myTable">
    <tr>
        <th width = "25%">Product Image </th>
        <th width = "20%">Product Name </th>
        <th width = "10%">Quantity </th>
        <th width = "13%">Price Details </th>
        <th width = "10%">Total Price</th>
        <th width = "17%">Remove Item</th>
    </tr>
    <?php
      
    while($row= mysqli_fetch_array($res)){
  ?>
  <tr>
          <td> <img src="Images/<?php echo $row["img"]; ?>" height ='200' width ='200' id= "prodImg"  /><br /> </td>
          <td><?php echo $row["p_name"]; ?></td>

          <!-- <td><input type="text" value=""  min="1"   style="text-align: center;width:60px; border-radius: 7px;" disabled></td> -->
          <td> <?php echo $prodcutData[1];?></td>
          <td>$ <?php echo $row["price"]; ?></td>
          <td>$ <?php echo $prodcutData[1] * $row["price"];?></td>
          <td><form method="post" action = "mycart.php"> <input type="submit" name="delete" id = "delete" value="Delete">
      <input type="hidden" name="p_id" value="<?php echo $prodcutData[0]; ?>">
 </form></td>

        </tr>
        <?php
        $total = $total + ($prodcutData[1]*$row["price"]);
        }
      ?>
       <tr>
          <td colspan = "4" align = "right">Total </td>
          <th align = "right">$ <?php echo $total ?></th>
          <form action = "payment1.php">
          <td><input type="submit" value = "CheckOut" name = "checkout" id ="checkout" /><td>
          </form>
      </tr>
      <?php
    }else{
      ?>
      }

      

      <?php
    }
    }
    
  ?>
 
     
</body>
</html>
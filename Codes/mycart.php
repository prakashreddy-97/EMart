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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Cart Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="mycart.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" /> -->
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
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
      var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = 'https://embed.tawk.to/5d9e0131fbec0f2fe3b8e840/default';
      s1.charset = 'UTF-8';
      s1.setAttribute('crossorigin', '*');
      s0.parentNode.insertBefore(s1, s0);
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
    while($prodcutData = mysqli_fetch_row($query)){    
    //echo "<script type='text/javascript'>alert('$p_id[0]');</script>";    
    $res = mysqli_query($conn, "select * from c_table where p_id = $prodcutData[0]");
  
    if(mysqli_num_rows($res)>0){  
      ?>
     
    <?php
      
    while($row= mysqli_fetch_array($res)){
  ?>
  <tr>
          <td> <a href = "productPage.php?id=<?php echo $row["p_id"]; ?>" value = "showProd">
          <img src="Images/<?php echo $row["img"]; ?>" height ='200' width ='200' id= "prodImg"  /><br />      
      </a><br /> </td>
          <td><?php echo $row["p_name"]; ?></td>

          <!-- <td><input type="text" value=""  min="1"   style="text-align: center;width:60px; border-radius: 7px;" disabled></td> -->
          <td> <?php echo $prodcutData[1];?></td>
          <td>$ <?php echo $row["price"]; ?></td>
          <td>$ <?php echo $prodcutData[1] * $row["price"];?></td>
          <td><form method="post" action = "mycart.php"> <input type="submit" name="delete" id = "delete" value="Delete" >
      <input type="hidden" name="p_id" value="<?php echo $prodcutData[0]; ?>">
 </form></td>

        </tr>
        <?php
        $total = $total + ($prodcutData[1]*$row["price"]);
        }
     
    }else{
      }
      
    }
    ?>
    }
<tr>
    <td colspan = "4" align = "right">Total </td>
    <th align = "right">$ <?php echo $total ?></th>
    <form action = "payment1.php">
      <?php
      if($total ==0){
        ?>
        <td><input type="submit" value = "CheckOut" name = "checkout" id ="checkout" disabled /><td>
          <?php
      }else{
        ?>
        <td><input type="submit" value = "CheckOut" name = "checkout" id ="checkout"/><td>
          <?php
      }
      ?>
    
    </form>
</tr>    
</body>
</html>
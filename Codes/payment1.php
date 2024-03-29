<!DOCTYPE html>
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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  /* padding: 5px 20px 15px 20px; */
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.col-50 input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

#navbar input[type=text]{
  float: right;
  padding: 6px;
  border: none;
  margin-top: 10px;
  margin-right: 60px;
  padding-right: 200px;
  border-radius: 14px;
  font-size: 16px;
}

li:last-child{
  float:right;
}

#drop{
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body><script>
function checkDigit(event) {
  var cardno = /^(?:3[47][0-9]{13})$/;
  if(inputtxt.value.match(cardno))
        {
      return true;
        }
      else
        {
        alert("Not a valid Amercican Express credit card number!");
        return false;
        }
}
</script>
<h2>Fill in the details to place an order</h2>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="store_payment_details.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text"  inpuid="ccnum" pattern=".{14,16}" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <select id = "drop" name = "expmonth">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            <!-- <input type="text" id="expmonth" name="expmonth" placeholder="September" required> -->
            <div class="row">
              <div class="col-50">
                <label for="expyear" >Exp Year</label>
                <select id = "drop" name = "expyear">
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                    <option value="22"> 2022</option>
                    <option value="23"> 2023</option>
                    <option value="24"> 2024</option>
                </select>
                <!-- <input type="number" id="expyear" name="expyear" selectBoxOptions="Canada;Denmark;Finland;Germany;Mexico" required> -->
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="placeorder" value="Place Order" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <!-- <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4> -->
      <table class ="table table-bordered">
      <tr> 
        <th width = 50%>Product </th>
        <th width = 15%>Quantity</th>
        <th width = 35%>Price</th>
     </tr>
     
      <?php  
    $uname=$_SESSION['username'];
    $query = mysqli_query($conn,"select product_id,quantity from cart where userName = '$uname'");
      $total =0;
      
    while($prodcutData = mysqli_fetch_row($query)){    
    //echo "<script type='text/javascript'>alert('$p_id[0]');</script>";    
    $res = mysqli_query($conn, "select * from c_table where p_id = $prodcutData[0]");
  
    if(mysqli_num_rows($res)>0){  
      
    while($row= mysqli_fetch_array($res)){
  ?>
        <tr>
          <td><center><?php echo $row["p_name"]; ?></center></td>
          <td> <center> <?php echo $prodcutData[1];?></center></td>
          <td><center>$ <?php echo $prodcutData[1] * $row["price"];?></center></td>
        </tr>
        
        <?php
      
        $total = $total + ($prodcutData[1]*$row["price"]);
        }
      ?>
      
      <?php
    }else{
      ?>
      <style> 
      table:empty{
        display: none;
      }
      </style>

      <?php
    }
    }
    
  ?>
  <tr>
        
          <td colspan = "2" align = "right">Total </td>
          <th align = "right">$ <?php echo $total ?></th>
  </tr>
  </table>
    </div>
  </div>
</div>

</body>
</html>

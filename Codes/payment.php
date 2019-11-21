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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src=""></script>
</head>
<body>
    <link rel="stylesheet" href="payment.css">
    
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
              <li>
                      <img src = "./images/newlogo.jpg" height="45" width="40" />
                  </li> 
           
                  <li>
                          <a href="./emart.html" style='color:white'>EMart</a>
                      </li>
          <li>
              <a href="./mycart.html" style='color:white'>MyCart</a>
          </li>
          <li>
              <a href="./login.html" style='color:white'>SignIn</a>
          </li>
          <li>
              <a href="./register.html" style='color:white'>Register</a>
          </li>
      </ul>
  </div>
    <div class="paymentform">
            <div class="title">Payment</div>        
        <div class="form">
                <form class="" action="" method="POST">
                    <h2 id="head">Fill your details below</h2>
                    <div class="row">
                      <div class="col-75">
                        <div class="container">
                          <form action="/action_page.php">     
                            <div class="row">
                              <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="firstname" pattern="[A-Za-z]{1,}" placeholder="Enter the name" required>
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="e-mail" required>
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="Enter Address" required>
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" pattern="[A-Za-z]{1,}" placeholder="City" required>
                                <div class="row">
                                  <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" pattern="[A-Za-z]{1,}" placeholder="state" required>
                                  </div>
                                  <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="zip" required>
                                  </div>
                                </div>
                              </div>
                              <div class="col-50">               
                                    <h3>Payment</h3>
                                    <label for="cname">Name on Card</label>
                                    <input type="text" id="cname" name="cardname" placeholder="Name of the Cardholder" required> 
                                    <label for="ccnum">Credit card number</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                    <label for="expmonth">Exp Month</label>
                                    <input type="text" id="expmonth" name="expmonth" placeholder="Month">
                                    <div class="row">
                                      <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="20xx">
                                      </div>
                                      <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="xxx">
                                      </div>
                                    </div>
                                  </div>          
                                </div>
                                <label>
                                  <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                                </label>
                                <input type="submit" value="Place the order" class="btn">
                              </form>
                            </div>
                          </div>
                        </div> 
            </form>
        </div>
    </div>
</body>

</html>
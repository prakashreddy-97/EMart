<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"emart");
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

</head>

<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
      <div class="container">
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
            <li><img src="./Images/newlogo.jpg" height="45" width="40" /></li>
            <li><a href="./emart.php">EMart</a></li>
            <li><a href="./mycart.html">MyCart</a> </li>
            <li><a href="./logout.php">Logout</a> </li>
          </ul>
        </div>
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

    <br>
    <?php
      $res = mysqli_query($conn, "select * from c_table");
      if(mysqli_num_rows($res)>0){
      while($row= mysqli_fetch_array($res)){    
    ?>
    <div class = "col-md-3">
      <form method="POST" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
          <img src="Images/<?php echo $row["img"]; ?>" class="img-responsive" /><br />

          <h4 class="text-info"><?php echo $row["p_name"]; ?></h4>

          <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

          <input type="text" name="quantity" value="1" class="form-control" />

          <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

          <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

          <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

        </div>

      </form>
    <?php
    }
  }
    ?>
    

  </body>

</html>
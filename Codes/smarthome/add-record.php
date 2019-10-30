<?Php
echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->

    <title>EMart.com </title>";
require "templates/head.php";
echo "<link rel='stylesheet' href='templates/custom.css' type='text/css'>
<style>
.my_div  {
vertical-align: middle;
}
.my_table {width:700px;}
</style>
</head><body>";

require "templates/top.php";


require "include/config.php";
////////////
echo "<div class='alert alert-danger alert-dismissible fade show' id=msg_display> </div>";

echo "<br><div class='row'>
<div class='col-md-11 offset-md-1'>";
echo "
<form id='data' method='post' enctype='multipart/form-data'>

<div class='row'>
  <div class='col-sm-2 offset-sm-3'>Name</div>
  <div class='col-sm-2'><input type='text' class='form-control' id='userid' name=p_name placeholder='Product Name'></div>
</div>
<br>
<div class='row'>
  <div class='col-sm-2 offset-sm-3'>Price </div>
  <div class='col-sm-2'><input type='text' class='form-control' id='userid' name=price placeholder='Price'></div>
</div>
<br>
<div class='row'>
  <div class='col-sm-2 offset-sm-3'>Description </div>
  <div class='col-sm-2'><input type='text' class='form-control' id='userid' name=description placeholder='Description...'></div>
</div>
<br>
<div class='row'>
  <div class='col-sm-2 offset-sm-3'>Upload file(Image size should be less than 1Mb)</div>
  <div class='col-sm-4'><input type=file name='file_up'></div>
</div>

<br>
<div class='row'>
  <div class='col-sm-2 offset-sm-3'></div>
  <div class='col-sm-4'><button onclick=\"popUp();\">Submit</button></FORM></div>
</div>

";

echo "</div></div>";

require "templates/bottom.php";	
?>

<script>


  function popUp(){
    var x = document.forms["data"]["p_name"].value;
    var x1 = document.forms["data"]["price"].value;
    var x2 = document.forms["data"]["description"].value;
    var x3 = document.forms["data"]["file_up"].value;
  if (x == ""||x1 == ""|| x2 ==""||x3=="") {
    alert("Please fill all the fields");
  }else{
 alert("Product added");
  }
}
$(document).ready(function() {
/////////// form submission//
$("form#data").submit(function(e) {
 e.preventDefault();    
 var formData = new FormData(this);
 $.ajax({
  url: 'add-recordck.php',
  type: 'POST',
  data: formData,
  dataType: 'json',
  success: function (return_data) {
   if(return_data.validation_status=='T'){
	$('form#data').trigger("reset");
   }
  $("#msg_display").html(return_data.msg);     
  $("#msg_display").show();
  setTimeout(function() { $("#msg_display").fadeOut('slow'); }, 4000);
     },
   cache: false,
   contentType: false,
   processData: false
  });
});
////
})
</script>
</body>
</html>
<?Php
echo "<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->

    <title>EMart Administrator  </title>";
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

echo "<div class='row'>
<div class='col-md-11 offset-md-1'>";

if($stmt = $connection->query("SELECT * FROM tablets")){
$no=$stmt->num_rows;
 
while ($row = $stmt->fetch_assoc()) {
echo "<div class='row align-middle' id=d_$row[unique_id] >
<div class='col-md-3'><img src=images/$row[img] class='square' alt='$row[p_name]'></div>
<div class='col-md-2'>$row[p_name]</div>
<div class='col-md-1'>$row[unique_id]</div>
<div class='col-md-1'>$row[price]</div>
<div class='col-md-1'>$row[description]</div>
<div class='col-md-1'><span id=$row[unique_id] class=del><img src=delete.jpg></span></div>
</div>";
}

}else{
echo $connection->error;
}
echo "</div></div>";

require "templates/bottom.php";	
?>

<script>
$(document).ready(function() {
/////////// form submission//
$('.del').click(function(){
var id=$(this).attr('id');
$.get('delete-record.php',{'unique_id':id,'todo':'delete'},function(return_data){
if(return_data.records_affected == 1){
$("#d_"+id).hide();
// Number of records to decrease by one
var no=parseInt($('#no').html())-1; 
$('#no').html(no);
}	
$("#msg_display").html(return_data.msg);     
$("#msg_display").show();
setTimeout(function() { $("#msg_display").fadeOut('slow'); }, 4000);
},"json");
})
////
})
</script>
</body>
</html>
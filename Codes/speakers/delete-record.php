<?Php
$p_id=$_GET['p_id'];
$todo=$_GET['todo'];
$elements=array("p_id"=>"$p_id","db_status"=>"","msg"=>"","records_affected"=>"");
require "include/config.php"; // Database connection 

/// Collect the file name of image /////
if($stmt = $connection->prepare("SELECT img FROM speakers  WHERE p_id=?")){
  $stmt->bind_param('i',$p_id);
  $stmt->execute();
   
   $result = $stmt->get_result();
   //echo "No of records : ".$result->num_rows."<br>";
   $row=$result->fetch_object();
   $file_name=$row->img;
}else{
  $elements['msg'].=$connection->error;
}
////Delete record from table ///

?>
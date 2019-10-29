<?Php
$unique_id=$_GET['unique_id'];
$todo=$_GET['todo'];
$elements=array("unique_id"=>"$unique_id","db_status"=>"","msg"=>"","records_affected"=>"");
require "include/config.php"; // Database connection 

/// Collect the file name of image /////
if($stmt = $connection->prepare("SELECT img FROM c_table  WHERE unique_id=?")){
  $stmt->bind_param('s',$unique_id);
  $stmt->execute();
   
   $result = $stmt->get_result();
   //echo "No of records : ".$result->num_rows."<br>";
   $row=$result->fetch_object();
   $file_name=$row->img;
}else{
  $elements['msg'].=$connection->error;
}
////Delete record from table ///
$query="DELETE FROM mobilesandaccessories WHERE unique_id=?";
$stmt = $connection->prepare($query);
if ($stmt) {
$stmt->bind_param('s', $unique_id);
$stmt->execute();
$elements['msg'].=" Record Deleted <br>";
$elements['records_affected']=$stmt->affected_rows;
}else{
$elements['msg'].=$connection->error;
}
/////


///
if($elements['records_affected']==1){
	if(@unlink("images/$file_name")) {$elements['msg'].=" File Deleted "; }
else{$elements['msg'].=" File Not Deleted ";}
}
/// Post back data /////

$elements['db_status']="True";
echo json_encode($elements);
?>
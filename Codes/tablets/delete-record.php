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


if($stmt = $connection->prepare("SELECT p_name FROM c_table  WHERE unique_id=?")){
  $stmt->bind_param('s',$unique_id);
  $stmt->execute();
   
   $result = $stmt->get_result();
   $row=$result->fetch_object();
   $p_name=$row->p_name;
}else{
  $elements['msg'].=$connection->error;
}

$date = date("Y-m-d");
$historyQuery = "INSERT INTO adminHistory(p_name,`action`,img,category,dateModified) values('$p_name','Deleted','$file_name','tablets','$date')";
$stmt2 = $connection->prepare($historyQuery);
$stmt2->execute();


$query = "DELETE FROM c_table WHERE unique_id=? and category ='tablets'";
$stmt = $connection->prepare($query);
// $stmt2 = $connection->prepare($query2);
if ($stmt) {
$stmt->bind_param('s', $unique_id);
$stmt->execute();
// $stmt2->bind_param('s', $unique_id);
// $stmt2->execute();
$elements['msg'].=" Record Deleted <br>";
$elements['records_affected']=$stmt->affected_rows;

header("Refresh:0");
}else{
$elements['msg'].=$connection->error;
}
/////


///
if($elements['records_affected']==1){
	if(@unlink("..\Images/$file_name")) {$elements['msg'].=" File Deleted "; }
else{$elements['msg'].=" File Not Deleted ";}
}
/// Post back data /////

$elements['db_status']="True";
echo json_encode($elements);
?>
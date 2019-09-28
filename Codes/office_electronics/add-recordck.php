<?Php
$p_name=$_POST['p_name'];
$price=$_POST['price'];
$elements=array("msg"=>"","records_affected"=>"","validation_status"=>"T");

//Check price format 
if(!filter_var($price,FILTER_VALIDATE_FLOAT)){
$elements['msg'].=" Enter Price details <br>";	
$elements['validation_status']="F";
}

// Check Product Name
if(!ctype_alpha(str_replace(' ', '', $p_name)) === true){
$elements['msg'].=" Enter Product Name without Special Chars <br>";		
$elements['validation_status']="F";	
}	

// Check file type
if (!($_FILES[file_up][type] =="image/jpeg" OR $_FILES[file_up][type] =="image/gif"))
{$elements['msg'].="Your uploaded file must be of JPG or GIF. ";
$elements['msg'].="Other file types are not allowed<BR>";
$elements['validation_status']="F";	
}

// Check file size 
if ($_FILES[file_up][size]>250000){
$elements['msg'].="Your uploaded file size is more than 250KB ";
$elements['msg'].=" so please reduce the file size and then upload.<BR>";
$elements['validation_status']="F";	
}

$file_name=$_FILES[file_up][name];// 


if($elements['validation_status']=="T"){

// the path with the file name where the file will be stored
$add="C:/xampp/htdocs/EMart/Codes/office_electronics/images/$file_name"; 
if(move_uploaded_file ($_FILES[file_up][tmp_name], $add)){
$elements['msg'].=" File successfully uploaded.<BR>";
// Insert record to table with file name///
require "include/config.php"; // Database connection 
$query="INSERT INTO officeelectronics (p_name,price,img) values('$p_name','$price','$file_name')";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("ss", $p_name,$file_name);
if($stmt->execute()){
$elements['msg'].= "Records added : ".$connection->affected_rows;
$elements['msg'].= "<br>Product ID : ".$connection->insert_id;
}else{
$elements['validation_status']="F";		
$elements['msg'].="Database error : ". $connection->error;
}
}else{
$elements['validation_status']="F";		
$elements['msg'].="Database error : ". $connection->error;
}
// End of insert record with file name ///
}else{ // file upload by move_uploaded_file
$elements['msg'].="Failed to upload file Contact Site admin to fix the problem";
$elements['validation_status']="F";	
}// file upload by move_uploaded_file

}// if validation_status is equal to T	 

echo json_encode($elements);
?>

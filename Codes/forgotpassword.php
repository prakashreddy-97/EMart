//PHP code for forgot password

if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$sql = "SELECT * FROM `login` WHERE username = '$username'";
	$res = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}


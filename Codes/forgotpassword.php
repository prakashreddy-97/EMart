<<<<<<< HEAD
<h2 class="form-signin-heading">Forgot Password</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
	<br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Forgot Password</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
=======
//PHP code for forgot password
<?php
	if(!empty($_POST["forgot-password"])){
		$conn = mysqli_connect("localhost", "root", "", "blog_samples");
		
		$condition = "";
		if(!empty($_POST["user-login-name"])) 
			$condition = " member_name = '" . $_POST["user-login-name"] . "'";
		if(!empty($_POST["user-email"])) {
			if(!empty($condition)) {
				$condition = " and ";
			}
			$condition = " member_email = '" . $_POST["user-email"] . "'";
		}
		
		if(!empty($condition)) {
			$condition = " where " . $condition;
		}

		$sql = "Select * from members " . $condition;
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {
			require_once("forgot-password-recovery-mail.php");
		} else {
			$error_message = 'No User Found';
		}
	}
?>

>>>>>>> 893ab128786ad9870ddbd1752fd9f3cf7fdb04e5

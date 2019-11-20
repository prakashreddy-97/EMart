  
<?php
	session_start();
		// if(isset($_SESSION['name']))
		// {
		// unset($_SESSION['name']);
		// }
        
        // header( url=login.html');
		// echo "<h3>".'Signed out successfully'."</h3>";
	if(session_destroy()) {
		header("Location: login.html");
		}
?>
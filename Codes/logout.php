  
<?php
		if(isset($_SESSION['name']))
		{
		unset($_SESSION['name']);
		}
        
        header('Refresh: 2; url=login.html');
        echo "<h3>".'Signed out successfully'."</h3>";
?>
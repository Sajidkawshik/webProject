<?php
session_start();
	if(isset($_SESSION['user_id']))
	{
		//echo "Welcome ".$_SESSION['user_id'];
	}
	else
	{
		header('Location: admin.html');
	}

	echo '<a href="http://localhost/webProject/final_login/logout.php">logout</a>';
?>
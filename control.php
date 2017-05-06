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

	include_once('logout.html');
?>
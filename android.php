<?php
$name=(isset($_POST['name'])) ? $_POST['name']:'';
//echo $name;
//echo "faltu";
//$name="kawshik sajid";
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$tok=strtok($name," ");
echo $tok;
$sql = "SELECT * FROM du WHERE fname='$tok'";
 
 
	    $res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		//echo $row[1];
		if( $row[0] > 0 )
		 echo "Verified user";
		else
		 echo "faltu user";		
?> 
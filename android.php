<?php
$name=(isset($_POST['name'])) ? $_POST['name']:'nu:- faltu';
//echo $name;
//echo "faltu";
//$name="kawshik sajid";
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name

$conn=mysqli_connect('localhost','duvehicle','duvehicle','duvehicle');
$tok=strtok($name,":- ");
while ($tok !== false) {
    //echo "Word=$tok<br />";
    $tok = strtok(":- ");
}
echo $tok;
$sql = "SELECT * FROM reg_du WHERE car_no='$tok'";
//$sql1 = "SELECT * FROM reg_non_du WHERE car_no='$tok'";

	    $res = mysqli_query($conn,$sql);
		//$res1 = mysqli_query($conn,$sql1);
		$row = mysqli_fetch_array($res);
		//$row1 = mysqli_fetch_array($res1);
		//echo $row[1];
		if( $row[0] > 0 )
		 echo "Verified DU user";
		//else if($row1[0] > 0)
		 //echo "Verified Non DU user";
		else
			echo "Invalid user";
?> 
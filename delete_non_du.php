<?php 
// connect to datebase require "episodelist.db.php";
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name

//$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$conn=mysqli_connect('localhost','duvehicle','duvehicle','duvehicle');

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 // delete data in mysql database
 //echo $_GET['user'];
 //$id=$_GET['user'];
 //echo $id;
 $licse_no=$_GET['licse_no'];
 $pql="SELECT * FROM non_du WHERE licse_no='$licse_no'"; 
 $query=mysqli_query($conn,$pql);
 $row = mysqli_fetch_array($query);
 //echo "faltu";
 //echo $row[2];
 $mql= "INSERT INTO reg_non_du VALUES ('','$row[1]', '$row[2]', '$row[3]','$row[4]','$row[5]','$row[6]','$row[7]',
 '$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]','$row[14]')";
 $query=mysqli_query($conn,$mql);
 if(mysqli_query($conn, $query))
{
    echo "Records updated successfully.";
}

/////////// data delete///////////////

 $sql="DELETE FROM non_du WHERE licse_no='$licse_no'";
 $result=mysql_query($sql);
 // if successfully updated. 
 if(mysqli_query($conn, $sql))
{
    echo "Records were deleted successfully.";
	header("Location:myqrcode/temporary1.php?fname=$row[1]&lname=$row[2]&email=$row[3]&con_add=$row[6]&blood=$row[8]&contact=$row[9]&license=$row[11]&car=$row[12]");
}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 mysqli_close($conn); 
 ?>
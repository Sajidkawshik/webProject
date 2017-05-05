<?php 
// connect to datebase require "episodelist.db.php";
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 // delete data in mysql database
 //echo $_GET['user'];
 $id=$_GET['user'];
 echo $id;
 $pql="SELECT * FROM du WHERE fname='$id'"; 
 $query=mysqli_query($conn,$pql);
 $row = mysqli_fetch_array($query);
 echo $row[2];
 $mql= "INSERT INTO reg_du VALUES ('','$row[1]', '$row[2]', '$row[3]','$row[4]','$row[5]','$row[6]','$row[7]',
 '$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row[13]')";
 $query=mysqli_query($conn,$mql);
 if(mysqli_query($conn, $query))
{
    echo "Records updated successfully.";
}

/////////// data delete///////////////

 $sql="DELETE FROM du WHERE fname='$id'";
 $result=mysql_query($sql);
 // if successfully updated. 
 if(mysqli_query($conn, $sql))
{
    echo "Records were deleted successfully.";
	header("Location:myqrcode/temporary.php?fname=$row[1]&lname=$row[2]&con_add=$row[6]&blood=$row[8]&contact=$row[9]&license=$row[10]&car=$row[11]");
}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 mysqli_close($conn); 
 ?>
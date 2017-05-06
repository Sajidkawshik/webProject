<?php
      
    function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
		   case 'image/jpg': return '.jpg';
           default: return false;
       }
     }
	  
	  
	  //$conn = mysql_connect('localhost', 'root', '');
	  //$db   = mysql_select_db('webpro');
	  $conn=mysqli_connect('localhost','duvehicle','duvehicle','duvehicle');
	  
	  $fname =  $_POST["firstname"];
	  $lname =  $_POST["lastname"];
	  $email=   $_POST["email"];
	  $department=$_POST["department"];
	  $occupation=$_POST["occupation"];
	  $contactaddress=$_POST["companyaddress"];
	  $residentialaddress=$_POST["residentialaddress"];
	  $carnumber=$_POST["carnumber"];
	  $contactnumber=$_POST["phonenumber"];
	  $licensenumber=$_POST["licensenumber"];
	  //$image=$_POST["photo"];
	  $valid_upto=$_POST["valid_upto"];
	  $blood_group=$_POST["blood"];
	  //$file_name=$_FILES["uploadedimage"]["name"];
	
	  if (!empty($_FILES["uploadedimage"]["name"])) 
{
	$file_name=$_FILES["uploadedimage"]["name"];
	//echo $file_name;
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	
	//$imagename=date("d-m-Y")."-".time().$ext;
	$imagename=$licensenumber.$ext;
	$target_path = "images/".$imagename;
	chmod($target_path, 777);
	$image="images";
	

if(move_uploaded_file($temp_name, $target_path)) {

 	//$query_upload="INSERT into du('image','image_path') values ('$imagename','$target_path')";
	//mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
	
}
else{

   exit("Error While uploading image on the server");
} 

}
 
	  $sql = "INSERT INTO du VALUES('','$fname', '$lname','$email','$department',
				'$occupation','$contactaddress','$residentialaddress','$blood_group',
				'$contactnumber','$licensenumber','$carnumber','$valid_upto','$imagename','$image')";
	  if( mysql_query($sql) )
	{
	  header('Location: success_message.htnl');
	}
	  else
	   echo "regestration  Failed";
?>
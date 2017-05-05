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
	  
	  
	  $conn = mysql_connect('localhost', 'root', '');
	  $db   = mysql_select_db('webpro');
 
	  $fname =  $_POST["firstname"];
	  $lname =  $_POST["lastname"];
	  $email=   $_POST["email"];
	  $company=$_POST["company"];
	  $occupation=$_POST["occupation"];
	  $company_address=$_POST["companyaddress"];
	  $residentialaddress=$_POST["residentialaddress"];
	  $city=$_POST["city"];
	  $car_number=$_POST["carnumber"];
	  $contact_number=$_POST["phonenumber"];
	  $license_number=$_POST["licensenumber"];
	  $valid_upto=$_POST["valid_upto"];
	  $blood_group=$_POST["blood"];
	  if (!empty($_FILES["uploadedimage"]["name"])) 
{
	$file_name=$_FILES["uploadedimage"]["name"];
	echo $file_name;
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$target_path = "nondu_images/".$imagename;
	$image="nondu_images";
	

if(move_uploaded_file($temp_name, $target_path)) {

 	//$query_upload="INSERT into du('image','image_path') values ('$imagename','$target_path')";
	//mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error());  
	
}
else{

   exit("Error While uploading image on the server");
} 

}
 
	  $sql = "INSERT INTO non_du VALUES('','$fname', '$lname','$email','$occupation',
				'$company','$company_address','$residentialaddress','$blood_group','$city',
				'$contact_number','$license_number','$car_number','$valid_upto','$imagename','$image')";
	  if( mysql_query($sql) )
	{
	  echo "registered Successfully\n";
	}
	  else
	   echo "regestration  Failed";
?>
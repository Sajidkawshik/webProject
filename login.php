<?php
	//$conn=mysqli_connect('localhost','root',"","webpro");
	$conn=mysqli_connect('localhost','duvehicle','duvehicle','duvehicle');
	if($conn->connect_errno>0)
		echo "not connected";
	if(isset($_POST["uname"], $_POST["psw"])) 
    {     

        $user_name = $_POST["uname"]; 
        $password = $_POST["psw"]; 
		
		$sql= "SELECT * FROM admin WHERE (username = '".$user_name."' AND  password = '".$password."');";
		$result1 = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result1) == 1 )
        { 
			$row = mysqli_fetch_array($result1);
			session_start();
            $_SESSION["login_status"]=true; 
            $_SESSION["user_id"] = $row['username'];
			header('Location: display_du_requests.php');
        }
        else
        {
            echo 'The username or password is incorrect!';
        }
	}
	//mysqli_close($conn);
?>
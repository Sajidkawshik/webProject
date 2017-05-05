<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>

<?php
$conn=mysqli_connect('localhost', 'root',"","webpro");
$query = "SELECT * FROM du ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
     echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Occupation</th></tr>";
     while($row = $result->fetch_assoc()) {
		 $name="faltu";
         echo "<tr><td>" . $row["index"]. "</td><td>" . $row["fname"]. " " . $row["lname"]. "</td><td>". $row["email"]."</td><td>". $row["department"]. "</td><td>". $row["designation"]."</td><td>"."<a href='".$name."'>verified</a>"."</td></tr>";
		 
		 //echo "<a href='".$name."'>Enter</a>";
		 //echo file_get_contents("form.html");
		 //include_once("form.html");
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>
</html>
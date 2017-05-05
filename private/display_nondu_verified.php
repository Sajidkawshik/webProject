<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name
include_once('search4.html');

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM reg_non_du';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	
	<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>



<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="http://localhost/webProject/display_du_requests.php">Requests from DU</a>
  <a href="http://localhost/webProject/display_nondu_requests.php">Requests from NON_DU</a>
  <a href="http://localhost/webProject/display_du_verified.php">DU_verified</a>
  <a href="http://localhost/webProject/display_nondu_verified.php">Non_DU_verified</a>
                
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Show Menu</span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>


	<h1>Table 2</h1>
	<table class="data-table">
		<caption class="title">Vrified Non-DU </caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>Name</th>
				<th>email</th>
				<th>Occupation</th>
				<th>company</th>
				<th>Company address</th>
				<th>residential address</th>
				<th>Blood Group</th>
				<th>city</th>
				<th>Contact Number</th>
				<th>license Number</th>
				<th>Car Number</th>
				<th>valid upto</th>
				<th>Image</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$index	= 1;
		while ($row = mysqli_fetch_array($query))
		{
			$name="delete.php";
			$username=$row['fname'];
			//echo $username;
			$dir=$row['target_path'];
			$file=$row['image_name'];
			echo '<tr>
					<td>'.$index.'</td>
					<td>'.$row['fname'].' '.$row['lname'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['occupation'].'</td>
					<td>'.$row['company'].'</td>
					<td>'.$row['com_add'].'</td>
					<td>'.$row['res_add'].'</td>
					<td>'.$row['blood'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['contact_no'].'</td>
					<td>'.$row['licse_no'].'</td>
					<td>'.$row['car_no'].'</td>
					<td>'. date('F d, Y', strtotime($row['valid_upto'])) . '</td>
					<td>'.'<img src="', $dir, '/', $file, '" alt="', $file, 'height="100" width="100""/>'.'</td>
					</tr>';
			$index++;
		}?>
		</tbody>
	</table>
</body>
</html>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'webpro'; // Database Name

//$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$conn=mysqli_connect('localhost','duvehicle','duvehicle','duvehicle');

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}
$id=$_POST['search'];
$sql ="SELECT * FROM reg_du WHERE licse_no='$id'";

		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
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

	<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">Sales Data of Electronic Division</caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>Name</th>
				<th>email</th>
				<th>Department</th>
				<th>Occupation</th>
				<th>contact address</th>
				<th>residential address</th>
				<th>Blood Group</th>
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
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			$name="delete.php";
			$username=$row['fname'];
			//echo $username;
			$dir=$row['target_path'];
			$file=$row['image_name'];
			//$amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
			//  <td> <a href='.$name.'>verified</a></td>
			/* <td><a class="button" href="<?php echo base_url();?>delete.php/<?php echo $row->id;?>Delete</a></td>*/
			/*<td> <a href="delete.php?user=<?php echo $username; ?>">verified</a></td>*/
			echo '<tr>
					<td>'.$index.'</td>
					<td>'.$row['fname'].' '.$row['lname'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['department'].'</td>
					<td>'.$row['designation'].'</td>
					<td>'.$row['con_add'].'</td>
					<td>'.$row['res_add'].'</td>
					<td>'.$row['blood'].'</td>
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
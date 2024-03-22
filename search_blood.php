<?php
	require_once 'connection.php';

	$sql = "SELECT * FROM `tbl_donors` WHERE STATUS = 0";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	$end = $data['Endstamp'];
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		if (date("Y-m-d") < $end) {
			$update = "UPDATE tbl_donors SET STATUS = 1 WHERE STATUS = 1";
			mysqli_query($conn, $update);
		}
		else {
			$update = "UPDATE tbl_donors SET STATUS = 1 WHERE STATUS = 0";
			mysqli_query($conn, $update);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Search</title>
	<link rel="icon" href="assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/search.css">
</head>
<body>

	<header>
		<a href="index.php">
			<button class="btn-back">
				Back
			</button>
		</a>

		<form action="" method="post">
		<select name="group" class="box-select">
			<option>Required Blood Group</option>
			<option value="AB+">AB+</option>
			<option value="AB">AB-</option>
			<option value="A+">A+</option>
			<option value="A-">A-</option>
			<option value="O+">O+</option>
			<option value="O-">O-</option>
			<option value="B+">B+</option>
			<option value="B-">B-</option>
		</select>

		<input type="text" name="place" placeholder="Enter the place">
		<label for="submit"><i class="fas fa-search"></i></label>
		<input type="submit" name="submit" id="submit">
		</form>
		<h2>Search Donors</h2>
		<p class="p">Here You Can Search Donors</p>
	</header>

		<?php

			require_once 'connection.php';

			if (isset($_POST['submit'])) 
			{
				$bloodKey = $_POST['group'];
				$searchKey = $_POST['place'];
				
				$sql = "SELECT * FROM tbl_donors WHERE  BLOOD_GROUP LIKE '$bloodKey' AND PLACE LIKE '%$searchKey' AND STATUS = 1";
			}
			else
			{
				$sql = "SELECT * FROM tbl_donors WHERE STATUS = 1";
				$searchKey = "";
			}
				
			$result = mysqli_query($conn,$sql);

		?>

	
		<center>
		<table>
			<tr class="head">
				<th>#</th>
				<th>Name</th>
				<th>Blood Group</th>
				<th>Gender</th>
				<th>Mobile No</th>
				<th>Place</th>
			</tr>
			<?php
				$sn = 1;
				while ($row = mysqli_fetch_assoc($result)) 
				{
					echo "<tr>";
						echo "<td>$sn</td>";
						echo "<td>".$row['NAME']."</td>";
						echo "<td>".$row['BLOOD_GROUP']."</td>";
						echo "<td>".$row['GENDER']."</td>";
						echo "<td>".$row['MOBILE_NO']."</td>";
						echo "<td>".$row['PLACE']."</td>";
					echo "</tr>";
					$sn++;
				}
			?>
		</table>
		</center>


	<script type="text/javascript" src="assets/js/all.js"></script>
</body>
</html>
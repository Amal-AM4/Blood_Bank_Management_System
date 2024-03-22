<?php
	session_start();
	require_once '../connection.php';

	if (isset($_SESSION['HID'])) 
	{
		$USER_ID = $_SESSION['HID'];
		$sql = "SELECT * FROM `tbl_hospital` WHERE HOS_ID = '$USER_ID'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" href="../assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/home_hos.css">
</head>
<body>

	<header>
		<h2>Welcome <?php echo $data['DR_NAME'];?></h2>
		<a href="log-out.php">Log Out</a>
	</header>
		<br>
		<?php

			if (isset($_POST['sub'])) 
			{
				$searchKey = $_POST['search'];

				$query = "SELECT * FROM `tbl_donors` WHERE PLACE LIKE '%$searchKey' OR BLOOD_GROUP LIKE '%$searchKey'";
				
			}
			else
			{
				$query = "SELECT * FROM `tbl_donors`";
			}

			$store = mysqli_query($conn,$query);
		?>
		<form action="" method="post">
			<input type="text" name="search" placeholder="Place/Blood group" class="searchBox"><button name="sub" class="btn-search">Search</button>
		</form>
		<table>
				<tr class="thead">
					<th>#</th>
					<th>NAME</th>
					<th>MAIL ID</th>
					<th>BG</th>
					<th>GENDER</th>
					<th>MOBILE NO</th>
					<th>PLACE</th>
				</tr>
				<?php
					$sn = 1;
					while ($row = mysqli_fetch_assoc($store)) 
					{

						echo "<tr class='second'>";
							echo "<td>$sn</td>";
							echo "<td>".$row['NAME']."</td>";
							echo "<td>".$row['MAIL']."</td>";
							echo "<td>".$row['BLOOD_GROUP']."</td>";
							echo "<td>".$row['GENDER']."</td>";
							echo "<td>".$row['MOBILE_NO']."</td>";
							echo "<td>".$row['PLACE']."</td>";
						echo "</tr>";
						$sn ++;
					}
				?>
			</table>
	

</body>
</html>

<?php
	}
	else
	{
		header('location:index.php');
	}
?>
<?php
	session_start();
	require_once '../connection.php';

	if (isset($_SESSION['ID'])) 
	{
		$USER_ID = $_SESSION['ID'];
		$sql = "SELECT * FROM `tbl_admin` WHERE USER_ID = '$USER_ID'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);
?>
<!-- Container zone -->

<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
	<link rel="icon" href="../assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/hospital.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/aos.css">
</head>
<body>

	<div class="container">
		<div class="side-left">
			<?php 
				include_once 'includes/sidebar.php';
			?>
		</div>
		<div class="side-right">
			<?php 
				include_once 'includes/header.php';
			?><br>
			<form action="add_hos.php" method="POST" data-aos="fade-down" data-aos-delay="300">
			<div class="data-box">
				<div>
					<p>Hospital Name</p>
					<input type="text" name="name">
				</div>
				<div>
					<p>Doctor Name</p>
					<input type="text" name="user">
				</div>
				<div>
					<p>Hospital ID</p>
					<input type="text" name="user_id">
				</div>
				<div>
					<p>Password</p>
					<input type="password" name="password">
				</div>
				<div>
					<input type="submit" name="submit" value="Insert">
				</div>
			</div>
			</form>

			<div class="table-box">
				<table data-aos="fade-down" data-aos-delay="350">
					<tr class="thead">
						<th>ID</th>
						<th>HOSPITAL NAME</th>
						<th>DOCTOR NAME</th>
						<th>HOSPITAL ID</th>
						<th>PASSWORD</th>
						<th>DELECT</th>
					</tr>
				<?php

					$sl = 1;
					$sql = "SELECT * FROM tbl_hospital";
					$data = mysqli_query($conn,$sql);
					
					while($row = mysqli_fetch_assoc($data))
					{
						echo '<tr class="second">';
							echo '<td>'.$sl.'</td>';
							echo '<td>'.$row["HOS_NAME"].'</td>';
							echo '<td>'.$row["DR_NAME"].'</td>';
							echo '<td>'.$row["HOS_ID"].'</td>';
							echo '<td>'.$row["PASSWORD"].'</td>';
							echo '<td><a href="del_hos.php?id='.$row['ID'].'" class="btn-danger">Delete</a></td>';
						echo '</tr>';
						$sl++;
					}
				?>
					
				</table>
			</div>
		
		</div>
	</div>

	

	

	<script type="text/javascript" src="../assets/js/all.js"></script>
	<script type="text/javascript" src="../assets/js/aos.js"></script>
	<script>
        AOS.init();
	</script>
</body>
</html>

<!-- Container zone ends -->
<?php
	}
	else
	{
		header('location:index.php');
	}
?>
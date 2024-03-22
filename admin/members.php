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
	<link rel="stylesheet" type="text/css" href="../assets/css/members.css">
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
			?> <br>
			<h2 data-aos="fade-down" data-aos-delay="300">List of donors</h2>

			<?php
				if (@$_GET['Success']==true)
				{
			?>
					<p class="alert"><?php echo $_GET['Success']; ?></p>
			<?php
				}
			?>

			<table data-aos="fade-down" data-aos-delay="350">
				<tr class="thead">
					<th>#</th>
					<th>NAME</th>
					<th>MAIL ID</th>
					<th>PASSWORD</th>
					<th>BG</th>
					<th>GENDER</th>
					<th>MOBILE NO</th>
					<th>PLACE</th>
					<th>STATUS</th>
					<th>ACTION</th>
				</tr>
				<?php
					$sn = 1;
					$query = "SELECT * FROM `tbl_donors` ORDER BY `DONORS_ID` ASC";
					$store = mysqli_query($conn,$query);

					while ($row = mysqli_fetch_assoc($store)) 
					{

						echo "<tr class='second'>";
							echo "<td>$sn</td>";
							echo "<td>".$row['NAME']."</td>";
							echo "<td>".$row['MAIL']."</td>";
							echo "<td>".$row['LIC_NO']."</td>";
							echo "<td>".$row['BLOOD_GROUP']."</td>";
							echo "<td>".$row['GENDER']."</td>";
							echo "<td>".$row['MOBILE_NO']."</td>";
							echo "<td>".$row['PLACE']."</td>";
							echo "<td>".$row['STATUS']."</td>";
							echo "<td><a href='delect_donor.php?id=".$row['DONORS_ID']."'><i class='far fa-trash-alt'></i></a></td>";
						echo "</tr>";
						$sn ++;
					}

				?>
			</table>
		
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
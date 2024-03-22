<?php
	session_start();
	require_once '../connection.php';

	if (isset($_SESSION['ID'])) 
	{
		$USER_ID = $_SESSION['ID'];
		$sql = "SELECT * FROM `tbl_freelancer` WHERE USER_NAME = '$USER_ID'";
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
			<h2 class="title" data-aos="fade-down" data-aos-delay="350">Welcome <?php echo $data['USER_TYPE'];?></h2>
			<p class="about" data-aos="fade-down" data-aos-delay="400">Here we keep every details.</p>

			<div class="box">
				<div class="little-box" data-aos="fade-down" data-aos-delay="500">
					<center>
						<p>Donors</p>
						<p>
							<?php
								$SQL = "SELECT * FROM `tbl_donors`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>
						</p>
					</center>
				</div>
				<div class="little-box" data-aos="fade-down" data-aos-delay="500">
					<center>
						<p>Hospitals</p>
						<p>
							<?php
								$SQL = "SELECT * FROM `tbl_hospital`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>
						</p>
					</center>
				</div>
				<div class="little-box" data-aos="fade-down" data-aos-delay="500">
					<center>
						<p>Request</p>
						<p>
							<?php
								$SQL = "SELECT * FROM `tbl_request`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>
						</p>
					</center>
				</div>
			</div>
		
		</div>
	</div>

	

	

	<script type="text/javascript" src="../assets/js/all.js"></script>
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
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
	<link rel="stylesheet" type="text/css" href="../assets/css/view_fb.css">
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
			<h2 data-aos="fade-down" data-aos-delay="300">INBOX</h2>

			<div class="biff-box" data-aos="fade-down" data-aos-delay="350">
				
				<?php
					$id = $_GET['id'];
					$insert = "SELECT * FROM `tbl_feedback` WHERE ID = '$id'";
					$store = mysqli_query($conn, $insert);

					while($row = mysqli_fetch_assoc($store))
					{
				?>
					<h1 class="header"><?php echo $row['NAME'];?></h1>
					<p class="h2"><?php echo $row['MAIL'];?></p>
					<p class="h3">Message : <?php echo $row['MESSAGE'];?></p>
					<p class="footer">Message Received at <?php echo $row['LOGS'];?></p>
				<?php
					}
				?>

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
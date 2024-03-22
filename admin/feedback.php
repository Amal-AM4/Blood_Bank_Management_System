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
	<link rel="stylesheet" type="text/css" href="../assets/css/message.css">
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
			<h2 data-aos="fade-down" data-aos-delay="300">User's Feed back</h2>
			<?php
				if (@$_GET['Success']==true)
				{
			?>
					<p class="alert"><?php echo $_GET['Success']; ?></p>
			<?php
				}
			?>

			<div class="inboxz-box">
				<?php
					$query = "SELECT * FROM `tbl_feedback` ORDER BY `tbl_feedback`.`ID` ASC";
					$store = mysqli_query($conn, $query);

					while ($row = mysqli_fetch_assoc($store)) 
					{
				?>
						<div class="inbox" data-aos="fade-down" data-aos-delay="350">
							<div class="left">
								<span class="title"><?php echo $row['NAME'];?> : </span>
								<span class="mess"><?php echo substr($row['MESSAGE'],0,33);?>...</span>
							</div>
							<div class="right">
								<a class="eye" href="view_fb.php?id=<?php echo $row['ID'];?>">
									<i class="far fa-eye"></i>
								</a>
								<a href="del_fb.php?id=<?php echo $row['ID'];?>">
									<i class="far fa-trash-alt"></i>
								</a>
							</div>
						</div>
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
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
	<link rel="stylesheet" type="text/css" href="../assets/css/send.css">
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

			<div class="display-box" data-aos="fade-down" data-aos-delay="350">
				<form action="send_mail.php" method="post">
					<p>USERNAME</p>
					<p><input type="text" name="userName" placeholder="NAME"></p>
					<p>MAIL</p>
					<p><input type="mail" name="userEmail" placeholder="MAIL"></p>
					<p>SUBJECT</p>
					<p><input type="text" name="subject" placeholder="MAIL"></p>
					<p>Message</p>
					<textarea placeholder="MESSAGE...." name="content"></textarea><br>
					<button name="send">SEND</button>
				</form>
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
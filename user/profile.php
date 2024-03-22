<?php

	session_start();
	require_once '../connection.php';


	if (isset($_SESSION['UID'])) 
	{
		$USER_ID = $_SESSION['UID'];
		$sql = "SELECT * FROM `tbl_donors` WHERE MAIL = '$USER_ID'";
		$result = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($result);

?>

<!--Container zone-->
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="icon" href="../assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/user_home.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/profile.css">
</head>
<body>


	<div class="wrapper">
		<div class="display-box">

			<div class="header-bar">

				<?php
					echo "<img src='../".$data['PHOTO']."' class='img-fluid'>"; 
				?>
				<img src="../assets/images/icon1.png" class="brand">
				<div class="dropdown">
					
					<ul>
						<li class="h2">
							<?php echo $data['NAME'];?>
							<ul>
								<li class="link"><a href="profile.php"><i class="fas fa-user-tie"></i>Profile</a></li>
								<li class="link"><a href="user_log_out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>



			</div>

			<div class="profile-body">
				<h2 id="status">Profile Status : <?php 
				if ($data['STATUS'] == 1) 
				{
					echo "Active";
				}
				else
				{
					echo "Deactive";
				}
				?></h2>
				<h3>Email : <?php echo $data['MAIL'];?></h3>
				<h3>DOB : <?php echo $data['DOB'];?></h3>
				<h3>Gender : <?php echo $data['GENDER'];?></h3>
				<h3>Blood Group : <?php echo $data['BLOOD_GROUP'];?></h3>
				<h3>Mobile No : <?php echo $data['MOBILE_NO'];?></h3>
				<h3>Place : <?php echo $data['PLACE'];?></h3>

				<a href="home.php"><button class="btn-home">Home</button></a>
			</div>
			

		</div>
	</div>
	

	

	<script type="text/javascript" src="../assets/js/all.js"></script>
	<script type="text/javascript"></script>

</body>
</html>

<!--Container zone ends-->
<?php
	}
	else
	{
		header('location:index.php');
	}
?>
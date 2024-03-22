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

	<?php

	$end = $data['Endstamp'];

	if (date("Y-m-d") < $end) 
	{
		$update = "UPDATE tbl_donors SET STATUS = 0 WHERE MAIL = '$USER_ID'";
		mysqli_query($conn, $update);
	}
	else
	{
		$update = "UPDATE tbl_donors SET STATUS = 1 WHERE MAIL = '$USER_ID'";
		mysqli_query($conn, $update);
	}

	?>

<!--Container zone-->
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="icon" href="../assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/user_home.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/all.css">
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
							<ul class="box">
								<li class="link"><a href="profile.php"><i class="fas fa-user-tie"></i>Profile</a></li>
								<li class="link"><a href="user_log_out.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>

			</div>

			<p class="h3">This process is used to find out the person who donated the blood once ,he cannot donate the blood for 90 days / 3months. So your Blood management system account has been temporarily deactivated for 3 months by clicking the Deactive button, if the blood is donated. After 3 months the account be again activate.</p>

			<div>
				<?php

				?>
			</div>

			<?php
				if (@$_GET['Update']==true) 
				{
			?>
				<p class="h5"> 
					<?php 
						echo $_GET['Update'] . " ";

						$date1 = strtotime($data['Timestamp']);
						$date2 = strtotime($data['Endstamp']);
						$diff = abs($date2 - $date1);
						$years = floor($diff / (365*60*60*24)); 
						$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 

						echo $months . " months " . $days . " days left for activation.";
						

					?>	
				</p>
			<?php
				}
			?>

			<a href="deactive.php?id=<?php echo $data['DONORS_ID'];?>" style="text-decoration: none;">
				<button class="btn-action">
					Deactive
				</button>
			</a>
			

		</div>
	</div>
	

	

	<script type="text/javascript" src="../assets/js/all.js"></script>

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
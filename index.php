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

	<title>BBMS</title>
	<link rel="icon" href="assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style-min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/aos.css">
</head>
<body>

	<header class="header" data-aos="fade-down">
		<nav class="navbar">
			<img src="assets/images/icon1.png">
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li><a href="#Service">SERVICES</a></li>
				<li><a href="#About">ABOUT US</a></li>
				<li><a href="user/index.php">LOG IN</a></li>
			</ul>
		</nav>
	</header>

	<section class="part-one" data-aos="fade-down" data-aos-delay="350">
		<div class="container">
			<div class="data">
				<p class="h2">
					Donate blood,<br>save life!
				</p>
				<p class="h3">To fulfill the needs of the people for the safest, most reliable and most cost-effective blood services through voluntary donations.</p>
				<a href="donor_reg.php">
					<button class="btn-dnt">
						Donate Now
						&nbsp;&nbsp;
						<i class="fas fa-arrow-right"></i>
					</button>
				</a>
			</div>
			<div class="image">	</div>
		</div>
	</section>

	<section class="part-two">
		<div class="upper-part" data-aos="fade-right" data-aos-delay="350">
			<h2>We are helping people from 5 years</h2>
			<p>Click here to can take membership. Your blood can give life to someone.</p>
			<a href="donor_reg.php">
				<button class="btn-dnt">
					Donate Now
					&nbsp;&nbsp;
					<i class="fas fa-arrow-circle-right"></i>
				</button>
			</a>
		</div>
		<div class="title" data-aos="fade-right" data-aos-delay="350">
			<p class="h2">Registration Process</p>
			<p>Here we collect donors details and process it into 3 steps.</p>
		</div>
		<div class="lower-part" data-aos="fade-down" data-aos-delay="450">
			<div class="box">
				<button class="btn-show btn-blue">1</button> <br><br>
				<h2>Registration</h2><br>
				<p>Registration is the firststage of this process. Donors can givetheir valuable data and data is safely stored to the database.</p>
			</div>
			<div class="box">
				<button class="btn-show btn-yellow">2</button> <br><br>
				<h2>Screening</h2><br>
				<p>This is the second stage of the process. Here admin validate each donors data fromthe database. If the data is genuine it pass through next stage.</p>
			</div>
			<div class="box">
				<button class="btn-show btn-green">3</button> <br><br>
				<h2>Approve</h2><br>
				<p>Last last of the process.If the data were genuine it pass through our database and hospitals.</p>
			</div>
		</div>
	</section>

	<a name="Service"><section class="part-three" data-aos="fade-down" data-aos-delay="450"></a>
		<p class="h2">SERVICES</p>
		<p>Lpsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		<div class="wrapper">
			<div class="drop-box">
				<center>
					<i class="far fa-address-book"></i> <br>
					<a href="donor_reg.php">
						<button class="btn-click">Register</button>
					</a>
				</center>
			</div>
			<div class="drop-box">
				<center>
					<i class="fas fa-user-plus"></i> <br>
					<a href="client_request.php">
						<button class="btn-click">Request</button>
					</a>
				</center>
			</div>
			<div class="drop-box">
				<center>
					<i class="fas fa-users"></i> <br>
					<a href="search_blood.php">
						<button class="btn-click">Search</button>
					</a>
				</center>
			</div>
		</div>
	</section>

	<a name="About"><section class="part-four"></a>
		<div class="container-about">
			<div class="left-part" data-aos="fade-down" data-aos-delay="350">
				<p class="h2">ABOUT US</p>

				<p>The purpose of this study was develop a blood management information system to assist in the management of the blood donor records and ease or control the distribution of the blood in various part of the country basing in the hospital demands. Without quick and timely access to donor records, creating market strategies for the blood donation, lobbying and sensitization of blood donor becomes very difficult.</p>

				<p>The blood management information system offers functionalities to quick access to donors records collected from various part of country. It enables monitoring of the results and performance of the blood donation activity such the relevant and measurable objectives of the organization can be checked.</p>
			</div>
			<div class="right-part" data-aos="fade-down" data-aos-delay="350">
				<div class="alert">
					<p class="h2">We provide donors details to genuine hospital's.</p>
					<p class="h3">To register hospital id please contact our admin by phone or mail.</p>
				</div>
				<div class="box-window">
					<div class="box-little">
						<h2>
							<?php
								require_once 'connection.php';
								$SQL = "SELECT * FROM `tbl_donors`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>
						</h2>
						<h3>Donors</h3>
					</div>
					<div class="box-little">
						<h2>
							<?php
								require_once 'connection.php';
								$SQL = "SELECT * FROM `tbl_request`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>	
						</h2>
						<h3>Request</h3>
					</div>
					<div class="box-little">
						<h2>
							<?php
								require_once 'connection.php';
								$SQL = "SELECT * FROM `tbl_hospital`";
								$s = mysqli_query($conn, $SQL);
								$num = mysqli_num_rows($s);
								echo $num;
							?>	
						</h2>
						<h3>Hospital</h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="footer" data-aos="fade-up" data-aos-delay="400">
		<div class="flex-box">
			<form name="form" action="feedback.php" method="POST" class="formBox">
				<p class="h2">FEEDBACK</p>
				<input type="text" name="name" placeholder="User Name"> <br>
				<input type="mail" name="mail" placeholder="Mail ID"> <br>
				<textarea name="message" placeholder="Message..."></textarea><br>
				<button name="submit">Send</button>
			</form>
		</div>
		<div class="flex-box">
			<center>
				<img src="assets/images/BGLO.png">
			</center>
		</div>
		<div class="flex-box last-Box">
			<p class="h2">CONTACT US</p>
				<p class="foot">Blood Bank Managent System</p>
				<p class="foot">Email: bloodbankin@gmail.com</p>
				<p class="foot">Phone: 9885540312</p>
				<p class="foot">Near by Attingal Post Office</p>
				<p class="foot">Service: 24x7</p><br>
				<p class="foot" style="color: #d6d6d6;">Copyright ©2020 All rights reserved | Made by S4 CS</p>
		</div>
	</footer>


	<script type="text/javascript" src="assets/js/all.js"></script>
	<script type="text/javascript" src="assets/js/aos.js"></script>
	<script>
 	 AOS.init();
	</script>

</body>
</html>
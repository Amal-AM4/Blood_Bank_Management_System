<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="icon" href="../assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/user_login.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/all.css">
</head>
<body>


	<div class="container">
		<div class="wrapper">
			<div class="left"></div>
			<div class="right">
				<div class="form">
					<form action="sign_in.php" method="POST">
						<table>
							<tr>
								<td><i class="fas fa-fingerprint"></i></td>
								<th>Welcome,<br>please authorize</th>
							</tr>
						</table>

						<?php
							if (@$_GET['Empty']==true)
							{
						?>

						<center>
							<div class="alert">
								<h5><?php echo $_GET['Empty']; ?></h5>
							</div>
						</center>

						<?php
							}
						?>

						<?php
							if (@$_GET['Invalid']==true)
							{
						?>

						<center>
							<div class="alert">
								<h5><?php echo $_GET['Invalid']; ?></h5>
							</div>
						</center>

						<?php
							}
						?>

						<div class="form-control-one">
							<label for="userid">User ID</label>
							<input type="text" name="userid" id="userid">
						</div>
						<div class="form-control-two">
							<label for="pass">Password</label>
							<input type="password" name="pass" id="pass">
						</div>

						<button name="submit">
							Login
						</button>
						<p>Copyright ©2020 All rights reserved | Made by S4 CS</p>

					</form>
				</div>
			</div>
		</div>
	</div>




	<script type="text/javascript" src="../assets/js/all.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Request</title>
	<link rel="icon" href="assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="assets/css/request.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
</head>
<body>


	<div class="container">
		<div class="left">
			<a href="index.php">
				<button class="btn-back"><i class="fas fa-arrow-left"></i></button>
			</a>
		</div>
		<div class="right">
			<div class="wrapper">
				<h2>Request</h2>
				<p>Here you can sent blood request</p>

				<?php
					if (@$_GET['Empty']==true) 
					{	
				?>
					<center>
					<div class="alert">
						<p class="h2"><?php echo $_GET['Empty']; ?></p>
					</div>
					</center>
				<?php
					}
				?>

				<?php
					if (@$_GET['Success']==true) 
					{	
				?>
					<center>
					<div class="alert-green">
						<p class="h2"><?php echo $_GET['Success']; ?></p>
					</div>
					</center>
				<?php
					}
				?>

				<form action="request.php" method="POST">
					<table>
						<tr>
							<th><label for="name">Name</label></th>
							<td><input type="text" name="name" id="name" placeholder="Full Name"></td>
						</tr>
						<tr>
							<th><label for="mail">E-mail</label></th>
							<td><input type="mail" name="mail" id="mail" placeholder="Enter your mail id"></td>
						</tr>
						<tr>
							<th><label for="phone">Mobile No</label></th>
							<td><input type="tel" name="phone" id="phone" placeholder="Enter your mobile number"></td>
						</tr>
						<tr>
							<th><label for="message">Message</label></th>
							<td>
								<textarea id="message" name="message" placeholder="Message..."></textarea>
							</td>
						</tr>
						<tr>
							<th><label for="date">Date</label></th>
							<td><input type="date" name="date" id="date"></td>
						</tr>
						<tr>
							<th><label for="time">Time</label></th>
							<td><input type="time" name="time" id="time"></td>
						</tr>
						<tr>
							<th><label for="place">Location</label></th>
							<td><input type="text" name="place" id="place" placeholder="Location of the event"></td>
						</tr>
						<tr>
							<th><input type="submit" name="submit" value="Submit" class="btn-sumbit"></th>
							<td><input type="reset" name="clear" value="Clear" class="btn-clear"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>




	<script type="text/javascript" src="assets/js/all.js"></script>

</body>
</html>
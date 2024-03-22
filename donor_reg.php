<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Registration</title>
	<link rel="icon" href="assets/images/ic_launcher.png">
	<link rel="stylesheet" type="text/css" href="assets/css/donor_reg.css">
	<link rel="stylesheet" type="text/css" href="assets/css/donor_reg_min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
</head>
<body>

	<div class="container">
		
		<form action="registration.php" method="POST" enctype="multipart/form-data">
			<div class="left">
				<div class="wrapper">
					<img src="assets/images/NoAvatar.jpg" id="viewimage" class="img-fluid">
					<input type="file" name="profile" id="image" onchange="loadFile(event)" class="file">
					<label for="image" class="label"><i class="far fa-file-image"></i>&nbsp;Upload Photo</label>
				</div>
			</div>

			<div class="right">
				<div class="display">

					<p class="h2">Registration Form</p>
					<p class="title-about">ENTER YOUR DETAILS HERE</p>

					<!-- Alert box using php -->
					<?php
						if (@$_GET['Empty']==true) 
						{
					?>
							<center>
							<div class="alert">
								<p><?php echo $_GET['Empty']; ?></p>
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
								<p><?php echo $_GET['Invalid']; ?></p>
							</div>
							</center>
					<?php
						}
					?>

					<?php
						if (@$_GET['Error']==true) 
						{
					?>
							<center>
							<div class="alert">
								<p><?php echo $_GET['Error']; ?></p>
							</div>
							</center>
					<?php
						}
					?>


					<table>
						<tr>
							<td><label for="name">Name</label></td>
							<td><input type="text" name="name" placeholder="Full Name" id="name"></td>
						</tr>
						<tr>
							<td><label for="mail">E-mail</label></td>
							<td><input type="mail" name="mail" placeholder="Example@gmail.com" id="mail"></td>
						</tr>
						<tr>
							<td><label for="dob">Date of Birth</label></td>
							<td><input type="text" name="dob" placeholder="May26, 2020" id="dob"></td>
						</tr>
						<tr>
							<td><label for="license">License No</label></td>
							<td><input type="text" name="license" placeholder="Drivering license no" id="license" class="license"></td>
						</tr>
						<tr>
							<td>
								<span id="hide" style="visibility: hidden;">Test</span>
							</td>
							<td>
								<span id="result"></span>
							</td>
						</tr>
						<tr style="height: 70px;">
							<td><label for="gender">Gender</label></td>
							<td><select name="gender" id="gender">
									<option>- Select a option -</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Others">Others</option>
								</select></td>
						</tr>
						<tr>
							<td><label for="group">Blood Group</label></td>
							<td><select name="group" id="group">
									<option>- Select a option -</option>
									<option value="AB+">AB+</option>
									<option value="AB-">AB-</option>
									<option value="A+">A+</option>
									<option value="A-">A-</option>
									<option value="O+">O+</option>
									<option value="O-">O-</option>
									<option value="B+">B+</option>
									<option value="B-">B-</option>
								</select></td>
						</tr>
						<tr>
							<td><label for="phone">Mobile No</label></td>
							<td><input type="tel" name="phone" placeholder="Ex 9874561230" id="phone"></td>
						</tr>
						<tr>
							<td><label for="place">Place</label></td>
							<td><input type="text" name="place" placeholder="Home Town" id="place"></td>
						</tr>
						<tr>
							<td><input type="submit" name="submit" class="btn-sumbit" value="Register"></td>
							<td><input type="reset" name="clear" class="btn-clear" value="Clear"></td>
						</tr>
					</table>

				</div>
			</div>
		
		</form>
	</div>




	<script type="text/javascript">
		function loadFile(event){
			let output=document.querySelector('#viewimage');
			output.src=URL.createObjectURL(event.target.files[0]);
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#license').blur(function() {
				var num = $(this).val();
				$.ajax({
					url:"check_lic.php",
					method:"POST",
					data:{num_lic:num},
					dataType:"text",
					success:function(html)
					{
						$('#result').html(html);
					}
				});
			});
		});
	</script>

	<script type="text/javascript" src="assets/js/all.js"></script>

</body>
</html>
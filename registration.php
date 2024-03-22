<?php
	
	session_start();
	require_once 'connection.php';

	if (isset($_POST['submit'])) 
	{
		$filename = $_FILES['profile']['name'];
		$tempname = $_FILES['profile']['tmp_name'];
		$folder = "assets/temp_img/".$filename;
		move_uploaded_file($tempname,$folder);

		$name = ucwords($_POST['name']);
		$mail = $_POST['mail'];
		$dob = $_POST['dob'];
		$license = $_POST['license'];
		$gender = $_POST['gender'];
		$group = $_POST['group'];
		$phone = $_POST['phone'];
		$place = ucwords($_POST['place']);

		if (empty($name) || empty($mail) || empty($dob) || empty($license) || empty($gender) || empty($group) || empty($phone) || empty($place)) 
		{
			header('location:donor_reg.php?Empty=Please fill the form.');
		}
		else 
		{
			$check = "SELECT * FROM `tbl_licence` WHERE LIC_NO = '$license'";
			$data = mysqli_query($conn, $check);
			$row = mysqli_num_rows($data);

			if ($row == 1) 
			{
				$sql = "SELECT * FROM `tbl_donors` WHERE MAIL = '$mail' OR LIC_NO = '$license' OR MOBILE_NO = '$phone'";
				$result = mysqli_query($conn, $sql);
				$num = mysqli_num_rows($result);

				if ($num == 1) 
				{
					header('location:donor_reg.php?Invalid=Mail id or License or Mobile No is already taken.');
				}
				else
				{
					$update = "INSERT INTO `tbl_donors`(`PHOTO`, `NAME`, `MAIL`, `DOB`, `LIC_NO`, `GENDER`, `BLOOD_GROUP`, `MOBILE_NO`, `PLACE`, `LOGS`, `LOCATOR`, `STATUS`) VALUES ('$folder','$name','$mail','$dob','$license','$gender','$group','$phone','$place',NOW(),0,1)";
					mysqli_query($conn, $update);
				}
			}
			else
			{
				header('location:donor_reg.php?Error=License number is invalid.');
			}
		}
	}
?>


<link rel="stylesheet" type="text/css" href="assets/css/all.css">
<style type="text/css">
	@font-face{
	font-family: my_PTSans;
	src: url('assets/font/PTSans-Regular.ttf');
	}

	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: my_PTSans;
	}
	body{
		background-color: #D1F2EB;
		color: #1C2833;
	}
	.container{
		display: block;
		height: 100vh;
		position: relative;
	}
	.wrapper{
		width: 650px;
		height: 450px;
		background: #fff;
		color: #263238;
		border-radius: 30px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.09);
		position: absolute;
		left: 0; right: 0; top: 0; bottom: 0;
		margin: auto;
	}
	.wrapper .hearder{
		display: block;
		height: 100px;
		background: rgba(178, 223, 219,0.3);
		border-radius: 30px 30px 0px 0px;
	}
	.wrapper .hearder h2{
		padding-top: 30px;
		padding-left: 40px;
		font-size: 2em;
	}
	.wrapper .title{
		display: block;
		height: 130px;
	}
	.wrapper .title .fa-check-circle{
		font-size: 8em;
		color: rgba(67, 160, 71,1.0);
		padding-top: 10px;
		padding-left: 40px;
	}
	.wrapper .title .h2{
		font-size: 1.5em;
		color: rgba(67, 160, 71,1.0);
		position: relative;
		bottom: 60px; left: 20px;
	}
	.wrapper .title .h3{
		position: relative;
		bottom: 10px; right: 230px;
		font-size: 3em;
		font-weight: bold;
	}
	.wrapper .about{
		display: block;
		height: 180px;
	}
	.wrapper .about p{
		width: 90%;
		padding-top: 10px;
		padding-left: 40px;
		font-size: 1.2em;	
	}
	.wrapper .about button{
		margin-top: 20px;
		margin-left: 40px;
		width: 140px; height: 50px;
		border: none;
		outline: none;
		border-radius: 30px;
		cursor: pointer;
		font-size: 20px;
		background: rgba(67, 160, 71,1.0);
		color: #fff;
	}
	.wrapper .about button:hover{
		background: rgba(46, 125, 50,1.0);
		box-shadow: 0 5px 12px rgba(0,0,0,0.3);
	}
</style>

<body>
	<div class="container">
		<div class="wrapper">
			<div class="hearder">
				<h2>Conformation</h2>
			</div>
			<div class="title">
				<i class="far fa-check-circle"></i>
				<span class="h2">Registration Successful!</span>
				<span class="h3">Thank You!</span>
			</div>
			<div class="about">
				<p>
					Now you are part of this family.<br>
					Profile is created and <b>USER ID</b> is you'r mail id and <b>PASSWORD</b> is you'r license number.
				</p>
				<a href="index.php">
					<button>Return</button>
				</a>
			</div>
		</div>
	</div>




	<script type="text/javascript" src="assets/js/all.js"></script>
</body>
<?php

	session_start();
	require_once '../connection.php';

	if (isset($_POST['submit'])) 
	{

		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if (empty($user) || empty($pass)) 
		{
			header('location:index.php?Empty= Please fill the forms.');
		}
		else
		{
			$sql = "SELECT * FROM `tbl_admin` WHERE USER_ID = '$user' AND PASSWORD = '$pass'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_fetch_assoc($result)) 
			{
				$_SESSION['ID'] = $user;
				header('location:dashboard.php');
			}
			else
			{
				header('location:index.php?Invalid=Check your USER ID and PASSWORD.');
			}
		}
	}

?>
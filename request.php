<?php

	require_once 'connection.php';

	if (isset($_POST['submit']))
	{
		$name = $_POST['name'];
		$mail = $_POST['mail'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$place = $_POST['place'];

		if (empty($name) || empty($mail) || empty($phone) || empty($message) || empty($date) || empty($time) || empty($place)) 
		{
			header('location:client_request.php?Empty=Please fill the forms.');
		}
		else
		{
			$sql = "INSERT INTO `tbl_request`(`NAME`, `MAIL`, `PHONE`, `MESSAGE`, `DATE`, `TIME`, `PLACE`, `LOGS`, `STATUS`) VALUES ('$name','$mail','$phone','$message','$date','$time','$place',NOW(),1)";
			mysqli_query($conn, $sql);
			header('location:client_request.php?Success=Request successfully sent.');
		}
	}


?>
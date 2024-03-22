<?php

	require_once 'connection.php';


	if (isset($_POST['submit'])) 
	{
		$name = $_POST['name'];
		$mail = $_POST['mail'];
		$message = $_POST['message'];

		$sql = "INSERT INTO `tbl_feedback`(`NAME`, `MAIL`, `MESSAGE`, `LOGS`, `STATUS`) VALUES ('$name','$mail','$message',NOW(),1)";
		mysqli_query($conn, $sql);
		header('location:index.php');
	}


?>
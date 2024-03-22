<?php

	$conn = mysqli_connect('localhost','root');
	mysqli_select_db($conn, 'bbms');

	if(!$conn)
	{
		die("Connection failed".mysqli_connect_error());
	}

?>
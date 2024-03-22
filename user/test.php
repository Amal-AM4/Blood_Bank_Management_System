<?php


	require_once '../connection.php';
	date_default_timezone_set('Asia/Kolkata');



	$record = "SELECT * FROM tbl_donors WHERE DONORS_ID = 5";
	$result = mysqli_query($conn, $record);
	$row = mysqli_fetch_assoc($result);

	$date = $row['Timestamp'];
	$active = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)). " + 5 day"));


	echo $date;
	echo "<br>";
	echo $active;
	echo "<br>";


	if (date("Y-m-d") < $active) 
	{
		echo "0";
	}
	else
	{
		echo "1";
	}



?>
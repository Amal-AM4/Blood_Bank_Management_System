<?php

	require_once '../connection.php';
	date_default_timezone_set('Asia/Kolkata');

	$id = $_GET['id'];
	$sql = "UPDATE tbl_donors SET STATUS = 0 WHERE DONORS_ID = '$id'";
	mysqli_query($conn, $sql);

	$insert = "UPDATE tbl_donors SET `Timestamp` = NOW() WHERE DONORS_ID = '$id'";
	mysqli_query($conn, $insert);

	$record = "SELECT * FROM tbl_donors WHERE DONORS_ID = '$id'";
	$result = mysqli_query($conn, $record);
	$row = mysqli_fetch_assoc($result);

	$date = $row['Timestamp'];
	$active = date("Y-m-d", strtotime(date("Y-m-d", strtotime($date)). " + 90 day"));

	$ins = "UPDATE tbl_donors SET `Endstamp` = '$active' WHERE DONORS_ID = '$id'";
	mysqli_query($conn, $ins);
	

	header("location:home.php?Update=Account is temporally deactive.");
	

?>
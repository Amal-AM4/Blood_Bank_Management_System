<?php

	require_once '../connection.php';

	$hos_name = $_POST['name'];
	$dr_name = $_POST['user'];
	$hos_id = $_POST['user_id'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM tbl_hospital WHERE HOS_ID = '$hos_id';";
	$data = mysqli_query($conn,$sql);
	$num = mysqli_num_rows($data);

	if($num == 1)
	{
		echo "<script>
				alert('User ID is already taken.');
			</script>";
	}
	else
	{
		$reg = "INSERT INTO `tbl_hospital`(`HOS_NAME`, `DR_NAME`, `HOS_ID`, `PASSWORD`, `LOGS`) VALUES ('$hos_name','$dr_name','$hos_id','$password',NOW())";
		mysqli_query($conn,$reg);

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="1;http://localhost/aaas/admin/hospital.php">
</head>
<body bgcolor="#1a237e">

</body>
</html>
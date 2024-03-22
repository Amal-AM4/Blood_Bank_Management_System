
<?php

	$conn = mysqli_connect('localhost','root');
	mysqli_select_db($conn, 'bbms');

	if(!$conn)
	{
		die("Connection failed".mysqli_connect_error());
	}

	if (isset($_POST['num_lic'])) 
	{
		$sql = "SELECT * FROM `tbl_licence` WHERE LIC_NO = '".$_POST['num_lic']."'";
		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) > 0) 
		{
			echo"<span style='color:green; font-size:16px; margin-left: 5px; font-weight:bold;'>License number is Valid</span>";
		}
		else
		{
			echo"<span style='color:red; font-size:16px; margin-left: 5px; font-weight:bold;'>License number is Not Valid</span>";
		}
	}

?>
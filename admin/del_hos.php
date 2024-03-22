<?php
	
	require_once '../connection.php';


	if(isset($_GET["id"]))
 	{
		$id = $_GET["id"];
	 	$sql = "DELETE FROM tbl_hospital WHERE ID =' $id'";
	 	mysqli_query($conn, $sql);
		header("location:hospital.php");
 	}
	

?>




<?php
	
	require_once '../connection.php';


	if(isset($_GET["id"]))
 	{
		$id = $_GET["id"];
	 	$sql = "DELETE FROM tbl_donors WHERE DONORS_ID =' $id'";
	 	mysqli_query($conn, $sql);
		header("location:members.php?Success=Row is successfully deleted.");
 	}
	

?>




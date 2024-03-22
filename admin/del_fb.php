<?php
	
	require_once '../connection.php';


	if(isset($_GET["id"]))
 	{
		$id = $_GET["id"];
	 	$sql = "DELETE FROM tbl_feedback WHERE ID =' $id'";
	 	mysqli_query($conn, $sql);
		header("location:feedback.php?Success=Feedback is successfully deleted.");
 	}
	

?>




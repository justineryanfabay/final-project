<?php 

//connect to database
	include("connect.php");

//get id and filter potential harmful scripts from the user
	$delete_id = mysqli_real_escape_string($db_connect, $_GET['id']);

//delete query
	$delete_q = "DELETE FROM bmr_tb WHERE id = $delete_id";
	mysqli_query($db_connect, $delete_q);

//redirect to records
	header("Location: records.php");

?>
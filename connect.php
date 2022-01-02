<?php

	//establish database connection
	$db_connect = mysqli_connect('localhost', 'root', '', 'bmr_db');

	//check connection
	if(!$db_connect) {
		die("Connection failed: " . mysqli_connect_error());
	}

?>
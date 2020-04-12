<?php
	$connection = mysqli_connect("localhost", "root", "", "finalproject");
	//check if database is connected
	if(mysqli_connect_error()){
		die("Database Connection Error");
	}
?>
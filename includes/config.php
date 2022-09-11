<?php 
	// what this function does, it is just wait for the php to load before sending the data to the database
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Africa/Johannesburg");

	//connect to the database
	$con = mysqli_connect("localhost", "root","", "splender");
	//if failed to connect to the database display an error
	if(mysqli_connect_errno()){
		echo "Failed to connect:" . mysqli_connect_errno();
	}

?>
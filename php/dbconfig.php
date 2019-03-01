<?php

	global $con;
	$hostname = '192.168.101.107'; 	// Host Name
	$user = 'root'; 			// username of host
	
	$password = 'pass'; 			// password of host
	
	$dbname = 'stu_info'; 			//database name
			
	$con = new mysqli($hostname,$user,$password,$dbname);
	if (mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		die();
  	}
  	
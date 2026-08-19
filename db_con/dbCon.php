<?php
//Connect to database

function connect($setup = FALSE){
	$servername = getenv('DB_HOST') ?: "localhost";
	$username = getenv('DB_USERNAME') ?: "root";
	$password = getenv('DB_PASSWORD') ?: "";
	$database = getenv('DB_DATABASE') ?: "lawyermanagement";

	// Create connection
	if($setup)
		$con = new mysqli($servername, $username, $password);
	else
		$con = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	return $con;
	//echo "Connected successfully";
}

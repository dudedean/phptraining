<?php

	define('ROOT_URL','http://localhost/tryPhp/index.php');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	//Create connection
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	//Check Connection
	if(!$conn){
		die("Connection Failed : ". mysqli_connect_error());
	}

?>
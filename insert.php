<?php
	require('config.php');

	$name = mysqli_real_escape_string($conn,$_POST['name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);

	$sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
	
	if(mysqli_query($conn,$sql)){
		header('Location: '.ROOT_URL.'');
	}
	else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}	

	// close connection
	mysqli_close($conn);
?>
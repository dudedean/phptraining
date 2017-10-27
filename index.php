<?php

	require('config.php');

	//Create Query
	$sql = "SELECT email,name from users";

	//Get Result
	$result = mysqli_query($conn,$sql);

	if(! $result ) {
      die('Could not get data: ' . mysql_error());
    }

    //Fetch Data
    $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //var_dump($users);

    //Free Memory
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test HTML JS MYSQL PHP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	
	<div class="container">
		<div class="col-md-6 well well-lg">
			<fieldset>
   				<legend>Legend</legend>
				<form action="insert.php" method="POST" class="form-horizontal">
					<div class="form-group">
						<label>Name : </label>
						<input type="text" class="form-control" name="name">
						<label>Email : </label>
						<input type="email" class="form-control" name="email">
						<label>Password : </label>
						<input type="password" class="form-control" name="password">
						<br>
						<button class="btn btn-success" type="submit">Submit!</button>
					</div>
				</form>
			</fieldset>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 well well-lg">
				<h1>Users</h1>
				<?php foreach($users as $user) : ?>
					<ul>
						<li>Name : <?php echo $user['name'] ; ?> <br> Email : <?php echo $user['email'] ; ?></li>
					</ul>
				<?php endforeach ; ?>
			</div>
		</div>
	</div>
		

</body>
</html>
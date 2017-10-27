<?php

	require('config.php');

	if(isset($_POST['delete'])){
		$delete_id = mysqli_real_escape_string($conn,$_POST['delete_id']);
var_dump($delete_id);
		$sql = "DELETE from users WHERE id = '$delete_id'";	
		
		if(mysqli_query($conn,$sql)){
		header('Location: '.ROOT_URL.'');
		}
		else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}	
	}

	//Create Query
	$sql = "SELECT * from users";

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
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-horizontal">
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
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST class=form-horizontal">
					<h1>Users</h1>
					<?php foreach($users as $user) : ?>
						<ul>
							<li>Name : <?php echo $user['name'] ; ?> <br> Email : <?php echo $user['email'] ; ?></li>
							<input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
							<input type="submit" name="delete" value="Delete" class="btn btn-danger">
						</ul>
					<?php endforeach ; ?>
				</form>
			</div>
		</div>
	</div>
		

</body>
</html>
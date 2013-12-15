<?php
	$host = '127.0.0.1';
	$user = $_GET['u'];
	$pass = '';

	$con = mysqli_connect($host,$user,$pass);
	// Check connection
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	// Create database
	$sql = "CREATE DATABASE crawl;";
	if (mysqli_query($con,$sql))
  	{
  		echo "Database my_db created successfully";
  	}
	else
  	{
  		echo "Error creating database: " . mysqli_error($con);
  	}

	$command = shell_exec('php artisan migrate:install');
	$command .= shell_exec('php artisan migrate');
	$command .= shell_exec('php artisan db:seed');

	echo "<pre>$command</pre>";

?>
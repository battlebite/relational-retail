<?php 
	$user = 'root';
	$password = 'root';
	$db = 'relational-retail';
	$host = 'localhost';
	$port = 3306;

	$mysqli = new mysqli($host,"$user","$password","$db");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Relational Retail</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
		<div id="top-banner">
		<header>Welcome to Relational Retail!</header>
		<form id="login" action="login.php">
		  	<label for="username">Username:</label>
		  	<input type="text" name="username">
		  	<label for="password">Password:</label>
		  	<input type="password" name="password">
		  	<input type="submit">
		  </form>
	</div>
	<hr>
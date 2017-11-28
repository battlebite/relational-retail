<?php
	$dbuser = 'root';
	$dbpassword = 'root';
	$db = 'relational-retail';
	$dbhost = 'localhost';
	$dbport = 3306;

	$mysqli = new mysqli($dbhost,$dbuser,$dbpassword,$db);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	function closeConnection() {
		// mysqli_close($mysqli);
	}
	?>
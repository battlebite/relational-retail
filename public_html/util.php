<?php

function getConnection() {
	$connection = new mysqli(
		"localhost",
		"root",
		"",
		"relational-retail"

	);

	if ($connection->connect_error) {
		die("Could not connect: " . $connection->error);
	}

	return $connection;
}
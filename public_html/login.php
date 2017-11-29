<?php
session_start(); // Starting Session
require_once('connect.php');
if (empty($_POST['username']) || empty($_POST['password'])) {
	$_SESSION['login_error'] = "Username or Password is blank";
	header("location: index.php");
}
else {
	$_SESSION['login_error'] = "Made it to else";
	// Define $username and $password
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Selecting Database
	$query = 'SELECT password FROM users where username = ?';
	if($stmt = $mysqli->prepare($query)) {
		$stmt->bind_param('s', $username);
		$stmt->execute();
	  $stmt->bind_result($hashedDbPass);
	  $stmt->fetch();
	  $stmt->close();
	}
	closeConnection();
  // Compare passwords 
  if ($hashedDbPass == $password) {
  	// Good
  	$_SESSION['login_user']=$username; // Initializing Session
  	$_SESSION['login_error']='';
		header("location: index.php");
  }
  else {
  	// Bad
  	$_SESSION['login_error'] = "Invalid Username or Password";
  	header("location: index.php");
  }
}
?>
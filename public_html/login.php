<?php
session_start(); // Starting Session
require_once('connect.php');
if (empty($_POST['username']) || empty($_POST['password'])) {
	$_SESSION['login_error'] = "Username or Password is blank";
	header("location: index.php");
}
else {
	// Define $username and $password
	$username=$_POST['username'];
	$password = $_POST['password'];
	// Selecting Database
	$query = 'SELECT password FROM users where username = ?';
	if($stmt = $mysqli->prepare($query)) {
		$stmt->bind_param('s', $username);
		$stmt->execute();
	  $stmt->bind_result($hashedDbPass);
	  $stmt->fetch();
	  $stmt->close();
	}
  // Compare passwords 
  if (password_verify($password, $hashedDbPass)) {
  	// Good
  	$_SESSION['login_user']=$username; // Initializing Session
  	$_SESSION['login_error']='';
  	$query = 'SELECT is_admin FROM users where username = ?';
  	if ($stmt = $mysqli->prepare($query)) {
			$stmt->bind_param('s', $username);
			$stmt->execute();
		 	$stmt->bind_result($isAdmin);
		  $stmt->fetch();
		  $stmt->close();
			if($isAdmin == 1) {
				$_SESSION['is_admin']=1;
			}
		}
		mysqli_close($mysqli);
		header("location: index.php");
  }
  else {
  	// Bad
  	$_SESSION['login_error'] = "Incorrect username or password";
  	mysqli_close($mysqli);
  	header("location: index.php");
  }
}
mysqli_close($mysqli);
?>
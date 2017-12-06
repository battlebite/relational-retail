<?php 
	session_start();
	require_once('connect.php');
	// session_start();
	if (!isset($_SESSION['login_error'])) {
		$_SESSION['login_error'] = '';
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
		<header>Welcome to <a href="index.php">Relational Retail!</a></header>
		<?php 
		if (isset($_SESSION['login_user'])) {
			?> 
			<span>Hello <?php echo $_SESSION['login_user'] ?></span>
			<?php 
				if (isset($_SESSION['is_admin'])) {
					?>
					<a href="adminCommands.php"><button>Admin Commands</button></a>
					<?php
				}
			 ?>
			<form action="logout.php">
				<input type="submit" name="logout" value="Log Out">
			</form>
		<?php
		} else {
			?>
			<form id="login" action="login.php" method="POST">
				<span style="color: red"><?php echo $_SESSION['login_error'] ?></span>
		  	<!-- <label for="username">Username:</label> -->
		  	<input type="text" name="username" placeholder="Username">
		  	<!-- <label for="password">Password:</label> -->
		  	<input type="password" name="password" placeholder="Password">
		  	<input type="submit" name="login" value="Login">
		  	<a href="registerForm.php">Register</a>
	  	</form>
	  	<?php
		}
		?>
		
	</div>
	<hr>
	<?php $_SESSION['login_error'] = ""; ?>
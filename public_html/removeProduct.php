<?php 
session_start();
include('connect.php');
if (!isset($_SESSION['is_admin'])) {
  header('Location: index.php');
	exit();
}
$pid = $_POST['pid'];
$query = 'DELETE FROM products WHERE id = ?';
if($stmt = $mysqli->prepare($query)) {
		$stmt->bind_param('i', $pid);
		$stmt->execute();
	  $stmt->close();
}
$_SESSION['form_error'] = "";
$_SESSION['form_success'] = "Product successfully deleted.";
mysqli_close($mysqli);
header('Location: adminCommands.php');
exit();
?>
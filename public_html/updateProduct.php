<?php 
session_start();
include('connect.php');
if (!isset($_SESSION['is_admin']))
  header('Location: index.php');
$pid = $_POST['pid'];
$action = $_POST['action'];
$value = $_POST['value'];

if ($value == 'add' || 'delete') {
	$query = 'SELECT quantity FROM products WHERE id = ?';
	if($stmt = $mysqli->prepare($query)) {
		$stmt->bind_param('i', $pid);
		$stmt->execute();
		$stmt->bind_result($actionValue);
		$stmt->fetch();
	  $stmt->close();
	}
}
if (isset($actionValue)) {
	if ($action == 'add') $value += $actionValue;
	if ($action == 'delete') $value = $actionValue - $value;
}
if ($value < 0) $value = 0;
$query = 'UPDATE products SET quantity = ? WHERE id = ?';
if($stmt = $mysqli->prepare($query)) {
	$stmt->bind_param('ii', $value, $pid);
	$stmt->execute();
  $stmt->close();
}
$_SESSION['form_success'] = "Product successfully updated";
header('Location: adminCommands.php');
exit();
?>

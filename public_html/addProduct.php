<?php 
session_start();
include('connect.php');
if (!isset($_SESSION['is_admin']))
  header('Location: index.php');
$_SESSION['form_error'] = "";
$_SESSION['form_success'] = "Product successfully added.";
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image_url = "./img/skyrim_switch.jpg";
$description = $_POST['description'];
$manufacturer = $_POST['manufacturer'];
$category = $_POST['category'];
// Check if any blank values
if ($name == "" || $price == "" || $quantity == "" || $description == "" || $manufacturer == "" || $category == "") {
	$_SESSION['form_error'] = "Please fill all fields.";
	header('Location: adminCommands.php');
	exit();
}

$query = 'INSERT INTO products (name, price, quantity, image_url, description, manufacturer, category) values (?,?,?,?,?,?,?)';
if($stmt = $mysqli->prepare($query)) {
		$stmt->bind_param('sdissss', $name, $price, $quantity, $image_url, $description, $manufacturer, $category);
		$stmt->execute();
	  $stmt->close();
	}
$_SESSION['form_error'] = "";
$_SESSION['form_success'] = "Product successfully added.";
mysqli_close($mysqli);
header('Location: adminCommands.php');
?>
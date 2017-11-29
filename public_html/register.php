<?php
/* Registration process, inserts user info into the database 
   
 */
session_start(); // Starting Session
require 'header.php';
// Escape all $_POST variables to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$name = $mysqli->escape_string($_POST['name']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$address = $mysqli->escape_string($_POST['address']);
$ccNumber = $mysqli->escape_string($_POST['ccNumber']);

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    $query = "INSERT INTO users (name, username, password, address, credit_card_number, is_admin ) VALUES ('$name', '$username', '$password', '$address', '$ccNumber', 0)";

    // Add user to the database
    if ($stmt = $mysqli->prepare($query) ){
        $stmt->bind_param('ssssii', $name, $username, $password, $address, $credit_card_number, $is_admin);
        $stmt->execute();
        $stmt->fetch();
        $stmt->close();
        $_SESSION['message'] =
                
                 "Thank you for joing Relational Retail!" . "\nINSERT INTO users (name, username, password, address, credit_card_number, is_admin ) " 
            . "VALUES ($name, $username , $password, $address, $ccNumber, $isAdmin)";
        header("location: error.php");

    }

    else {
        $_SESSION['message'] = "INSERT INTO users (name, username, password, address, credit_card_number, is_admin ) VALUES ('$name', '$username', '$password', '$address', '$ccNumber', '$isAdmin')" . $mysqli->error;
        header("location: error.php");
    }
}
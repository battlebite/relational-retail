<?php 
session_start();
if (!isset($_SESSION['is_admin']))
  header('Location: index.php');
 ?>
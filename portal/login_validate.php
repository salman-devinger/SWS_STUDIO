<?php
// Initialize the session
session_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
  header("location: ../login.php");
  exit;
}
?>

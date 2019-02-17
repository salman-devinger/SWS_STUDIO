<?php
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
  header("location: ./login.php");
  exit;
}
?>

<?php
session_start();
include('./process_pages/database.php');
mysqli_query($conn, "UPDATE admins SET is_loggedIn = '0'");
header('Location: ./signup-login.php');

$_SESSION['admin_logged'] = 0; 
?>
<?php
session_start();
include('./database.php');
mysqli_query($conn, "UPDATE admins SET is_loggedIn = '0'");
header('Location: login.php');
$_SESSION['admin_logged'] = 0; 
?>
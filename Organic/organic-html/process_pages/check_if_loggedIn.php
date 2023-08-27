<?php

session_start();

if(!isset($_SESSION["user_id"])) {
    session_abort();
    header('Location: ./signup-login.php');
}

session_abort();

?>
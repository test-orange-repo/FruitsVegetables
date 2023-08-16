<?php

include('database.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {

    session_start();

    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $phone = $_POST["phone"];

    // /* Start regular expressions */
    // $regexName = '/^[A-Za-z]+$/';
    // $regexUsername = '/^[A-Za-z0-9_]+$/';
    // $regexEmail = '/^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+(?:com|net|org|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)$/i';
    // // $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])[A-Za-z]{8,}$/';
    // $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])[\w!@#$%^&*()-+=<>?]{8,}$/';
    // $regexPhoneNumber = '/^\d{3}-\d{3}-\d{4}$/';

    // /* End regular expressions */

    // if (!preg_match($regexName, $first_name) || !preg_match($regexName, $last_name)) {
    //     $_SESSION["signupError"] = "Name must only contain letters";
    //     header('Location: ../signup-login.php');
    // }

    // else if(!preg_match($regexUsername, $username)) {
    //     $_SESSION["signupError"] = "Username should not contain any symbols";
    //     header('Location: ../signup-login.php');
    // }

    // else if(!preg_match($regexEmail, $email)) {
    //     $_SESSION["signupError"] = "Email is invalid";
    //     header('Location: ../signup-login.php');
    // }

    // else if(!preg_match($regexPassword, $password)) {
    //     $_SESSION["signupError"] = "Password must be at least 8 letters, and have a Capital letter and a small one";
    //     header('Location: ../signup-login.php');
    // }

    // else if(!preg_match($regexPhoneNumber, $phone)) {
    //     $_SESSION["signupError"] = "Password must be at least 8 letters, and have a Capital letter and as small one";
    //     header('Location: ../signup-login.php');
    // }



}


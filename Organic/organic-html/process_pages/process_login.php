<?php

include('../process_pages/database.php');

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    //Admin Login
    $_SESSION['admin_logged'] = 0;
    $admin = mysqli_query($conn, "SELECT * FROM admins");
    $adminInfo = mysqli_fetch_array($admin);


    if ($email == $adminInfo["admin_email"] && $password == $adminInfo["admin_password"]) {
        mysqli_query($conn, "UPDATE admins SET is_loggedIn = '1'");
        header('Location: ../vendor-dashboard.php');
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, user_email, user_password FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $flag = false;
    $updateQuery = "UPDATE users SET is_loggedIn = 1 WHERE user_email = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("s", $email);

    while ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user["user_password"])) {
            // Update is_loggedIn column to 1
            if ($updateStmt->execute()) {
                $_SESSION["user_id"] = $user["user_id"];
                $flag = true;
            }
            break;
        }
    }

    $stmt->close();
    $updateStmt->close();
    $conn->close();


    if ($flag) {

        $_SESSION["user_id"] = $user["user_id"];
        header('Location: ../index-4.php');
        exit();     
        
    } else {
        $_SESSION["loginError"] = "Email or Password incorrect";
        header('Location: ../signup-login.php');
        exit();
    }
}

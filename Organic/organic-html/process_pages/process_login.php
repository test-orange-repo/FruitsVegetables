<?php
include('./database.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    $admin = mysqli_query($conn, "SELECT * FROM admins");
    $adminInfo = mysqli_fetch_array($admin);


    if ($email == $adminInfo["admin_email"] && $password == $adminInfo["admin_password"]) {
        $_SESSION['admin_logged'] = 1;
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

    $from_cart = intval($_GET["fromCart"]); // Get the value of is_from_cart from the session

    if ($flag) {
        $_SESSION["user_id"] = $user["user_id"];
        
        if ($from_cart) {
            header('Location: ../cart.php?=5');
            exit();
        } else {
            header('Location: ../index-4.php');
            exit();
        }
    } else {
        $_SESSION["loginError"] = "Email or Password incorrect";
        header('Location: ../signup-login.php');
        exit();
    }
}

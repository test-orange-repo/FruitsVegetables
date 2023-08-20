<?php
include('./database.php');

session_start();

    include ('../process_pages/database.php');
    // Assuming you have a way to identify the user who is logging out, such as their user ID
    $userId = $_SESSION["user_id"]; // Replace with the actual variable name you are using
    unset($_SESSION["user_id"]);
    mysqli_query($conn, "UPDATE admins SET is_loggedIn = '0'");
    $_SESSION['admin_logged'] = 0;
    // Use prepared statement to update the is_loggedIn column to 0
    $updateQuery = "UPDATE users SET is_loggedIn = 0 WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("i", $userId); // Assuming user_id is an integer, adjust the data type if needed
    if ($updateStmt->execute()) {
        // Logout successful
        $updateStmt->close();
        $conn->close();
        header('Location: ../signup-login.php'); // Redirect to a logout success page
        exit();
    }
    
    else {
        $_SESSION["logoutError"] = "Logout failed"; // Handle the error
        $updateStmt->close();
        $conn->close();
        header('Location: ./index-4.php'); // Redirect to an appropriate page
        exit();
    }
?>

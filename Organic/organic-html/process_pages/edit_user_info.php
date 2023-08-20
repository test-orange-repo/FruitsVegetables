<?php

include('./database.php');

session_start();
$user_id = $_SESSION["user_id"];
if (isset($_SESSION["user_id"])) {
    $stmt = $conn->prepare("SELECT first_name, last_name, user_name, user_email, user_password, user_img, user_phone FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST["fname"] ?? $user["first_name"];
    $last_name = $_POST["lname"] ?? $user["last_name"];
    $username = $_POST["username"] ?? $user["user_name"];
    $email = $_POST["email"] ?? $user["user_email"];
    $phone = $_POST["phone"] ?? "0" . $user["user_phone"];
    $image = $_FILES["image"]["tmp_name"] ?? $user["user_img"];

    $imgData = file_get_contents($image);

    $regexName = '/^[A-Za-z]+$/';
    $regexUsername = '/^[A-Za-z0-9_]+$/';
    $regexEmail = '/^[A-Za-z0-9._%+-]+@(?:[A-Za-z0-9-]+\.)+(?:com|net|org|edu|ru|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)$/i';
    $regexPhoneNumber = '/^(\+\d{1,3})?\d{10}$/';

    $flag = true;

    if (!preg_match($regexName, $first_name)) {
        $flag = false;
        $_SESSION["editError"] = "Name must only contain letters";
    }

    if (!preg_match($regexName, $last_name)) {
        $flag = false;
        $_SESSION["editError"] = "Name must only contain letters";
    }

    if (!preg_match($regexUsername, $username)) {
        $flag = false;
        $_SESSION["editError"] = "Username should not contain any symbols or spaces";
    }

    if (!preg_match($regexEmail, $email)) {
        $flag = false;
        $_SESSION["editError"] = "Email is invalid";
    }

    if (!preg_match($regexPhoneNumber, $phone)) {
        $flag = false;
        $_SESSION["editError"] = "Phone invalid";
    }

    if($flag) {
        $updateQuery = "UPDATE users SET first_name = ?, last_name = ?, user_name = ?, user_email = ?, user_phone = ?, user_img = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssssisi", $first_name, $last_name, $username, $email, $phone, $imgData, $user_id);
        $updateStmt->execute();
        header('Location: ../vendor-profile.php');
    }
    else {
        header('Location: ../vendor-profile.php');
    }

}
?>

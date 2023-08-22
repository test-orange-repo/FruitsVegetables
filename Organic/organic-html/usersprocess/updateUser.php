<?php

include('../process_pages/database.php');

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '" . $_GET['user_id'] . "' ");
$record = mysqli_fetch_array($result);

if(count($_POST) > 0){

    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $uName = $_POST["uName"];
    $userEmail = $_POST["userEmail"];
    $userPhone = $_POST["userPhone"];
    $userPass = $_POST["userPass"];
    $user_id = $_GET['user_id'];
    
    $updateResult = mysqli_query($conn, "UPDATE users SET first_name = '$fName', last_name = '$lName', user_name = '$uName', user_email = '$userEmail', user_phone = '$userPhone', user_password = '$userPass' WHERE user_id = '" . $_GET['user_id'] . "'");
    
    if ($_FILES["userImage"]["size"] > 0) {
        $userImage = $_FILES["userImage"]["tmp_name"];
        $imageData = addslashes(file_get_contents($userImage));
        $updateResult = mysqli_query($conn, "UPDATE users SET user_img = '$imageData' WHERE user_id = '$user_id'");
    } else {
        $updateResult = mysqli_query($conn, "UPDATE users SET user_img = user_img WHERE user_id = '$user_id'");
    }

    if (!$updateResult) {
        echo "Update error: " . mysqli_error($conn);
    }   
    else{
        // echo "DONE!!!!!!!!!!!";
        header("Location: ../vendor-dashboard.php"); // Redirect to view.php
        exit(); // Make sure to exit after redirection
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update User Info</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nicecss@2.1.0/dist/nice.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5;
    }
    h1{
        position: absolute;
        top: 0px;
    }

    .form-container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-input {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-input input[type="text"],
    .form-input input[type="password"],
    .form-input input[type="file"]{
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-input input[type="text"]:focus,
    .form-input input[type="password"]:focus,
    .form-input input[type="file"]:focus{
        outline: none;
        border-color: #7cc000;
    }

    .form-button {
        text-align: center;
    }

    .form-button button {
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type=file]::file-selector-button {
        background-color: #7cc000;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;            
    }
    .custom_btn {
        color: #fff;
        background: #7cc000;
        letter-spacing: 2px;
        padding: 10px 20px 11px;
        border: none;
        overflow: hidden;
        position: relative;
        z-index: 1;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    .custom_btn:hover {
        color: #000 !important;
        background: #ffffff;
    }
    .custom_btn:hover:before {
        width: 100%;
        -webkit-transition: 800ms ease all;
        transition: 800ms ease all;
    }
    .custom_btn:hover:after {
        width: 100%;
        -webkit-transition: 800ms ease all;
        transition: 800ms ease all;
    }
    .custom_btn:hover .btn {
        color: #000 !important;
    }
    .custom_btn:hover i {
            -webkit-transform: translateX(5px);
            transform: translateX(5px);
    }
    .custom_btn:before {
        content: "";
        background-color: #81c408;
        height: 3px;
        width: 0;
        position: absolute;
        top: 0;
        right: 0;
        -webkit-transition: 0.4s ease all;
        transition: 0.4s ease all;
    }
    .custom_btn:after {
        content: "";
        background-color: #81c408;
        height: 3px;
        width: 0;
        position: absolute;
        top: 0;
        right: 0;
        -webkit-transition: 0.4s ease all;
        transition: 0.4s ease all;
        top: auto;
        right: auto;
        left: 0;
        bottom: 0;
    }
    .custom_btn i {
        display: inline-block;
        -webkit-transition: -webkit-transform 0.3s ease-out;
        transition: -webkit-transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    }
</style>
</head>
<body>
<div class="form-container">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-input">
            <label for="fName" class="form-label">First Name</label>
            <input type="text" id="fName" name="fName" value="<?php echo $record["first_name"]; ?>">
        </div>
        <div class="form-input">
            <label for="lName" class="form-label">Last Name</label>
            <input type="text" id="lName" name="lName" value="<?php echo $record["last_name"]; ?>">
        </div>
        <div class="form-input">
            <label for="uName" class="form-label">User Name</label>
            <input type="text" id="uName" name="uName" value="<?php echo $record["user_name"]; ?>">
        </div>
        <div class="form-input">
            <label for="userEmail" class="form-label">User Email</label>
            <input type="text" id="userEmail" name="userEmail" value="<?php echo $record["user_email"]; ?>">
        </div>
        <div class="form-input">
            <label for="userPhone" class="form-label">User Phone</label>
            <input type="text" id="userPhone" name="userPhone" value="<?php echo $record["user_phone"]; ?>">
        </div>
        <div class="form-input">
            <label for="userPass" class="form-label">User Password</label>
            <input type="password" id="userPass" name="userPass" value="<?php echo $record["user_password"]; ?>" >
        </div>
        <div class="form-input">
            <label for="userImage" class="form-label">User Image</label>
            <input type="file" id="userImage" name="userImage" value="<?php echo base64_encode($record['user_img']); ?>" accept="image/*">
        </div>
        <div class="form-button">
            <button type="submit" class="btn custom_btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>


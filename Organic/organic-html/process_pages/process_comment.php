<?php 
include('./database.php');
session_start();

$product_id = $_GET['id'];

if (isset($_POST['submit']) && isset($_SESSION['user_id'])) {
    $text = mysqli_real_escape_string($conn, $_POST['comment']);
    $rating = intval($_POST['rating']); // Convert to integer
    $date = date('Y-m-d H:i:s');
    $user_id = $_SESSION["user_id"];

    // Insert the comment and rating into the database
    $insertQuery = "INSERT INTO comment (user_id, product_id, comment_text, comment_date, rating) 
                    VALUES ('$user_id', '$product_id', '$text', '$date', '$rating')";
    $result = mysqli_query($conn, $insertQuery);

    header("Location: ../product-detail.php?id=$product_id");

    exit();
}


?>
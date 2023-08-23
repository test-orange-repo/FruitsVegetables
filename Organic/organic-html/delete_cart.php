<?php

include('./process_pages/database.php');
session_start();


if (isset($_GET['delid'])) {
    $id = $_GET['delid'];


    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $product) {
            if ($product['productID'] == $id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
        header("Location: ./cart.php");
    }


    if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT cart_id FROM cart WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $cartId = $row['cart_id'];

    $deleteQuery = "DELETE FROM cartproduct WHERE cart_id = '$cartId' AND product_id = '$id'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {

        header("Location: ./cart.php");
        exit();


    } else {

        echo "Error deleting product from cart.";
    }

}}
?>
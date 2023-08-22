<?php

session_start();

include('./process_pages/database.php');

// Initialize $quantity
$quantity = 0;


// Handle minus
if (isset($_GET['minusid'])) {
    $id = $_GET['minusid'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($item['productID'] == $id) {

                if ($item['quantity'] == 1) {
                    unset($_SESSION['cart'][$key]);
                } else {
                    $item['quantity']--;
                    $quantity = $item['quantity'];
                }
            }
        }

        // Update database if $quantity > 0
        if ($quantity > 0) {
            $sql = "UPDATE cartproduct SET product_quantity = $quantity WHERE product_id = $id";
            $result = $conn->query($sql);
        } else {
            // If quantity becomes 0, you might want to remove the product from the database
            $sql = "DELETE FROM cartproduct WHERE product_id = $id";
            $result = $conn->query($sql);
        }

        header('Location: ./cart.php');
        exit(); // Make sure to exit after the redirect
    }
}

// Handle Plus
else if (isset($_GET['plusid'])) {
    $id = $_GET['plusid'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($item['productID'] == $id) {

                $item['quantity']++;
                $quantity = $item['quantity'];
            }
        }

        $sql = "UPDATE cartproduct SET product_quantity = $quantity WHERE product_id = $id";
        $result = $conn->query($sql);


        header('Location: ./cart.php');
        exit();
    }
}

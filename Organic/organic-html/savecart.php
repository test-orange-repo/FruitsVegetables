<?php
include 'includes/head-vars.php';

if ($_SESSION['user_id']) {

    $userID = $_SESSION['user_id'];
    $array_product = $_SESSION['cart'];

    // Loop through the cart array and insert items into the cart table if not already inserted
    foreach ($_SESSION['cart'] as $item) {
        $product_id = $item['productID'];
        $product_quantity = $item['quantity'];

        // Check if the item is already in the cart table
        $check_sql = "SELECT *
                        FROM cart 
                        WHERE user_id = '$userID'";
                        
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) == 0) {
            // Insert the item into the cart table
            $sql_c = "INSERT INTO cartproduct (product_id, product_quantity, cart_id)
                        VALUES ('$product_id', '$product_quantity', 'cart.cart_id')";
            $result = mysqli_query($conn, $sql_c);

            if ($result) {
                // echo "Inserted successfully";
                header('Location: checkout.php');
            } else {
                echo "Error: " . mysqli_error($conn);
                // header('Location: shopping-cart.php');
            }
        }
    }

    // Clear the cart in the session after insertion
    //$_SESSION['cart'] = array();
    unset($_SESSION['cart'] );

    header('Location: checkout.php');
    exit(0);
} else {
    $_SESSION["if_from_cart"] = true;
    header('Location : ./signup-login.php');
}
?>

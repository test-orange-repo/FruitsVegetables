<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Find the product in the cart
    foreach ($_SESSION['Array'] as $key => &$product) {
        if ($product['id'] === $productId) {
            if (isset($_POST['decrement'])) {
                $product['quantity'] = max($product['quantity'] - 1, 0);
                if ($product['quantity'] === 0) {
                    unset($_SESSION['Array'][$key]);
                    // Re-index the array to remove gaps
                    $_SESSION['Array'] = array_values($_SESSION['Array']);
                }
            } elseif (isset($_POST['increment'])) {
                $product['quantity']++;
            }
            break;
        }
    }

    // Redirect back to the cart page without any parameters
    header('Location: discount.php');
    // header('Location: cart.php');
    exit();
}

<?php

include('./process_pages/database.php');

session_start();

if (isset($_SESSION['user_id']) && !empty($_SESSION['cart']) ) {
    $userID = $_SESSION['user_id'];
    $cart_id_sql = "SELECT cart_id FROM cart WHERE user_id = '$userID'";
    $cart_id_result = mysqli_query($conn, $cart_id_sql);

    if ($cart_id_result && mysqli_num_rows($cart_id_result) > 0) {
        $cart_data = mysqli_fetch_assoc($cart_id_result);
        $cart_id = $cart_data['cart_id'];

        foreach ($_SESSION['cart'] as $item) {
            $product_id = $item['productID'];
            $product_quantity = $item['quantity'];
            mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 0');
            // Check if the item is already in the cartproduct table for the user and product
            $check_sql = "SELECT * FROM cartproduct WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) == 0) {
                // Product does not exist in the cartproduct table, insert it
                $sql_c = "INSERT INTO cartproduct (product_id, product_quantity, cart_id)
                            VALUES ('$product_id', '$product_quantity', '$cart_id')";
                
                $result = mysqli_query($conn, $sql_c);
                
                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                }
            }
            mysqli_query($conn, 'SET FOREIGN_KEY_CHECKS = 1');
        }

        // Redirect after all insertions are done
        header('Location: checkout.php');
        exit();
     
} else {
    $_SESSION["is_from_cart"] = true;
    header('Location: ./signup-login.php?fromCart=' . $_SESSION["is_from_cart"]);
    exit();
}}

else {
    
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
        <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
        <title>You Don't have any item!</title>
        <style>
        .custom-confirm-button-class {
            background-color: red !important;
            color: white !important; 
        }
    </style>
    </head>
    <body>
        
    </body>
    </html>
    <script>
    Swal.fire({
        title: "You Don't have any item!",
        confirmButtonText: "OK",
        customClass: {
            confirmButton: 'custom-confirm-button-class'
        }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./cart.php"; 
            }
        });
    </script>
    
    

<?php

    // popop("Your cart is empty. Add items to your cart first.");
    
}

?>
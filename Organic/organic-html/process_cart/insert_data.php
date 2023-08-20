<?php


include('../process_pages/database.php');

session_start();

foreach ($_SESSION['Array'] as $product) {
    if (isset($_SESSION["user_id"])) {
        $user_id1 = $_SESSION["user_id"];
        $cart_id_query = "SELECT * FROM cart WHERE user_id='$user_id1'";
        $cart_total = "INSERT INTO cart (user_id ,cart_totalprice) VALUES ('$user_id1' ,'$totalPrice')";
        mysqli_query($conn, $cart_total);
        $cart_result = mysqli_query($conn, $cart_id_query);

        if (mysqli_num_rows($cart_result) > 0) {
            while ($row = mysqli_fetch_assoc($cart_result)) {
                $cart_id = $row['cart_id'];

                $product_cart_query = "INSERT INTO cartproduct (product_id, product_quantity, cart_id) VALUES ('" . $product['id'] . "', '" . $product['quantity'] . "', '$cart_id')";
                mysqli_query($conn, $product_cart_query);
                
            }
        }
        unset($_SESSION['Array'][$key]);
        $_SESSION['Array'] = array_values($_SESSION['Array']);
    }
       
        

}

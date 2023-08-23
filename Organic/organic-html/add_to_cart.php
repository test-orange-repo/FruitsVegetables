<?php

include('./process_pages/database.php');


session_start();

$totalPrice = 0;

// Start add to cart through session
if (isset($_POST['submit1']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_GET["id"] ?? 0;
    $quantity = 1;



    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }



    $existingProductId = array_column($_SESSION["cart"], "productID");

    if (in_array($ID, $existingProductId)) {
    } else {
        $_SESSION['cart'][] = array(
            "productID" => $ID,
            "quantity" => $quantity
        );
    }
}
// End add to cart through session


// Start add to cart through database
if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $id = $product["productID"];
            $sql = "SELECT * FROM products WHERE product_id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $product_description = $row['product_description'];
                    $product_price = $row['product_price'];
                    $product_quantity = $product['quantity'];
                    $product_image = $row['product_image'];
                    $category_id = $row['category_id'];

                    $subTotalSignleproduct = $product_quantity * $product_price;

                    $totalPrice += $subTotalSignleproduct;

                    $sql = "SELECT cart_id FROM cart WHERE user_id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result);
                    $cartId = $row2['cart_id'];
                    $sqll = "UPDATE cart SET cart_totalprice = '$totalPrice' WHERE user_id = '$user_id'";
                    $result1 = mysqli_query($conn, $sqll);

                    $existingProductQuery = "SELECT * FROM cartproduct WHERE cart_id = '$cartId' AND product_id = '$id'";
                    $existingProductResult = mysqli_query($conn, $existingProductQuery);

                    if (mysqli_num_rows($existingProductResult) == 0) {

                        $insert = "INSERT INTO cartproduct (product_id, product_quantity ,cart_id) VALUES ('$id', '$product_quantity' ,'$cartId')";
                        $result2 = mysqli_query($conn, $insert);
                    } else {
                        $row = mysqli_fetch_assoc($existingProductResult);
                        $existingQuantity = $row['product_quantity'];
                        $newQuantity = $existingQuantity++;

                        $update = "UPDATE cartproduct SET product_quantity = '$newQuantity' WHERE cart_id = '$cartId' AND product_id = '$id'";
                        $result2 = mysqli_query($conn, $update);
                    }
                }
            }
        }
    }
}

header('Location: ./cart.php');
// End add to cart through database


?>
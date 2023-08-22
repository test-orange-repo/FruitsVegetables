<?php

include('../process_pages/database.php');

session_start();

// Send the id from the link
$proID = $_GET["id"];

try {
    // Assuming you have a database connection established earlier
    $sql = "SELECT * FROM cartproduct WHERE product_id = '".$proID."'";
    $result = mysqli_query($conn, $sql);
    $sqData = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0) {
        $productQuan = $sqData["product_quantity"];

        // Increment the existing quantity by 1
        $newQuantity = $productQuan + 1;

        // Update the product_quantity in the cartproduct table
        $updateSql = "UPDATE cartproduct SET product_quantity = $newQuantity WHERE product_id = '$proID'";
        
        if (mysqli_query($conn, $updateSql)) {
            header('Location: ../cart.php');  // Redirect to the cart page
            exit;  // Make sure to exit after redirection
        } else {
            echo "Error updating product quantity: " . mysqli_error($conn);
        }
    } else {
        // Product does not exist in the cart, add a new record
        // Rest of your existing code for adding a new product to the cart
    }

} catch (Exception $e) {
    // Handle the exception here
    echo "An error occurred: " . $e->getMessage();
}

if (isset($_SESSION["user_id"])) {
    $sq = "SELECT cart_id FROM cart WHERE user_id = '".$_SESSION["user_id"]."'";
    $sqResult = mysqli_query($conn, $sq);

    if ($sqResult) {
        $sqData = mysqli_fetch_assoc($sqResult);
        $cartId = $sqData["cart_id"];

        // Default quantity to 1 if not set in the URL
        $quan = isset($_GET["quan"]) ? $_GET["quan"] : 1;

        // Prepare the SQL statement with proper formatting
        $sql = "INSERT INTO cartproduct (product_id, product_quantity, cart_id) VALUES ('$proID', $quan, $cartId)";
        
        if (mysqli_query($conn, $sql)) {
            header('Location: ../cart.php?$id="'.$proID.'"');  // Redirect to the cart page
            exit;  // Make sure to exit after redirection
        } else {
            echo "Error adding record to cartproduct table: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching cart ID: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
    <title>Insert Into Table</title>
</head>
<body>
    
</body>
</html>

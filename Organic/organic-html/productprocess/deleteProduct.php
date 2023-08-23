<?php
include('../process_pages/database.php');


if(isset($_GET["product_id"])){
    $id = $_GET["product_id"];

    // SQL query to delete data based on ID
    $sql = "DELETE FROM `products` WHERE product_id='$id'";

    // mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }
    else {
         header("Location: ../vendor-dashboard.php ");  // Redirect to view.php
    //   echo "right";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
    <title>Delete Product</title>
</head>
<body>
    
</body>
</html>
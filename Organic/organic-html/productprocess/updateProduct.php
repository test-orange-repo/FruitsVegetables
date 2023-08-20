<?php

include('../process_pages/database.php');


// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $productName = $_POST["productName"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["productPrice"];
    $productQuantity = $_POST["productQuantity"];    
    $product_id = $_GET['product_id'];

    $updateResult = mysqli_query($conn, "UPDATE products SET product_name = '$productName', product_description = '$productDesc', product_price = '$productPrice', product_quantity = '$productQuantity'  WHERE product_id = '" . $_GET['product_id'] . "'");

    if ($_FILES["productImage"]["size"] > 0) {
        
        $productImage = $_FILES["productImage"]["tmp_name"];
        $imageData = addslashes(file_get_contents($productImage));
        $updateResult = mysqli_query($conn, "UPDATE products SET product_image = '$imageData' WHERE product_id = '$product_id'");
    } else {
        
        $updateResult = mysqli_query($conn, "UPDATE products SET product_image = product_image WHERE product_id = '$product_id'");
    }
    if (!$updateResult) {
        echo "Update error: " . mysqli_error($conn);
    }   
    else{
        // echo "DONE!!!!!!!!!!!";
        header("Location: ../vendor-dashboard.php"); // Redirect to view.php
        exit(); // Make sure to exit after redirection
    }

}

$result = mysqli_query($conn, "SELECT * FROM products WHERE product_id= '" . $_GET['product_id'] . "'");
$record = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nicecss@2.1.0/dist/nice.css">
<link rel="stylesheet" href="assets/css/style.css">
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5;
    }
    h1{
        position: absolute;
        top: 0px;
    }

    .form-container {
        width: 300px;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-input {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-input input[type="text"],
    .form-input input[type="file"],
    .form-input option{
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-input input[type="text"]:focus,
    .form-input input[type="file"]:focus{
        outline: none;
        border-color: #7cc000;
    }

    .form-button {
        text-align: center;
    }

    .form-button button {
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type=file]::file-selector-button {
        background-color: #7cc000;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;     
    }
    .custom_btn {
        color: #fff;
        background: #7cc000;
        letter-spacing: 2px;
        padding: 10px 20px 11px;
        border: none;
        overflow: hidden;
        position: relative;
        z-index: 1;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }
    .custom_btn:hover {
        color: #000 !important;
        background: #ffffff;
    }
    .custom_btn:hover:before {
        width: 100%;
        -webkit-transition: 800ms ease all;
        transition: 800ms ease all;
    }
    .custom_btn:hover:after {
        width: 100%;
        -webkit-transition: 800ms ease all;
        transition: 800ms ease all;
    }
    .custom_btn:hover .btn {
        color: #000 !important;
    }
    .custom_btn:hover i {
            -webkit-transform: translateX(5px);
            transform: translateX(5px);
    }
    .custom_btn:before {
        content: "";
        background-color: #81c408;
        height: 3px;
        width: 0;
        position: absolute;
        top: 0;
        right: 0;
        -webkit-transition: 0.4s ease all;
        transition: 0.4s ease all;
    }
    .custom_btn:after {
        content: "";
        background-color: #81c408;
        height: 3px;
        width: 0;
        position: absolute;
        top: 0;
        right: 0;
        -webkit-transition: 0.4s ease all;
        transition: 0.4s ease all;
        top: auto;
        right: auto;
        left: 0;
        bottom: 0;
    }
    .custom_btn i {
        display: inline-block;
        -webkit-transition: -webkit-transform 0.3s ease-out;
        transition: -webkit-transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    }
</style>
</head>
<body>
<div class="form-container">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-input">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" id="productName" name="productName" value="<?php echo $record["product_name"]; ?>" required>
        </div>
        <div class="form-input">
            <label for="productDesc" class="form-label">Product Description</label>
            <input type="text" id="productDesc" name="productDesc" value="<?php echo $record["product_description"];?>" required>
        </div>
        <div class="form-input">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="text" id="productPrice" name="productPrice" value="<?php echo $record["product_price"];?>" required>
        </div>
        <div class="form-input">
            <label for="productQuantity" class="form-label">Product Quantity</label>
            <input type="text" id="productQuantity" name="productQuantity" value="<?php echo $record["product_quantity"];?>" required>
        </div>
        <div class="form-input">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" id="productImage" name="productImage" value="<?php echo base64_encode($record["product_image"]);?>">
        </div>
        
        <div class="form-button">
            <button type="submit" class="btn custom_btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>


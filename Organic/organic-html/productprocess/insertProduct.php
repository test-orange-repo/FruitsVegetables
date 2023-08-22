<?php

include('../process_pages/database.php');


// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $productName = $_POST["productName"];
    $productDesc = $_POST["productDesc"];
    $productPrice = $_POST["productPrice"];
    $categoryName = $_POST["categoryName"];

    $result2 = mysqli_query($conn, "SELECT * FROM categories WHERE category_name = '$categoryName'");
    $row = mysqli_fetch_assoc($result2);
    $categoryID = $row["category_id"];
    
    $productImage = $_FILES["productImage"]["tmp_name"];

    $imageData = addslashes(file_get_contents($productImage));
    // $base64ImageData = base64_decode($imageData);
    $sql = "INSERT INTO products (product_name, product_description, product_price, product_image, category_id) VALUES ('$productName', '$productDesc', '$productPrice', '$imageData', '$categoryID')";

    if (mysqli_query($conn, $sql)) { 
        header("Location: ../vendor-dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
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
            <input type="text" id="productName" name="productName" required>
        </div>
        <div class="form-input">
            <label for="productDesc" class="form-label">Product Description</label>
            <input type="text" id="productDesc" name="productDesc" required>
        </div>
        <div class="form-input">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="text" id="productPrice" name="productPrice" required>
        </div>
        <div class="form-input">
            <label for="categoryName" class="form-label">Category Name</label>
            <select id="categoryName" name="categoryName">
                <?php
                    $categories = mysqli_query($conn, "SELECT * FROM categories");
                    while($record = mysqli_fetch_array($categories)){
                ?>
                    <option name="categoryName" value="<?php echo $record["category_name"]; ?>"><?php echo $record["category_name"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-input">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" id="productImage" name="productImage" accept="image/*" required>
        </div>
        
        <div class="form-button">
            <button type="submit" class="btn custom_btn">Submit</button>
        </div>
    </form>
</div>
</body>
</html>


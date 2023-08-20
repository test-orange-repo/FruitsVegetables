<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Order Details</title>
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

    .form-label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
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
        <?php

        include('../database.php');
        $id = $_GET['order_id'];
        ?>
        <center>
            <label for="fname" style="font-weight:bolder; font-size:30px">Order ID:</label> 
            <span style="color:#7cc000; padding:10px; font-weight:bolder; font-size:30px"> <?php echo $id ?> </span><br><br>
        </center>
        <?php
        $query = "SELECT * 
                FROM orderitems                    
                INNER JOIN products ON products.product_id = orderitems.product_id 
                WHERE orderitems.order_id = '$id'"; 

        $result = mysqli_query($conn, $query);
        while($record = mysqli_fetch_array($result)){
            ?>
                <label for="fname">Product Name:</label> 
                <span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["product_name"]; ?></span><br><br> 
                <label for="fname">Product Quantity:</label> 
                <span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["orderItem_quntity"]; ?></span><br><br> 
                <label for="fname">Order Item SubTotal:</label> 
                <span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["orderItem_subtotal"]; ?></span><br><br> 
            <?php } ?>
            <center>
                <a href="../vendor-dashboard.php" >
                    <button type="button" class="btn custom_btn">
                        <i class="far fa-plus"></i> Go Back!
                    </button>
                </a>
            </center>
    </div>
</body>
</html>


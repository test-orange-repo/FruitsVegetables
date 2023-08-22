<?php

include('./process_pages/database.php');

session_start();
//------Noor Code
if (isset($_SESSION["user_id"])) {

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = $_POST["firstname"];
        $last_name = $_POST["lastname"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postcode = $_POST["postcode"];
        $region = $_POST["region"];
        $phone = $_POST["phone"];


        $user_id = $_SESSION["user_id"];
        $stmt = $conn->prepare("SELECT addresses.first_name, addresses.last_name, addresses.address, addresses.city, addresses.postcode, addresses.region, addresses.phone FROM addresses INNER JOIN users ON addresses.user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $addressData = $result->fetch_assoc();
        
        if($addressData["address"] == NULL) {
            updateAddress($conn, $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id);
        }
        else {
            newAddress($conn, $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id);
        }


    }

}

function updateAddress($conn, $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id) {
    $stmt = $conn->prepare("UPDATE addresses SET first_name = ?, last_name = ?, address = ?, city = ?, postcode = ?, region = ?, phone = ? WHERE user_id = ?");
    $stmt->bind_param("sssssssi", $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id);
    $stmt->execute();
}

function newAddress($conn, $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id) {
    $stmt = $conn->prepare("INSERT INTO addresses (first_name, last_name, address, city, postcode, region, phone, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $first_name, $last_name, $address, $city, $postcode, $region, $phone, $user_id);
    $stmt->execute();
}



//------Marah Code
//cart table
$cart = mysqli_query($conn, "SELECT * FROM cart");
$cartInfo = mysqli_fetch_array($cart);



//oder table

//address table

$status = "done";
$updateResult = mysqli_query($conn, "INSERT INTO orders (order_date, order_totalamount, order_stutes, user_id) VALUES ('" . date('Y-m-d') . "',  '".$cartInfo['cart_totalprice']."', '$status', '".$_SESSION['user_id']."' )"); // Added single quotes around $status
$orderID = mysqli_insert_id($conn);
//oderItem table
$orderItem = mysqli_query($conn, "SELECT * FROM orderitems");
$orderItemInfo = mysqli_fetch_array($orderItem);

//cartproduct table
$productItem = mysqli_query($conn, "SELECT * FROM cartproduct
                                    INNER JOIN products ON cartproduct.product_id = products.product_id");
$productItemInfo = mysqli_fetch_array($productItem);

$updateResult2 = mysqli_query($conn, "INSERT INTO orderitems (orderItem_quntity, product_id, order_id, orderItem_subtotal) VALUES ( '".$productItemInfo['product_quantity']."', '".$productItemInfo['product_id']."' ,'$orderID', '".$productItemInfo['product_price']."')");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <!-- PopUp -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
    <style>
        .custom-confirm-button-class {
            background-color: #7cc000 !important;
            color: white !important; 
        }
    </style>
</head>
<body style="background-color:rgb(210,241,223)">
    
</body>
</html>
<script>
    Swal.fire({
        title: "Submit Your Order !",
        confirmButtonText: "OK",
        customClass: {
            confirmButton: 'custom-confirm-button-class'
        }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./index-4.php";
            }
        });
</script>
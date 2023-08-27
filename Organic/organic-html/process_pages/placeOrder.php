<?php 

include('./database.php');

session_start();
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

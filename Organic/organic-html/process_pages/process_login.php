<?php

include('./database.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    $admin = mysqli_query($conn, "SELECT * FROM admins");
    $adminInfo = mysqli_fetch_array($admin);


    // Check if the admin is logging in
    if ($email == $adminInfo["admin_email"] && $password == $adminInfo["admin_password"]) {
        $_SESSION['admin_logged'] = 1;
        mysqli_query($conn, "UPDATE admins SET is_loggedIn = '1'");
        header('Location: ../vendor-dashboard.php');
        exit();
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, user_email, user_password FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    $flag = false;
    $updateQuery = "UPDATE users SET is_loggedIn = 1 WHERE user_email = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("s", $email);

    while ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user["user_password"])) {
            // Update is_loggedIn column to 1
            if ($updateStmt->execute()) {
                $_SESSION["user_id"] = $user["user_id"];
                $flag = true;
            }
            break;
        }
    }

    $stmt->close();
    $updateStmt->close();
    $conn->close();


    if ($flag) {
        $_SESSION["user_id"] = $user["user_id"];
        if (isset($_SESSION["is_from_cart"])) {
            header('Location: ../add_to_cart.php');
            exit();
        } else {
            header('Location: ../index-4.php');
            exit();
        }
    } else {
        $_SESSION["loginError"] = "Email or Password incorrect";
        header('Location: ../signup-login.php');
        exit();
    }
}


/* 



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


*/

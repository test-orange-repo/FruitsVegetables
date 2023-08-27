<?php
include('../process_pages/database.php');

if(isset($_GET["admin_id"])){
    $id = $_GET["admin_id"];

    // SQL query to delete data based on ID
    $sql = "DELETE FROM `admins` WHERE admin_id='$id'";

    
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
    <title>Delete Admin</title>
</head>
<body>
    
</body>
</html>
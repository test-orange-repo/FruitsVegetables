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
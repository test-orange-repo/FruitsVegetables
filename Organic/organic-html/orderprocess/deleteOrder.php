<?php

include('../process_pages/database.php');
// Check if form has been submitted
if(isset($_GET["order_id"])){
    $id = $_GET["order_id"];

    // SQL query to delete data based on ID
    $sql = "DELETE FROM `orders` WHERE order_id='$id'";

    
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

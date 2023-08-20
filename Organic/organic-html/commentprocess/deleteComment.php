<?php
include "../database.php"; 

if(isset($_GET["comment_id"])){
    $id = $_GET["comment_id"];

    // SQL query to delete data based on ID
    $sql = "DELETE FROM comment WHERE comment_id='$id'";

    
    // mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }
    else {
         header("Location: ../vendor-dashboard.php ");  // Redirect to view.php
      // echo "right";
    }
}
?>
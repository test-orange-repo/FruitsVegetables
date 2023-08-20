<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- PopUp -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
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
        title: "Wrong Old Password!",
        confirmButtonText: "OK",
        customClass: {
            confirmButton: 'custom-confirm-button-class'
        }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "./resetAdminPass.php"; 
            }
        });
</script>
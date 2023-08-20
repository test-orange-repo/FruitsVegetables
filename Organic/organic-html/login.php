<?php
session_start();

include('./database.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['SignInBtn'])){

            $name = $_POST['InputEmailorUsername'];
            $pass = $_POST['InputPassword1'];        
            $admin = mysqli_query($conn, "SELECT * FROM admins");
            $adminInfo = mysqli_fetch_array($admin);
            // if(($name == 'organic.admin@gmail.com') && $pass == 'Admin123.'){
            if(($name ==  $adminInfo["admin_username"] || $name ==  $adminInfo["admin_email"]) && $pass == $adminInfo["admin_password"]){
                $_SESSION['admin_logged'] = 1; 
                mysqli_query($conn, "UPDATE admins SET is_loggedIn = '1'");
                header('Location: vendor-dashboard.php');
                exit;
            }
            else{
                echo '<script type="text/javascript">';
                echo 'alert("Invalid Email Or Password");';
                echo '</script>';
            }
        }
    }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Organic - Dashboard</title>
  <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <!-- Include stylesheet CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="background-color: #e4fdd1;">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./assets/images/logo/logo.png" width="180" alt="">
                </a>
                <p class="text-center">Access To Your Dashboard</p>
                <form method="post" action="">
                  <div class="mb-3">
                    <label for="InputEmailorUsername" class="form-label">Username Or Email</label>
                    <input type="text" class="form-control" id="InputEmailorUsername" name="InputEmailorUsername" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="InputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="InputPassword1" name="InputPassword1">
                  </div>
                  <center>
                    <div class="mb-4">
                      <a class="fw-bold" href="./index.html" style="color: #90d45c;">Forgot Password ?</a>
                    </div>
                    <button type="submit" name="SignInBtn" class="btn custom_btn" >SignIn</button>
                  </center>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
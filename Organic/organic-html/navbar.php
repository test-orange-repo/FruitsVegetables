<?php
session_start();

if (isset($_SESSION["user_id"])) {
    include('./process_pages/database.php');

    $user = mysqli_query($conn, "SELECT * from `users` where user_id = '" . $_SESSION['user_id'] . "'");
    $userInfo = mysqli_fetch_array($user);
} else {
    $displayName = "Guest";
    $displayImgPath = './assets/images/user-profile/default.jpg';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home V.4 - Organic - Food E-commerce HTML Template</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">

    <!-- Include fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Include bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Include aos CSS -->
    <link rel="stylesheet" href="assets/css/aos.css">

    <!-- Include magnific-popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!-- Include nice-select CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!-- Include slick-theme CSS -->
    <link rel="stylesheet" href="assets/css/slick-theme.css">

    <!-- Include slick CSS -->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!-- Include stylesheet CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- back-to-top start -->
    <div class="backtotop">
        <a href="#!" class="scroll">
            <i class="far fa-arrow-up fw-bold"></i>
        </a>
    </div>
    <!-- back-to-top end -->

    <!-- header section start -->
    <header class="about_header position-relative">


        <!-- top inner navbar start -->
        <div class="top_inner_main">
            <div class="top_inner_wrap">
                <div class="container">
                    <div class="top_inner_content about_inner_cont d-flex justify-content-between align-items-center border-start border-top border-end">
                        <div class="top_inner_logo d-flex justify-content-between align-items-center">
                            <a class="drop_bars text-dark px-1 py-1" href="#!" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                            </a>
                            <a class="logo px-sm-4 py-3 border-end border-start" href="./index-4.php">
                                <img src="assets/images/logo/logo.png" alt="image_not_found">
                            </a>
                        </div>


                        <div class="navbar_user me-4">
                            <div class="navbar_user_icon">
                                <ul class="list-unstyled d-flex mb-0">
                                    <li class="pe-3 position-relative">
                                        <a href="#collapseExample" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="far fa-user" data-toggle="collapse" role="button" data-target="#use_deropdown" aria-expanded="false" aria-controls="use_deropdown"></i>
                                        </a>
                                        <!-- user profile start -->
                                        <div id="collapseExample" class="collapse_dropdown collapse">
                                            <div class="dropdown_content">
                                                <div class="profile_info clearfix">
                                                    <div class="user_thumbnail">
                                                        <?php
                                                        $flag = isset($_SESSION["user_id"]);
                                                        ?>
                                                        <img src="data:image/jpeg;base64,<?php
                                                                                            if ($flag) {
                                                                                                echo base64_encode($userInfo['user_img']);
                                                                                            } else {
                                                                                                echo base64_encode(file_get_contents($displayImgPath));
                                                                                            }
                                                                                            ?>" alt="user_img">
                                                    </div>
                                                    <div class="user_content">
                                                        <h4 class="user_name"><?php
                                                                                if ($flag) {
                                                                                    echo $userInfo['first_name'] . ' ' . $userInfo['last_name'];
                                                                                } else {
                                                                                    echo $displayName;
                                                                                }
                                                                                ?></h4>

                                                    </div>
                                                </div>
                                                <ul class="settings_options ul_li_block clearfix">
                                                    <li><a href="<?php if($flag) {
                                                        echo "./vendor-profile.php";
                                                    } else {
                                                        echo './signup-login.php';
                                                    } ?>"><i class="fas fa-user-circle"></i>
                                                            Profile</a></li>

                                                    <li><a href="<?php
                                                                    if ($flag) {
                                                                        echo "./process_pages/process_logout.php";
                                                                    } else {
                                                                        echo "./signup-login.php";
                                                                    }
                                                                    ?>">
                                                                    <i class="fas fa-sign-out-alt"></i>
                                                            <?php
                                                            if($flag) {
                                                                echo "Logout";
                                                            } else {
                                                                echo "Login";
                                                            }
                                                            ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li class="pe-3"><a href="#!"><i class="far fa-heart"></i></a></li> -->
                                    <li><a href="./cart.php"><i class="fas fa-shopping-bag position-relative " data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mobile menubar start -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close mobile_menu_close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav main_menu_list m-auto">
                                <li class="nav-item pe-4">
                                    <a class="nav-link active" aria-current="page" href="./index-4.php" id="home_submenu" role="button" aria-expanded="false">Home</a>

                                </li>
                                <li class="nav-item pe-4 dropdown">
                                    <a class="nav-link" href="#" id="shop_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                                    <div class="dropdown-menu" aria-labelledby="shop_submenu">
                                        <div class="sidebar_nav_item">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="./shop-list.php?category_id=1">Fruits</a>
                                                </li>
                                                <li>
                                                    <a href="./shop-list.php?category_id=2">Vegetables</a>
                                                </li>
                                                <li>
                                                    <a href="./shop-list.php?category_id=3">Seedlings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item pe-4 dropdown">
                                    <a class="nav-link" href="./about-us.php" id="blog_submenu" role="button" aria-expanded="false">About us</a>

                                </li>
                                <li class="nav-item pe-5">
                                    <a class="nav-link" href="./contact-us.php">Contact us</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- collapse search - start -->
            <div class="main_search_collapse collapse" id="main_search_collapse">
                <div class="main_search_form position-relative card">
                    <div class="container">
                        <form action="#">
                            <div class="form_item position-relative">
                                <input type="search" class="form-control rounded-pill py-3" name="search" placeholder="Search Your Product...">
                                <button type="submit" class="submit_btn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- collapse search - end -->
        </div>
        <!-- top inner navbar end -->

        <!-- bottom header start -->
        <div class="header_bottom_main header_border position-relative d-none d-lg-block">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light border p-0">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse border-end justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav navbar_4 main_menu_list after_navbar">
                            <li class="nav-item nav_item_has_child px-2 dropdown">
                                <a class="nav-link active" aria-current="page" href="index-4.php" id="home_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>

                            </li>
                            <li class="nav-item nav_item_has_child px-2 dropdown">
                                <a class="nav-link" href="#" id="shop_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                                <div class="nav_item_submenu dropdown-menu" aria-labelledby="shop_submenu" style="background-image: url(assets/images/mega/mega3.png)">
                                    <div class="nav_submenu_cont">
                                        <ul class="list-unstyled ms-3">
                                            <li>
                                                <a href="shop-list.php?category_id=1">Fruits</a>
                                            </li>
                                            <li>
                                                <a href="shop-list.php?category_id=2">Vegetables</a>
                                            </li>
                                            <li>
                                                <a href="shop-list.php?category_id=3">Seedlings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item nav_item_has_child px-2 dropdown">
                                <a class="nav-link" href="./about-us.php" id="blog_submenu" role="button" aria-expanded="false">About us</a>
                            </li>
                            <li class="nav-item nav_item_has_child px-2">
                                <a class="nav-link" href="./contact-us.php">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>






</body>

</html>


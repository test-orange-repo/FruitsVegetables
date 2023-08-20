<?php

include('./process_pages/database.php');


$discount = false;

if (isset($_POST['code'])) {

    $discountPercentage = 0;
    $discount = "SELECT * FROM discount WHERE discount_text = '" . $_POST['code'] . "'";

    $result = mysqli_query($conn, $discount);

    if ($result->num_rows > 0) {
        $record = mysqli_fetch_assoc($result);

        $code = $_POST['code'];

        if ($code == $record["discount_text"]) {
            $discount = true;
            $discountPercentage = $record["discount_percentage"];
        } else {
            $discountPercentage = 0;
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Organic - Food E-commerce HTML Template</title>
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
    <!-- body wrap start -->
    <div class="body-wrap overflow-hidden">
        <!-- back-to-top start -->
        <div class="backtotop">
            <a href="#!" class="scroll">
                <i class="far fa-arrow-up fw-bold"></i>
            </a>
        </div>
        <!-- back-to-top end -->

        <!-- header section start -->

        <?php include('./navbar.php');

        $ID = $_GET["id"] ?? 0;
        $quantity = 1;

        if (isset($_SESSION["user_id"])) {
            $userID = $_SESSION["user_id"];
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        echo "<pre>";
            print_r($_SESSION["cart"]);
        echo "</pre>";

        $existingProductId = array_column($_SESSION["cart"], "productID");

        if (in_array($ID, $existingProductId)) {

        } else {
            $_SESSION['cart'][] = array(
                "productID" => $ID,
                "quantity" => $quantity
            );
        }


        ?>



        <!-- main body start -->
        <main>



            <!-- Breadcrumb section start -->
            <section class="breadcrumb_sec_1 position-relative">
                <div class="breadcrumb_wrap sec_space_mid_small" style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
                    <div class="breadcrumb_cont text-center">
                        <div class="breadcrumb_title">
                            <h2 class="text-white">Cart Page</h2>
                        </div>
                        <ul class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                            <li><a href="index.html"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>About</li>
                            <li><i class="fas fa-chevron-right"></i>Dried</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb section end -->

            <!-- cart_section - start -->
            <section class="cart_section sec_space_large" data-aos="fade-up" data-aos-duration="2000">
                <div class="container">
                    <div class="cart_table table-responsive position-relative">
                        <table class="table align-middle">
                            <thead class="text-uppercase">
                                <tr>
                                    <th>photo</th>
                                    <th>product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPrice = 0;
                                foreach ($_SESSION['cart'] as $product) {

                                    $id = $product["productID"];
                                    $sql = "SELECT * FROM products WHERE product_id = '$id'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $product_id = $row['product_id'];
                                        $product_name = $row['product_name'];
                                        $product_description = $row['product_description'];
                                        $product_price = $row['product_price'];
                                        $product_quantity = $product['quantity'];
                                        $product_image = $row['product_image'];
                                        $category_id = $row['category_id'];
                                        // Get the quantity for each single product
                                        $quan = $product["quantity"];

                                        $subTotalSignleproduct = $quan * $product_price;

                                        $totalPrice += $subTotalSignleproduct;

                                ?>
                                        <!-- ------ -->
                                        <tr>
                                            <td class="thumbnail"><a href="product-details.php">
                                                    <?php echo '<img src="data:image/webp;base64,' .
                                                        base64_encode($product_image) . '" alt="product image" />'; ?>
                                                </a></td>
                                            <td class="name"> <a href="product-details.php">
                                                    <?php echo $product_name ?>
                                                </a></td>
                                            <td class="price"><span>
                                                    <?php echo $product_price ?>JD
                                                </span></td>

                                            <td class="quantity">

                                                <div class="quantity_input">
                                                    <a href="load.php?minusid=<?php echo $id ?>"><button type="submit" name="decrement">–</button></a>
                                                    <input class="input_number" value="<?php echo $product_quantity; ?>" name="quantity">
                                                    <a href="load.php?plusid=<?php echo $id ?>"><button type="submit" name="increment">+</button></a>
                                                </div>
                                            </td>
                                            <td class="subtotal"><span>
                                                    <?php echo $subTotalSignleproduct ?>JD
                                                </span></td>
                                            <td class="remove"><a href="delete_cart.php?delid=<?php echo $id ?>" class="btn">×</a></td>
                                        </tr>
                                        <!-- ------ -->

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="coupon_wrap d-flex justify-content-between">
                        <div class="coupon_form d-flex align-items-center">
                            <div class="form_item mb-0 me-5">
                                <form class="coupon_form d-flex align-items-center " method="post" action="./cart.php">
                                    <input type="text" style="height:81px;" class="coupon rounded-pill" name="code" placeholder="Coupon Code">
                                    <button type="submit" name="submit" class="btn btn_coupon custom_btn text-white rounded-pill py-2 py-sm-3 px-3 px-sm-5 text-uppercase ">Apply
                                        Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-lg-end">
                        <div class="col col-lg-4 mt-5">
                            <div class="cart_pricing_table text-uppercase">
                                <h3 class="table_title text-center">Cart Total</h3>
                                <ul class="ul_li_block clearfix">
                                    <li><span>Subtotal</span> <span><?php echo $totalPrice ?></span></li>
                                    <li><span>Total</span> <span><?php
                                                                    if ($discount) {
                                                                        $totalPrice -= ($totalPrice * $discountPercentage);
                                                                        echo number_format($totalPrice, 2);
                                                                    } else {
                                                                        echo $totalPrice;
                                                                    }
                                                                    ?></span></li>
                                </ul>
                                <div class="btn_wrap pt-0 text-center">
                                    <a href="./checkoutprocess.php" class="btn text-uppercase text-white rounded-pill">Proceed to
                                        Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cart_section - end -->

        </main>
        <!-- main body end -->

        <!-- footer section start -->
        <footer class="footer_section position-relative">
            <div class="footer_section_wrap sec_top_space_50" style="background-image: url(assets/images/footer/footer.png)">
                <div class="container">
                    <div class="footer_top_content d-flex flex-column flex-lg-row justify-content-between align-items-center">
                        <div class="footer_top_logo">
                            <a href="about-us.html"><img src="assets/images/logo/logo2.png" alt="image_not_found"></a>
                        </div>
                        <div class="footer_top_subs position-relative">
                            <input class="rounded-pill" type="search" name="search" placeholder="Your Phone Number">
                            <a href="#!"><button type="button" class="btn custom_btn rounded-pill text-white position-absolute">Subscribe Now <i class="fas fa-long-arrow-alt-right"></i></button></a>
                        </div>
                        <div class="footer_top_social">
                            <ul class="list-unstyled d-flex justify-content-end">
                                <li class="me-3"><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li class="me-3"><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="me-3"><a href="#!"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer_inner_content sec_space_xs_70">
                        <div class="footer_inner_content_wrap">
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="footer_inner_choose_content">
                                        <div class="footer_inner_choose_title">
                                            <h4>
                                                <a href="#!" class="text-white">Why People Like us</a>
                                            </h4>
                                        </div>
                                        <div class="footer_inner_choose_desc pt-2">
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                ut aliquip ex ea
                                                commodo. Build your online store with WooCommerce the most popular </p>
                                        </div>
                                        <div class="footer_inner_choose">
                                            <a href="#!"><button type="button" class="btn custom_btn rounded-pill px-4 text-white">View More <i class="fas fa-long-arrow-alt-right"></i></button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="footer_inner_info_content">
                                        <div class="footer_inner_info_title">
                                            <h4>
                                                <a href="#!" class="text-white">Information</a>
                                            </h4>
                                        </div>
                                        <div class="footer_inner_info_item pt-2">
                                            <ul class="list-unstyled">
                                                <li><a href="#!">About Us</a></li>
                                                <li><a href="#!">Delivery Information</a></li>
                                                <li><a href="#!">Privacy Policy</a></li>
                                                <li><a href="#!">Terms & Conditions</a></li>
                                                <li><a href="#!">Return Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="footer_inner_acct_content">
                                        <div class="footer_inner_acct_title">
                                            <h4>
                                                <a href="#!" class="text-white">My Account</a>
                                            </h4>
                                        </div>
                                        <div class="footer_inner_acct_item pt-2">
                                            <ul class="list-unstyled">
                                                <li><a href="#!">My Account</a></li>
                                                <li><a href="#!">Shopping Cart</a></li>
                                                <li><a href="#!">Wishlist</a></li>
                                                <li><a href="#!">Order History</a></li>
                                                <li><a href="#!">International Orders</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="footer_inner_cotc_content">
                                        <div class="footer_inner_ctc_title">
                                            <h4>
                                                <a href="#!" class="text-white">Contact Us</a>
                                            </h4>
                                        </div>
                                        <div class="footer_inner_ctc_info pt-2 text-white">
                                            <p>Address: <font>1429 Netus Rd, NY 48247</font>
                                            </p>
                                            <p>Email: <font>Organi@gmail.com</font>
                                            </p>
                                            <p>Phone: <font>(+87) 4886-4174</font>
                                            </p>
                                            <div class="footer_inner_payment_ctc">
                                                <div class="footer_inner_payment_title">
                                                    <h5 class="text-white">Payment Accepted</h5>
                                                </div>
                                                <div class="footer_inner_payment_thumb pt-3">
                                                    <a href="#!"><img src="assets/images/payment/payment.png" alt="image_not_found"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_bootom_content">
                        <div class="footer_bootom_wrap">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="footer_bootom_copyright">
                                            <p>Copyright © 2022 <font>ORGANI</font> Inc. All rights reserved.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="footer_bootom_privicy_cont d-flex justify-content-center align-items-center">
                                            <div class="footer_bootom_privicy pe-5">
                                                <a href="#!">
                                                    <p class="priv position-relative">Privacy Policy</p>
                                                </a>
                                            </div>
                                            <div class="footer_bootom_terms pe-5">
                                                <p class="position-relative">Terms of Use</p>
                                            </div>
                                            <div class="footer_bootom_refunds">
                                                <p>Sales and Refunds</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section end -->

        <!-- view recently products start -->

        <div class="modal fade recent_product" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="recent_product_title">Recent Products</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row g-2">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product9.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product10.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product11.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product12.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product9.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="product_layout_1 overflow-hidden position-relative">
                                        <div class="product_layout_content bg-white position-relative">
                                            <div class="product_image_wrap">
                                                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                                                    <img src="assets/images/product/product10.png" alt="image_not_found">
                                                </a>
                                                <ul class="product_badge_group ul_li_block">
                                                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">Meats</span>
                                                    </li>
                                                    <li><span class="product_badge badge_discount position-absolute rounded-pill">-27%</span>
                                                    </li>
                                                </ul>
                                                <ul class="product_action_btns ul_li_block d-flex">
                                                    <li><a class="tooltips" data-placement="top" title="Search Product" href="#!"><i class="fas fa-search"></i></a></li>
                                                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="#product_quick_view" data-bs-toggle="modal"><i class="fas fa-shopping-bag"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="rating_wrap d-flex">
                                                <ul class="rating_star ul_li">
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li class="active"><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span class="shop_review_text">( 4.0 )</span>
                                            </div>
                                            <div class="product_content">
                                                <h3 class="product_title">
                                                    <a href="product-detail.html">Organic Cabbage</a>
                                                </h3>
                                                <div class="product_price">
                                                    <span class="sale_price pe-1">$50.00</span>
                                                    <del>$65.00</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- view recently products end -->

        <!-- quick-view start -->

        <div class="modal fade quick_view" id="product_quick_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content position-relative">
                    <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    <div class="modal-body p-0">
                        <div class="container-fluid-full product10_wrap sec_space_small" style="background-image: url(assets/images/backgrounds/bg17.png)">
                            <div class="row justify-content-center p-5">
                                <div class="col-lg-6">
                                    <div class="product10_thumb_content d-flex flex-column">
                                        <div class="product11_slide_item">
                                            <div class="d-flex justify-content-center align-items-center position-relative overflow-hidden">
                                                <img src="assets/images/product/product40.png" alt="image_not_found">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center position-relative overflow-hidden">
                                                <img src="assets/images/product/product40.png" alt="image_not_found">
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center position-relative overflow-hidden">
                                                <img src="assets/images/product/product40.png" alt="image_not_found">
                                            </div>
                                        </div>

                                        <div class="product10_thumb_item product11_slide_thumb">
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product6.png" alt="image_not_found"></a>
                                            </div>
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product8.png" alt="image_not_found"></a>
                                            </div>
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product23.png" alt="image_not_found"></a>
                                            </div>
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product6.png" alt="image_not_found"></a>
                                            </div>
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product8.png" alt="image_not_found"></a>
                                            </div>
                                            <div class="thumb_item">
                                                <a href="#!"><img src="assets/images/product/product23.png" alt="image_not_found"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rating_wrap d-flex justify-content-between">
                                        <div class="rating_review_cont d-flex d-flex align-items-center">
                                            <ul class="rating_star ul_li">
                                                <li class="active"><i class="fas fa-star"></i></li>
                                                <li class="active"><i class="fas fa-star"></i></li>
                                                <li class="active"><i class="fas fa-star"></i></li>
                                                <li class="active"><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <a href="#!" class="review">Read 3 Reviews</a>
                                        </div>
                                        <div class="product_btn">
                                            <a href="#"><button type="button" class="btn custom_btn rounded-pill px-4 text-white">Smoothies</button></a>
                                        </div>
                                    </div>
                                    <h2 class="product_detail_title">Good Organic Products</h2>
                                    <p class="product_detail_desc py-2">Morbi eget congue lectus. Donec eleifend
                                        ultricies urna et euismod. Sed consectetur tellus eget odio aliquet, vel
                                        vestibulum tellus sollicitudin. Morbi maximus metus eu eros tincidunt, vitae
                                        mollis ante imperdiet. Nulla imperdiet at mauris ut posuere. Nam at ultrices
                                        justo.</p>
                                    <div class="product10_quantity_btn_wrap d-flex align-items-center">
                                        <div class="quantity_input bg-white">
                                            <form action="#">
                                                <span class="input_number_decrement">–</span>
                                                <input class="input_number" value="2KG">
                                                <span class="input_number_increment">+</span>
                                            </form>
                                        </div>
                                        <a href="#"><button type="button" class="btn custom_btn rounded-pill ms-3 px-5 py-3 text-white">Order Now
                                                <i class="fas fa-long-arrow-alt-right"></i></button></a>
                                    </div>
                                    <div class="product_tags_wrap d-flex align-items-center mt-5">
                                        <h6 class="product_tags_title text-uppercase">tags:</h6>
                                        <div class="tags_item d-flex align-items-center">
                                            <a href="#!">T-shirt,</a>
                                            <a class="ms-1" href="#!">Clothes,</a>
                                            <a class="ms-1" href="#!">Fashion,</a>
                                            <a class="ms-1" href="#!">Shop</a>
                                        </div>
                                    </div>
                                    <div class="product_social_links d-flex align-items-center">
                                        <h6 class="product_social_title text-uppercase">share:</h6>
                                        <ul class="list-unstyled d-flex mb-0">
                                            <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                            <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- quick-view end -->

    </div>
    <!-- body wrap end -->

    <!-- Include jquery js -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Include bootstrap-bundle js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Include aos js -->
    <script src="assets/js/aos.js"></script>

    <!-- Include jquery-magnific-popup js -->
    <script src="assets/js/magnific-popup.min.js"></script>

    <!-- Include nice-select js -->
    <script src="assets/js/nice-select.min.js"></script>

    <!-- Include jquery-countdown js -->
    <script src="assets/js/countdown.min.js"></script>

    <!-- Include slick js -->
    <script src="assets/js/slick.min.js"></script>

    <!-- Include custom js -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
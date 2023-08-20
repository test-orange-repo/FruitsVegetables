<?php



include('./process_pages/database.php');

session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $stmt = $conn->prepare("SELECT addresses.first_name, addresses.last_name, addresses.address, addresses.city, addresses.postcode, addresses.region, addresses.phone FROM addresses INNER JOIN users ON addresses.user_id = '" . $_SESSION["user_id"] ."'");
    $stmt->execute();
    $result = $stmt->get_result();
    // $address = $result->fetch_assoc();
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Organic - Food E-commerce HTML Template</title>
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
        <?php session_abort(); ?>
        <?php include('./navbar.php'); ?>

        <!-- main body start -->
        <main>

            <!-- sidebar section start -->
            <section class="sidebar_section">
                <div class="sidebar_content_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header align-items-center">
                                    <h5 class="mb_0">Organic Product</h5>
                                    <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src="assets/images/category/cat6.png" alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$50.00</span>
                                                <del>$70.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src="assets/images/category/cat7.png" alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$40.00</span>
                                                <del>$60.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src="assets/images/category/cat8.png" alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <h5>Organic Cabbage</h5>
                                            </div>
                                            <div class="prdc_ctg_product_price mt-1 product_price">
                                                <span class="sale_price pe-1">$70.00</span>
                                                <del>$90.00</del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total_price">
                                        <ul class="ul_li_block mb_30 clearfix">
                                            <li>
                                                <span>Subtotal:</span>
                                                <span>$215</span>
                                            </li>
                                            <li>
                                                <span>Vat 5%:</span>
                                                <span>$10.75</span>
                                            </li>
                                            <li>
                                                <span>Discount 15%:</span>
                                                <span>- $32.25</span>
                                            </li>
                                            <li>
                                                <span>Total:</span>
                                                <span>$191.8875</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar_btns">
                                        <ul class="btns_group ul_li_block clearfix">
                                            <li><a href="cart.html">View Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- sidebar section end -->

            <!-- Breadcrumb section start -->
            <section class="breadcrumb_sec_1 position-relative">
                <div class="breadcrumb_wrap sec_space_mid_small" style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
                    <div class="breadcrumb_cont text-center">
                        <div class="breadcrumb_title">
                            <h2 class="text-white">Checkout Page</h2>
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

            <section class="cart_section clearfix" data-aos="fade-up" data-aos-duration="2000">
                <div class="container">
                    <!-- Billing info start -->
                    <div class="billing_form mb_50">
                        <div class="billing">
                            <h3 class="form_title mb_30" style="display: inline-block;">Billing details</h3>
                            <div class="addresses" style="display: inline-block;">
                                <select name="" id="" style="display: inline-block;">
                                    <option value="">Choose an address</option>
                                    <?php
                                    while ($address = $result->fetch_assoc()) {
                                        $addressValue = $address["address"];
                                        if ($addressValue) {
                                            echo "<option>$addressValue</option>";
                                        }
                                    }
                                    ?>
                                    <!-- <option value=""></option> -->
                                </select>
                            </div>
                        </div>
                        <form action="./process_pages/placeOrder.php" method="POST">
                            <div class="form_wrap">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">First Name<sup>*</sup></span>
                                            <input type="text" name="firstname">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">Last Name<sup>*</sup></span>
                                            <input type="text" name="lastname">
                                        </div>
                                    </div>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Address<sup>*</sup></span>
                                    <input type="text" name="address" placeholder="House number and street name">
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Town/City<sup>*</sup></span>
                                    <input type="text" name="city">
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Postcode / Zip<sup>*</sup></span>
                                    <input type="text" name="postcode">
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Region<sup>*</sup></span>
                                    <input type="text" name="region">
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Phone<sup>*</sup></span>
                                    <input type="tel" name="phone">
                                </div>

                                <hr>

                            </div>
                        
                    </div>
                    <div class="billing_form" data-aos="fade-up" data-aos-duration="2000">
                        <h3 class="form_title mb_30">Your order</h3>
                        
                            <div class="form_wrap">
                                <div class="checkout_table table-responsive">
                                    <table class="table text-center mb_50">
                                        <thead class="text-uppercase text-uppercase">
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="assets/images/cart/cart1.png" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb_0">Top Curabitur Lectus</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">$69.00</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">2</span>
                                                </td>
                                                <td><span class="total_price">$138.00</span></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="assets/images/cart/cart2.png" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb_0">Dress Lobortis Laculis</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">$69.00</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">2</span>
                                                </td>
                                                <td><span class="total_price">$138.00</span></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="assets/images/cart/cart3.png" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb_0">Boot Curabitur Lectus</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text">$69.00</span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text">2</span>
                                                </td>
                                                <td><span class="total_price">$138.00</span></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="subtotal_text">Subtotal</span>
                                                </td>
                                                <td><span class="total_price">$414.00</span></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="subtotal_text">Shipping</span>
                                                </td>
                                                <td class="text-left">
                                                    <div class="checkbox_item mb_15">
                                                        <label for="shipping_checkbox"><input id="shipping_checkbox" type="checkbox" checked> Free Shipping</label>
                                                    </div>
                                                    <div class="checkbox_item mb_15">
                                                        <label for="flatrate_checkbox"><input id="flatrate_checkbox" type="checkbox"> Flat rate: $15.00</label>
                                                    </div>
                                                    <div class="checkbox_item">
                                                        <label for="localpickup_checkbox"><input id="localpickup_checkbox" type="checkbox"> Local Pickup:
                                                            $8.00</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="text-left">
                                                    <span class="subtotal_text">TOTAL</span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <span class="total_price">$135.00</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="billing_payment_mathod">
                                    <ul class="ul_li_block clearfix">
                                        <li>
                                            <div class="checkbox_item mb_15 pl-0">
                                                <label for="bank_transfer_checkbox"><input id="bank_transfer_checkbox" type="checkbox" checked> Direct Bank Transfer</label>
                                            </div>
                                            <p class="mb_0">
                                                Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order will not be shipped until the
                                                funds have cleared in our account.
                                            </p>
                                        </li>

                                        <li>
                                            <div class="checkbox_item mb_0 pl-0">
                                                <label for="check_payments"><input id="check_payments" type="checkbox">Check Payments</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item mb_0 pl-0">
                                                <label for="cash_delivery"><input id="cash_delivery" type="checkbox">
                                                    Cash On Delivery</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkbox_item mb_0 pl-0">
                                                <label for="paypal_checkbox"><input id="paypal_checkbox" type="checkbox"> Paypal</label>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit" class="custom_btn bg_default_red">PLACE ORDER</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </main>
        <!-- main body end -->

        <!-- footer section start -->
        <?php include('./footer.php'); ?>
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
                                        <ul class="list-unstyled d-flex mb_0">
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
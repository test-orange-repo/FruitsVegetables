<?php

include('./process_pages/database.php');

session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $stmt = $conn->prepare("SELECT addresses.first_name, addresses.last_name, addresses.address, addresses.city, addresses.postcode, addresses.region, addresses.phone FROM addresses INNER JOIN users ON addresses.user_id = '" . $_SESSION["user_id"] . "'");
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
    <title>Checkout</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
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

            <!-- Breadcrumb section start -->
            <section class="breadcrumb_sec_1 position-relative">
                <div class="breadcrumb_wrap sec_space_mid_small" style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
                    <div class="breadcrumb_cont text-center">
                        <div class="breadcrumb_title">
                            <h2 class="text-white">Checkout Page</h2>
                        </div>
                        <ul class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                            <li><a href="./index-4.php"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>Checkout</li>
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
                                <select name="" id="" style="display: inline-block; overflow:scroll" id="" class="selectAddress">
                                    <option value="0"></option>Choose an address</option>
                                    <?php
                                    $cnt = 1;
                                    while ($address = $result->fetch_assoc()) {
                                        $city = $address["city"];
                                        $region = $address["region"];
                                        $addressValue = $address["address"];
                                        $phone = $address["phone"];
                                        $postcode = $address["postcode"];
                                        if ($addressValue) {
                                            echo "<option>" . "Address " . $cnt . "</option>";
                                            $cnt++;
                                        }
                                    }
                                    ?>
                                    <!-- <option value=""></option> -->
                                </select>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION["user_id"])) {
                            $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = $user_id");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $user = $result->fetch_assoc();
                        }
                        ?>
                        <form action="./placeOrder.php" method="POST" id="addressForm">
                            <div class="form_wrap">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">First Name<sup>*</sup></span>
                                            <input type="text" class="fname" name="firstname" required value="<?= isset($_SESSION["user_id"]) ? $user["first_name"] : ""; ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form_item">
                                            <span class="input_title">Last Name<sup>*</sup></span>
                                            <input type="text" class="lname" name="lastname" required value="<?= isset($_SESSION["user_id"]) ? $user["last_name"] : ""; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Address<sup>*</sup></span>
                                    <input type="text" name="address" class="address" placeholder="House number and street name" required>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Town/City<sup>*</sup></span>
                                    <input type="text" class="city" name="city" required>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Postcode / Zip<sup>*</sup></span>
                                    <input type="text" class="postcode" name="postcode" required>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Region<sup>*</sup></span>
                                    <input type="text" class="region" name="region" required>
                                </div>

                                <div class="form_item">
                                    <span class="input_title">Phone<sup>*</sup></span>
                                    <input type="tel" class="phone" name="phone" required value="<?= isset($_SESSION["user_id"]) ?  0 . $user["user_phone"] : ""; ?>">
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
                                        <?php

                                        $cartSubTotal = 0;
                                        // $query = "SELECT  users.* , cartproduct.*, cart.*
                                        //             FROM cart 
                                        //             INNER JOIN cartproduct ON cart.cart_id = cartproduct.cart_id 
                                        //             INNER JOIN users ON cart.user_id = users.user_id";

                                        // $cart = mysqli_query($conn, $query);                                            
                                        // while($record = mysqli_fetch_array($cart)){

                                        $query1 = "SELECT cart.*, users.*
                                                        FROM cart 
                                                        INNER JOIN users ON cart.user_id = users.user_id";// we have to get the user id from the SESSION*******
                                            $cart = mysqli_query($conn, $query1);
                                            $recordcart = mysqli_fetch_array($cart);

                                        $query2 = "SELECT cart.*, cartproduct.*
                                                        FROM cart 
                                                        INNER JOIN cartproduct ON cart.cart_id  = cartproduct.cart_id ";
                                        $cartP = mysqli_query($conn, $query2);
                                        ///////////////////////////////////////////
                                        $query3 = "SELECT products.*, cartproduct.*
                                                        FROM products 
                                                        INNER JOIN cartproduct ON products.product_id  = cartproduct.product_id ";
                                        $cartProduct = mysqli_query($conn, $query3);



                                        while ($record = mysqli_fetch_array($cartProduct)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="cart_product">
                                                        <div class="item_image">
                                                            <img src="data:image/jpeg;base64,<?php echo base64_encode($record['product_image']); ?>" alt="image_not_found">
                                                        </div>
                                                        <div class="item_content">
                                                            <h4 class="item_title mb_0"><?php echo $record["product_name"]; ?></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="price_text"><?php echo $record["product_price"] . ' JOD'; ?></span>
                                                </td>
                                                <td>
                                                    <span class="quantity_text"><?php echo $record["product_quantity"]; ?></span>
                                                </td>
                                                <td><span class="total_price"><?php echo $record["product_price"] * $record["product_quantity"]; ?></span></td>
                                                <?php $cartSubTotal += $record["product_price"] * $record["product_quantity"] ?>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="subtotal_text">Subtotal</span>
                                            </td>
                                            <td><span class="total_price"><?php echo $cartSubTotal ?></span></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="subtotal_text">Shipping Fees</span>
                                            </td>
                                            <td class="text-left" style="padding-left: 150px">
                                                <div class="checkbox_item mb_15">
                                                    <label for="flatrate_checkbox"><input id="flatrate_checkbox" type="checkbox"> 2 JOD</label>
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
                                                    <span class="total_price">
                                                        <del><?php echo $cartSubTotal + 2 .' JOD' ?></del><br>
                                                        <?php echo $recordcart['cart_totalprice'] ?>
                                                    </span>                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="billing_payment_mathod">
                                    <ul class="ul_li_block clearfix">
                                        <li>
                                            <div class="checkbox_item mb_0 pl-0">
                                                <label for="cash_delivery"><input id="cash_delivery" type="checkbox">
                                                    Cash On Delivery</label>
                                            </div>
                                        </li>
                                
                                    </ul>
                                    <button type="submit" class="custom_btn ">PLACE ORDER</button>
                                    <?php $cartProduct = 0; ?>
                                </div>
                            </div>

                            <div class="billing_payment_mathod">
                                <ul class="ul_li_block clearfix">
                                    <li>
                                        <div class="checkbox_item mb_0 pl-0">
                                            <label for="cash_delivery"><input id="cash_delivery" type="checkbox">
                                                Cash On Delivery</label>
                                        </div>
                                    </li>

                                </ul>
                                <button type="submit" class="custom_btn ">PLACE ORDER</button>
                                <?php $cartProduct = 0; ?>
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
    <script src="assets/js/countdown.min.js"></script></script>

    <!-- Include slick js -->
    <script src="assets/js/slick.min.js"></script>

    <!-- Include custom js -->
    <script src="assets/js/custom.js"></script>

</body>

</html>

<?php
$user_id = $_SESSION["user_id"];
$stmt = $conn->prepare("SELECT first_name, last_name, address, city, postcode, region, phone FROM addresses WHERE user_id = ?");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$addresses = [];

while ($row = $result->fetch_assoc()) {
    $addresses[] = $row;
}
?>

<script>
    // Get address select box
    let selectAddress = document.querySelector('select.selectAddress');
    // get all inputs
    let fname = document.querySelector('form#addressForm input.fname');
    let lname = document.querySelector('form#addressForm input.lname');
    let address = document.querySelector('form#addressForm input.address');
    let city = document.querySelector('form#addressForm input.city');
    let postcode = document.querySelector('form#addressForm input.postcode');
    let region = document.querySelector('form#addressForm input.region');
    let phone = document.querySelector('form#addressForm input.phone');
    
    // Save address info array in a variable
    let userAddressInfo = <?php echo json_encode($addresses); ?>;

    // change the value of the inputs if the user chooses an address
    selectAddress.onchange = () => {
        if(selectAddress.value != "0") {
            let indx = selectAddress.selectedIndex;
            console.log(userAddressInfo[indx - 1]);
            fname.value = userAddressInfo[indx - 1]["first_name"];
            lname.value = userAddressInfo[indx - 1]["last_name"];
            address.value = userAddressInfo[indx - 1]["address"];
            city.value = userAddressInfo[indx - 1]["city"];
            city.value = userAddressInfo[indx - 1]["city"];
            postcode.value = userAddressInfo[indx - 1]["postcode"];
            region.value = userAddressInfo[indx - 1]["region"];
            phone.value = "0" + userAddressInfo[indx - 1]["phone"];
        }
        else {
            let indx = selectAddress.selectedIndex;
            console.log(userAddressInfo[indx - 1]);
            fname.value = <?php echo json_encode($user["first_name"]); ?>;
            lname.value = <?php echo json_encode($user["last_name"]); ?>;
            address.value = '';
            city.value = '';
            city.value = '';
            postcode.value = '';
            region.value = '';
            phone.value = "0" + <?php echo json_encode($user["user_phone"]);?>;
        }
    }
</script>

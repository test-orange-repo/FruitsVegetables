<?php
include('./process_pages/database.php');
?>

<!-- <?php
        // include('./process_pages/check_if_loggedIn.php');
        ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic</title>
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


        <?php include('navbar.php'); ?>


        <!-- main body start -->
        <main>
            <!-- sidebar section start -->
            <section class="sidebar_section">
                <div class="sidebar_content_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header align-items-center">
                                    <h5 class="mb-0">Organic Products</h5>
                                    <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="prdc_ctg_product_content mt-1 d-flex align-items-center">
                                        <div class="prdc_ctg_product_img d-flex justify-content-center align-items-center me-3">
                                            <img src="assets/images/category/cat6.png" alt="image_not_found">
                                        </div>
                                        <div class="prdc_ctg_product_text">
                                            <div class="prdc_ctg_product_title my-2">
                                                <a href="shop-list.html">
                                                    <h5>Organic Cabbage</h5>
                                                </a>
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
                                                <a href="shop-list.html">
                                                    <h5>Organic Cabbage</h5>
                                                </a>
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
                                                <a href="shop-list.html">
                                                    <h5>Organic Cabbage</h5>
                                                </a>
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

            <!-- banner4 section start -->
            <section class="banner4_section position-relative sec_space_large">
                <div class="banner4_section_wrap">
                    <div class="container">
                        <div class="row slide_content slideshow6_slider mx-3" data-slick='{"dots": false}'>
                            <div class="slide_item_content d-flex justify-content-center align-items-center">
                                <div class="col-lg-6">
                                    <div class="banner4_sub_cont position-relative">
                                        <h6 class="text-white text-uppercase position-absolute">100% Organic Foods</h6>
                                        <img class="banner4_sub_bg mb-4" src="assets/images/shapes/shape2.png" alt="image_not_found">
                                    </div>
                                    <div class="banner4_title text-effect">
                                        <h1>Organic Veggies Foods <font class="text-effect">
                                                <span>H</span><span>e</span><span>a</span><span>l</span><span>t</span><span>h</span><span>y</span>
                                            </font>
                                        </h1>
                                    </div>
                                    <p class="banner4_desc">Welcome to a world where every choice you make contributes to a healthier, more vibrant future. At <font>ORGANI</font>, we are more than just a brand – we are your partners in embracing the power of organic living.</p>
                                    <div class="banner4_btn">
                                        <a href="./about-us.php"><button type="button" class="btn custom_btn load_more_1 rounded-pill px-5 py-3 text-white">Read More
                                                <i class="fas fa-long-arrow-alt-right"></i></button></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="banner10_img img_moving_anim1">
                                        <img src="assets/images/banner/banner7.png" alt="image_not_found">
                                    </div>
                                </div>
                            </div>
                            <div class="slide_item_content d-flex justify-content-center align-items-center">
                                <div class="col-lg-6">
                                    <div class="banner4_sub_cont position-relative">
                                        <h6 class="text-white text-uppercase position-absolute">100% Organic Foods</h6>
                                        <img class="banner4_sub_bg mb-4" src="assets/images/shapes/shape2.png" alt="image_not_found">
                                    </div>
                                    <div class="banner4_title">
                                        <h1>Organic Veggies Foods <font class="text-effect">
                                                <span>H</span><span>e</span><span>a</span><span>l</span><span>t</span><span>h</span><span>y</span>
                                            </font>
                                        </h1>
                                    </div>
                                    <p class="banner4_desc">Welcome to a world where every choice you make contributes to a healthier, more vibrant future. At <font>ORGANI</font>, we are more than just a brand – we are your partners in embracing the power of organic living.</p>
                                    <div class="banner4_btn">
                                        <a href="./about-us.php"><button type="button" class="btn custom_btn load_more_1 rounded-pill px-5 py-3 text-white">Read More
                                                <i class="fas fa-long-arrow-alt-right"></i></button></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="banner10_img img_moving_anim1">
                                        <img src="assets/images/product/product51.png" alt="image_not_found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="banner4_slide_arrow_cont">
                        <div class="banner4_arrow1 d-flex align-items-center position-absolute ss6_left_arrow">
                            <i class="fas fa-arrow-left"></i>
                            <div class="slide_arrow_left shadow d-flex justify-content-center align-items-center">
                                <img src="assets/images/product/product49.png" alt="image_not_found">
                            </div>
                        </div>
                        <div class="banner4_arrow2 d-flex align-items-center position-absolute ss6_right_arrow">
                            <a class="slide_arrow_right shadow d-flex justify-content-center align-items-center" href="#!"><img src="assets/images/product/product23.png" alt="image_not_found"></a>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <!-- banner left img -->
                <div class="banner_left_img position-absolute">
                    <img src="assets/images/shapes/shape35.png" alt="image_not_found">
                </div>
            </section>
            <!-- banner section end -->

            <!-- sale-3 section start -->
            <section class="sale3_sec sec_inner_bottom_80" data-aos="fade-up" data-aos-duration="2000">
                <div class="sale3_sec_wrap">
                    <div class="container">
                        <div class="row gx-3">
                            <div class="col-lg-6">
                                <div class="sale3_content d-flex flex-column justify-content-left align-items-center overflow-hidden sec_space_xs_70" style="background-image: url(assets/images/backgrounds/bg9.png);" data-aos="fade-right" data-aos-duration="1000">
                                    <h3 class="sale3_title" style="margin-left: 80px; font-size: xx-large;">Sale 50% Off All Vegetables Products</h3>
                                    <span class="sale3_subtitle text-uppercase">tast of nature</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sale3_content2 sec_space_xs_70" style="background-image: url(assets/images/offer/offer9.png);" data-aos="fade-left" data-aos-duration="1000">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="sale3_text">
                                                <h3 class="sale3_title" style="font-size: xx-large ;">Sale 30% Off All Fruite Products</h3>
                                                <span class="sale3_subtitle text-uppercase">tast of nature</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- sale-3 section end -->




            <!-- category section start -->
            <section class="category_section sec_ptb_100 position-relative overflow-hidden clearfix" data-aos="fade-up" data-aos-duration="2000">
                <div class="category_section_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="category_top_content">
                                <div class="category_top_content_text d-flex flex-column justify-content-center align-items-center">
                                    <div class="category_sub_title d-flex align-items-center">
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <span class="px-2">Explore More</span>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <div class="category_title pb-3">
                                        <h2>Our Varieties</h2>
                                    </div>
                                </div>
                            </div>



                            <div class="category_slick  clearfix d-flex justify-content-center align-items-center  px-0" data-slick='{"dots": false}'>


                                <!-- /////////////////////////////////////php/////////////////////////////////////////// -->
                                <?php
                                // SELECT query
                                $sql = "SELECT * FROM categories";

                                // Execute the query
                                $result = mysqli_query($conn, $sql);

                                // Check if the query was successful
                                if (!$result) {
                                    die("Query Faild" . mysqli_error());
                                } else {
                                    while ($row = mysqli_fetch_array($result)) {

                                        // print_r($row);
                                ?>
                                        <div class="col item_content slider_item" data-aos="fade-up" data-aos-duration="300">
                                            <a href="shop-list.php?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="item_image_content overflow-hidden position-relative">
                                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($row['category_img']); ?>" alt="image_not_found">
                                                    <h6 class="item_title position-absolute rounded-pill"><?php echo $row['category_name']; ?></h6>
                                                </div>
                                            </a>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- category banner side image start -->
                <img class="category_left_thumb position-absolute" src="assets/images/shapes/shape36.png" alt="image_not_found">
                <img class="category_right_thumb position-absolute" src="assets/images/shapes/shape28.png" alt="image_not_found">
                <!-- category banner side image end -->
            </section>
            <!-- category section end -->







            <!-- sale2 section start -->
            <section class="sale2_section_2 mt-5" data-aos="fade-up" data-aos-duration="2000">
                <div class="sale2_section_wrap sec_space_small sale2_bg d-flex justify-content-center align-items-center">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <div class="sale_pro_thumb img_moving_anim1">
                                    <img src="assets/images/product/product42.png" alt="image_not_found">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="sale2_content_wrap ps-3">
                                    <div class="sale2_sub_cont position-relative">
                                        <h6 class="text-white text-uppercase position-absolute">New Organic Foods</h6>
                                        <img class="sale2_sub_bg mb-4" src="assets/images/shapes/shape2.png" alt="image_not_found">
                                    </div>
                                    <div class="sale2_title text-effect py-2">
                                        <h2>Sale 68% Off <br> All <font>
                                                <span>F</span><span>r</span><span>u</span><span>i</span><span>t</span><span>e</span>
                                                <span>P</span><span>r</span><span>o</span><span>d</span><span>u</span><span>c</span><span>t</span><span>s</span>
                                            </font>
                                        </h2>
                                    </div>
                                    <div class="sale2_desc">
                                        <p>Indulge in a sensational shopping experience at our fruits and vegetables sales, where savings bloom as brilliantly as our produce! With discounts soaring up to a remarkable 68%, you can feast on a rainbow of freshness without emptying your wallet</p>
                                    </div>
                                    <div class="countdown_box2 py-2">
                                        <ul class="countdown_timer2 ul_li"data-countdown="2023/8/24"></ul>
                                    </div>
                                    <div class="sale2_btn load_more_1">
                                        <a href="#!"><button type="button" class="btn custom_btn rounded-pill px-5 py-3  text-white">Explore More
                                                <i class="fas fa-long-arrow-alt-right"></i></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- sale2 section end -->







            <br><br><br>
            <!-- service section start -->
            <section class="service_setion sec_space_xs_70" data-aos="fade-up" data-aos-duration="2000">
                <div class="category_top_content">
                    <div class="category_top_content_text d-flex flex-column justify-content-center align-items-center">
                        <div class="category_sub_title d-flex align-items-center">
                            <i class="far fa-circle"></i>
                            <i class="far fa-circle"></i>
                            <i class="far fa-circle"></i>
                            <span class="px-2">Learn More</span>
                            <i class="far fa-circle"></i>
                            <i class="far fa-circle"></i>
                            <i class="far fa-circle"></i>
                        </div>
                        <div class="category_title pb-3">
                            <h2>Why Choose Organi?</h2>
                        </div>
                    </div>
                </div>
                <div class="service_content_wrap service_content_3 sec_space_xs_70" style="background-image: url(assets/images/backgrounds/bg19.png);">
                    <div class="container">
                        <div class="service_inner_wrap d-flex justify-content-between align-items-center">
                            <div class="service_inner_content" data-aos="fade-up" data-aos-duration="500">
                                <div class="service_inner_content3 bg-white d-flex flex-column align-items-center justify-content-center">
                                    <div class="service_icon2 mb-2">
                                        <img src="assets/images/services/service10.png" alt="image_not_found">
                                    </div>
                                    <div class="service_content py-1 text-center">
                                        <h6>Free Delivery</h6>
                                        <span>from $50</span>
                                    </div>
                                </div>
                            </div>
                            <div class="service_inner_content" data-aos="fade-up" data-aos-duration="1000">
                                <div class="service_inner_content3 bg-white d-flex flex-column align-items-center justify-content-center">
                                    <div class="service_icon2 mb-2">
                                        <img src="assets/images/services/service11.png" alt="image_not_found">
                                    </div>
                                    <div class="service_content py-1 text-center">
                                        <h6>99 % Customer</h6>
                                        <span>Feedbacks</span>
                                    </div>
                                </div>
                            </div>
                            <div class="service_inner_content" data-aos="fade-up" data-aos-duration="1500">
                                <div class="service_inner_content3 bg-white d-flex flex-column align-items-center justify-content-center">
                                    <div class="service_icon2 mb-2">
                                        <img src="assets/images/services/service12.png" alt="image_not_found">
                                    </div>
                                    <div class="service_content py-1 text-center">
                                        <h6>365 Days</h6>
                                        <span>for free return</span>
                                    </div>
                                </div>
                            </div>
                            <div class="service_inner_content" data-aos="fade-up" data-aos-duration="2000">
                                <div class="service_inner_content3 bg-white d-flex flex-column align-items-center justify-content-center">
                                    <div class="service_icon2 mb-2">
                                        <img src="assets/images/services/service13.png" alt="image_not_found">
                                    </div>
                                    <div class="service_content py-1 text-center">
                                        <h6>Payment</h6>
                                        <span>Secure System</span>
                                    </div>
                                </div>
                            </div>
                            <div class="service_inner_content" data-aos="fade-up" data-aos-duration="2500">
                                <div class="service_inner_content3 bg-white d-flex flex-column align-items-center justify-content-center">
                                    <div class="service_icon2 mb-2">
                                        <img src="assets/images/services/service14.png" alt="image_not_found">
                                    </div>
                                    <div class="service_content py-1 text-center">
                                        <h6>Only Best</h6>
                                        <span>Brands</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- service section end -->

            <br><br><br>

        </main>
        <!-- main body end -->

        <?php include("./footer.php") ?>


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
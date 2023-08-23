<?php

//Load Composer's autoloader
require "vendor/autoload.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];


    $formErrors = array();

    if (strlen($comment) < 10) {
        $formErrors[] = 'Message Can\'t Be Less Than 10 Characters';
    } else {


        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output

        $mail->isSMTP();           //Send using SMTP
        $mail->SMTPAuth   = true;    //Enable SMTP authentication
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        $mail->Username   = 'leenaalrababah@gmail.com';                     //SMTP username
        $mail->Password   = 'qbtmlyrgohmzrxlw';                               //SMTP password

        //Recipients
        $mail->setFrom($email, $fname);
        $mail->addAddress('leenaalrababah@gmail.com', 'Leena');     //Add a recipient

        $mail->Subject = " ";
        $mail->Body    = "From: $email\n $comment";

        $mail->send();

        // echo "Email send";
        header("location: sent.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic</title>
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
                            <h2 class="text-white">Contact Us</h2>
                        </div>
                        <ul class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                            <li><a href="./index-4.php"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb section end -->

            <!-- contact-us section start -->
            <section class="contact_us_sec sec_space_small" data-aos="fade-up" data-aos-duration="2000">
                <div class="contact_us_wrap">
                    <div class="container">
                        <div class="contact_top_cont">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="contact_us_tetimonial d-flex flex-column" data-aos="fade-right" data-aos-duration="2000">
                                        <span class="tetimonial_desc">Why Contact Us?</span>

                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <p class="contact_top_desc" data-aos="fade-left" data-aos-duration="2000">
                                        <li><strong class="text-lg fs-5">Support:</strong> </li>
                                        If you're experiencing any technical issues or need help navigating our website, our support team is ready to assist you.
                                        <br><br>
                                        <li><strong class="text-lg fs-5"> Feedback:</strong> </li>
                                        Your opinions matter to us. Share your thoughts, suggestions, or feedback about your experience. We value your insights as they help us improve and provide you with a better service.
                                        <br><br>
                                        <li><strong class="text-lg fs-5"> Collaboration:</strong> </li>
                                        Interested in collaborating or partnering with us? Reach out to discuss potential opportunities. We're open to exploring partnerships that align with our mission.
                                        <br><br>
                                        <li><strong class="text-lg fs-5">Inquiries: </strong> </li>
                                        Have questions about our products, services, or policies? Contact us, and we'll provide you with the information you need.
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-us section end -->

            <!-- contact-info section start -->

            <section class="contact_us_info position-relative" data-aos="fade-up" data-aos-duration="2000">
                <div class="comment_area_wrap" style="background-image: url(assets/images/backgrounds/bg15.png)">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 sec_space_small position-relative">
                                <div class="trend_sub_title d-flex align-items-center pb-3">
                                    <i class="far fa-circle"></i>
                                    <i class="far fa-circle"></i>
                                    <i class="far fa-circle"></i>
                                    <span class="text-uppercase px-3 text-dark">we love to here from you</span>
                                </div>
                                <h3 class="comment_area_title mb-5">Leave a Message</h3>
                                <div class="comment_form_area">
                                    <form action=" <?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form_item">
                                                    <input class="rounded-pill" type="text" name="fname" placeholder="Your Name*" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form_item">
                                                    <input class="rounded-pill" type="text" name="lname" placeholder="Your Name*" required>
                                                </div>
                                            </div>
                                            <div class="col-lg">
                                                <div class="form_item">
                                                    <input class="rounded-pill" type="email" name="email" placeholder="Email Address*" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form_item">
                                            <textarea name="comment" placeholder="your Comment*" required></textarea>
                                            <div class="error">
                                                <?php
                                                if (isset($formErrors)) {
                                                    foreach ($formErrors as $error) { ?>
                                                        <p class="text-danger" style="margin-left: 20px; margin-bottom:20px"> <?php echo $error; ?> </p>
                                                <?php  }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn custom_btn rounded-pill py-3 text-white text-uppercase">Send
                                            Message <i class="fas fa-long-arrow-alt-right"></i></button>

                                    </form>
                                </div>
                                <!-- contact-info-right side thumb -->
                                <img class="contact_info_thumb_right position-absolute" src="assets/images/product/product36.png" alt="image_not_found">
                            </div>
                            <div class="col-lg-6">
                                <div class="map_section clearfix">
                                    <div id="mapBox" data-lat="32.5553" data-lon="35.8498" data-zoom="13" data-info="Irbid" data-mlat="32.5553" data-mlon="35.8498">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contact-info-left side thumb -->
                <img class="contact_info_thumb_left position-absolute" src="assets/images/shapes/shape22.png" alt="image_not_found">

            </section>
            <!-- contact-info section end -->

            <!-- address-section start -->
            <section class="address_sec sec_space_small" data-aos="fade-up" data-aos-duration="2000">
                <div class="address_sec_wrap">
                    <div class="container-sm">
                        <div class="row g-5 justify-content-center align-items-center">
                            <div class="col-md-6 col-lg-4 text-center">
                                <div class="address_sec_cont d-flex flex-column position-relative" data-aos="fade-right" data-aos-duration="2000">
                                    <div class="address_author bg-white position-absolute">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div class="trend_sub_title d-flex align-items-center justify-content-center pb-2">
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <span class="text-uppercase px-3">GET TO KNOW</span>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <h4 class="address_title">About Organi</h4>
                                    <p class="address_desc">We are a strong community of 100,000+ customers</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center">
                                <div class="address_sec_cont d-flex flex-column position-relative" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="address_author bg-white position-absolute">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="trend_sub_title d-flex align-items-center justify-content-center pb-2">
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <span class="text-uppercase px-3">visit us</span>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <h4 class="address_title">Our Address</h4>
                                    <p class="address_desc">Jordan - Irbid City</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center">
                                <div class="address_sec_cont d-flex flex-column position-relative" data-aos="fade-left" data-aos-duration="2000">
                                    <div class="address_author2 bg-white position-absolute">
                                        <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <div class="address_author3 bg-white position-absolute">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <div class="trend_sub_title d-flex align-items-center justify-content-center pb-2">
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <span class="text-uppercase px-3">Call or write</span>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                        <i class="far fa-circle"></i>
                                    </div>
                                    <h4 class="address_title">Phone & Email</h4>
                                    <p class="address_desc">0791579601 needhelp@organi.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- address-section end -->

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

    <!-- Include gmaps js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk2HrmqE4sWSei0XdKGbOMOHN3Mm2Bf-M&ver=2.1.6">
    </script>
    <script src="assets/js/gmaps.min.js"></script>

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
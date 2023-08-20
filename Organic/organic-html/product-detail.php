<?php
include('./process_pages/database.php');

?>
   
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details V.1 - Organic - Food E-commerce HTML Template</title>
    <!-- favicon icon -->
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon">

    <!-- Include fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Include google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

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
   

    <?php include('./navbar.php'); ?>
        
            <!-- Breadcrumb section start -->
            <section class="breadcrumb_sec_1 position-relative">
                <div class="breadcrumb_wrap sec_space_mid_small"
                    style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
                    <div class="breadcrumb_cont text-center">
                        <div class="breadcrumb_title">
                            <h2 class="text-white">Product Details</h2>
                        </div>
                        <ul
                            class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                            <li><a href="index.html"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>About</li>
                            <li><i class="fas fa-chevron-right"></i>Dried</li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb section end -->




<?php
$product_id=$_GET['id']  ?? 0;
$product="SELECT * FROM products WHERE `product_id`=$product_id";
$result = mysqli_query($conn, $product);
$singleProduct = mysqli_fetch_array( $result);
$productName = $singleProduct['product_name'];
$productPrice = $singleProduct['product_price']  ;
$productDiscription = $singleProduct['product_description']  ;


$commentscount = "SELECT COUNT(*) as total FROM comment WHERE `product_id`=$product_id ";
$result3 = mysqli_query($conn, $commentscount);
$row = mysqli_fetch_assoc($result3);
$totalComments = $row['total'];





          echo '
            <section class="product10_sec sec_space_small">
                <div class="product10_wrap">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 position-relative">
                                <div
                                    class="product10_thumb img_moving_anim1 position-relative d-flex justify-content-center align-items-center">
                                    <img src="data:image/png;base64, ' . base64_encode($singleProduct['product_image']) . '" alt="image_not_found">
                                    <div class="product10_back_thumb1 position-absolute">
                                        <img src="data:image/png;base64, ' . base64_encode($singleProduct['product_image']) . '" alt="image_not_found">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                             
                                <h2 class="product_detail_title mt-4">'.$productName.'</h2>
                                <p class="product_detail_desc py-2">'.$productDiscription.'</p>
                                <div class="rating_wrap d-flex justify-content-between mt-4" style="font-size:20px;">
                                <div class="rating_review_cont d-flex d-flex align-items-center">
                                    <ul class="rating_star ul_li">
                                        <li class="active"><i class="fas fa-star fa-xl"></i></li>
                                        <li class="active"><i class="fas fa-star fa-xl"></i></li>
                                        <li class="active"><i class="fas fa-star fa-xl"></i></li>
                                        <li class="active"><i class="fas fa-star fa-xl"></i></li>
                                        <li class="active"><i class="fas fa-star-half-stroke fa-xl"></i></li>
                                    </ul>
                                    <a href="#pills-reviews-tab" class="review">Read '. $totalComments.' Reviews</a>
                                </div>
                                
                            </div>
                                <p class="product_detail py-4 mt-4" style="font-size:20px;">'.$productPrice. ' JD per Kilo'.'</p>
                               
                                <div class="product10_quantity_btn_wrap d-flex align-items-center">
                                    <div class="quantity_input">
                                        <form action="#">
                                            <span class="input_number_decrement">–</span>
                                            <input class="input_number" value="1KG">
                                            <span class="input_number_increment">+</span>
                                        </form>
                                    </div>
                                    <a href="./cart.php?id='.$product_id.'"><button type="button"
                                            class="btn custom_btn rounded-pill ms-3 px-5 py-3 text-white">Order Now <i
                                                class="fas fa-long-arrow-alt-right"></i></button></a>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product-10 section end -->

           ' ?>

            <!-- product-10 reviews section start -->
            <section class="product10_reviews sec_inner_bottom_80" data-aos="fade-up" data-aos-duration="2000">
                <div class="product10_reviews_wrap">
                    <div class="container">
                        <div class="d-flex justify-content-center justify-content-lg-start align-items-center">
                            <ul class="product_tabnav_3 nav nav-pills my-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link  shadow rounded-pill text-uppercase"
                                        id="pills-description-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-description" type="button" role="tab"
                                        aria-controls="pills-description" aria-selected="true">description</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link shadow rounded-pill text-uppercase"
                                        id="pills-Information-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Information" type="button" role="tab"
                                        aria-controls="pills-Information" aria-selected="false">Additional
                                        Information</button>
                                </li>
                    
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active shadow rounded-pill text-uppercase" id="pills-reviews-tab" 
                                        data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab"
                                        aria-controls="pills-reviews" aria-selected="false">reviews (<?php echo $totalComments; ?>)</button>
                                </li>
                            </ul>
                        </div>




                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show " id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="row mb_50">
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <div class="content_wrap">
                                            <h3 class="title_text mb_15">Description:</h3>
                                            <p class="mb_15">
                                            Indulge in the wholesome goodness of our premium organic product. 
                                            Our product is carefully cultivated and harvested, bringing you the 
                                            finest flavors and textures from our farm to your table. With a 
                                            perfect blend of nutrients and natural goodness, our product i
                                            s a testament to our commitment to quality and sustainability. 
                                            </p>
                                            <p class="mb_15">
                                            Whether you're a seasoned food lover or an aspiring chef, 
                                            our product is sure to elevate your culinary creations.
                                             Explore the rich taste, vibrant colors, and delightful aromas 
                                             that our product brings to your kitchen. 
                                            </p>
                                            <p class="mb-0">
                                            Join us in embracing a healthier and more flavorful lifestyle with our exceptional organic offering.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade show" id="pills-Information" role="tabpanel"
                                aria-labelledby="pills-Information-tab">
                                <div class="row mb_50">
                                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                                        <div class="content_wrap">
                                            <h3 class="info_content_title">Why Choose Our Products?</h3>
                                            <p class="mb_30">
                                            Our products are a testament to our dedication to quality and sustainability. 
                                            Grown with care and without harmful chemicals, they bring you flavors that are 
                                            pure and ingredients that are wholesome. From farm to table, our commitment to 
                                            excellence ensures each bite is a step towards a healthier you and a healthier planet. 
                                            Discover the difference of consciously chosen produce and savor the authentic taste 
                                            of nature's finest.
                                            </p>

                                            <h4 class="list_title">Our Product Quality</h4>
                                            <p class="mb_30">
                                            We take pride in delivering products that meet the highest standards of quality.
                                             Carefully cultivated and harvested at peak freshness, our offerings are a celebration 
                                             of nature's bounty. From vibrant colors to rich flavors, our products embody the essence
                                              of premium organic produce. With every bite, 
                                            experience the superior taste and nutritional benefits that come from a dedication to uncompromising quality.
                                            </p>

                                            <h4 class="list_title">Customar Feedback</h4>
                                            <p class="mb_30">
                                            Our customers' satisfaction is at the heart of everything we do. We value your opinions and 
                                            continuously strive to exceed your expectations. Your feedback fuels our commitment to excellence 
                                            and inspires us to innovate. We're grateful for your support and look forward to hearing about your 
                                            experiences with our products. Your insights drive us to continually enhance our offerings and create
                                             an even better shopping experience for you.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pills-reviews" role="tabpanel"
    aria-labelledby="pills-reviews-tab">
        <div class="row">
            <div class="col-lg-6">
                <div class="review_comment2">
                    <h3 class="title_text">Reviews:</h3>


<?php 



$comments = "SELECT * FROM comment WHERE `product_id`=$product_id";
$result = mysqli_query($conn, $comments);

if (mysqli_num_rows($result) > 0) {
 
    while ($comment = mysqli_fetch_array($result)) {
        $text = $comment['comment_text'];
        $date = $comment['comment_date'];
        $userid = $comment['user_id'];
        $rating = $comment['rating']; 

        $user_query = "SELECT * FROM users WHERE `user_id`=$userid";
        $result2 = mysqli_query($conn, $user_query);
        $user = mysqli_fetch_array($result2);
        $name = $user['user_name'];
        $email = $user['user_email'];

        echo '
        <ul class="review_comment_list2 ul_li_block">
            <li class="review_comment_wrap2">
                <h4 class="admin_name">' . $name . ' <span class="comment_date">' . $date . '</span></h4>
                <ul class="rating_star ul_li">';
    // Display the rating stars based on the rating value
    for ($i = 1; $i <= 5; $i++) {
        $active = $i <= $rating ? "active" : "";
        echo '<li class="' . $active . '"><i class="fas fa-star"></i></li>';
    }
    echo '
                </ul>
                <p class="mb-0">' . $text . '</p>
            </li>
        </ul>';}}
            ?>
             <?php
            if (isset($_SESSION['user_id'])) {
                // Display the comment form only if the user is logged in
                echo '
                <div class="comment_form_area">
                <div class="form_item">

            </div>
                    <form method="post" action="./process_pages/process_comment.php?id='.$product_id.'">
                    <input type="hidden" name="rating" id="ratingInput" value="0">
                    <div class="rating_input">
                    <span class="rating_title" style="font-size:30px;">Rating:</span>
                    <ul class="rating_stars " style="color:Green ; ">
                       <a href="#" data-rating="1"><i class="far fa-star fa-lg" style="color: #f5ac2e;"></i></a>
                        <a href="#" data-rating="2"><i class="far fa-star fa-lg" style="color: #f5ac2e;"></i></a>
                        <a href="#" data-rating="3"><i class="far fa-star fa-lg" style="color: #f5ac2e;"></i></a>
                        <a href="#" data-rating="4"><i class="far fa-star fa-lg" style="color: #f5ac2e;"></i></a>
                        <a href="#" data-rating="5"><i class="far fa-star fa-lg" style="color: #f5ac2e;"></i></a>
                    </ul>
                </div>
                        <div class="form_item">
                            <textarea name="comment" placeholder="Your Comment*"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn custom_btn rounded-pill py-3 text-white text-uppercase">
                            Post Comment <i class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </form>
                </div>';
            } else {
                // Display a message to log in if the user is not logged in
                echo '<p class="mt-4">Please <a href="login.php">log in</a> to post a comment.</p>';
            }

    
            ?>
        </div>
    </div>
</section>

<!-- HTML -->


<input type="hidden" name="rating" id="ratingInput" value="0">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingStars = document.querySelectorAll('.rating_stars a');
    const ratingInput = document.getElementById('ratingInput');

    ratingStars.forEach(star => {
        star.addEventListener('click', function(event) {
            event.preventDefault();
            const selectedRating = star.getAttribute('data-rating');
            ratingInput.value = selectedRating;

            // Update the visual appearance of stars
            ratingStars.forEach(s => {
                const starRating = s.getAttribute('data-rating');
                if (starRating <= selectedRating) {
                    s.innerHTML = '<i class="fas fa-star fa-xl" style="color: #f5ac2e;"></i>';
                } else {
                    s.innerHTML = '<i class="far fa-star fa-lg" style="color: #f5ac2e;"></i>';
                }
            });
        });
    });
});
</script>

            <!-- product section start -->
            <section class="product_section sec_top_space_50 sec_inner_bottom_100" data-aos="fade-up"
            data-aos-duration="2000">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product_sec_content">
                                <div class="product_sec_sub_title d-flex align-items-center pb-2">
                                    <i class="far fa-circle"></i>
                                    <i class="far fa-circle"></i>
                                    <i class="far fa-circle"></i>
                                    <span>FRESH FROM OUR FARM</span>
                                </div>
                                <h2 class="product_sec_title pb-3">Popular Organic Items</h2>
                            </div>
                        </div>
                        <div class="col-lg-6 ul_li_right">
                        <ul class="countdown_timer ul_li" data-countdown="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"></ul>
                        </div>
                    </div>

                    <?php

$display = "SELECT * FROM products WHERE category_id = 1 ORDER BY RAND() LIMIT 4";
$result = mysqli_query($conn, $display);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="row g-4">';
    
    while ($row = mysqli_fetch_array($result)) {
        $productname = $row['product_name'];
        $productprice = $row['product_price'];
        
        echo '

<div class="col-sm-6 col-lg-3">
    <div class="product_layout_1 overflow-hidden position-relative">
        <div class="product_layout_content bg-white position-relative">
            <div class="product_image_wrap">
                <a class="product_image d-flex justify-content-center align-items-center"
                    href="product-detail.html">
                    <img class="pic-1" src="data:image/png;base64, ' . base64_encode($row['product_image']) . '" alt="image_not_found">
                    <img class="pic-2" src="data:image/png;base64, ' . base64_encode($row['product_image']) . '" alt="image_not_found">
                </a>
                
                <ul class="product_action_btns ul_li_block d-flex">
                    <li><a class="tooltips" data-placement="top" title="Search Product"
                    href="product-detail.php?id='.$row["product_id"].'"><i class="fas fa-search"></i></a></li>
                    <li><a class="tooltips" data-placement="top" title="Add To Cart"
                    href="cart.php?id='. $row["product_id"]. '" "data-bs-toggle="modal"><i
                                class="fas fa-shopping-bag"></i></a></li>
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
                    <a href="product-detail.html">' . $productname . '</a>
                </h3>
                <div class="product_price">
                    <span class="sale_price pe-1">$' . $productprice . '</span>
                
                </div>
            </div>
        </div>
    </div>
</div>';
    }
    echo '</div>'; // Close the row g-4 div
}
?>


  

      

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
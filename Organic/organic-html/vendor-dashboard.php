<?php


include('./process_pages/database.php');

session_start();

$_SESSION['admin_logged'] = 0;

$admin = mysqli_query($conn, "SELECT * FROM admins");
$adminInfo = mysqli_fetch_array($admin);

// Check if the user is logged in
if (!isset($_SESSION['admin_logged'])) {
   // Redirect to login page or restricted access page
   header("Location: ./signup-login.php");
   exit();
}

// If admin_logged is 0, redirect to restricted access page
if (($_SESSION['admin_logged'] == 0) && ($adminInfo['is_loggedIn'] == '0')) {
   header("Location: ./notAdmin.php");
   exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Organic - Dashboard</title>
   <!-- favicon icon -->
   <link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">

   <!-- Include font-awesome cdn -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- Include google fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
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

   <!-- PopUp -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
   

   <style>
      th, td{
         text-align: center;
      }

      .swal2-confirm {
         background-color: #7cc000;
         color: white;
      }
   </style>
   
</head>

<body>
   
   <!-- body wrap start -->
   <div class="body-wrap overflow-hidden">
      <!-- back-to-top start -->
      <div class="backtotop">
         <a href="#!" class="scroll">
            <i class="fas fa-arrow-up fw-bold"></i>
         </a>
      </div>
      <!-- back-to-top end -->
      
      <!----------------------------------------------- NavBar ----------------------------------------------->
      <!-- header section start -->
      <header class="header_section header_1">
         <!-- top header start -->
         <div class="top_header_main d-none d-sm-block">
            <div class="container">
               <div class="header_top d-flex align-items-center justify-content-between">
                  <div class="header_top_content d-flex pt-2">
                     <div class="mail_text_content d-flex">
                        <p class="mail_icon"><span><i class="far fa-envelope text-white pe-2"></i></span></p>
                        
                        <?php
                           
                           $admin = mysqli_query($conn, "SELECT * FROM admins");
                           $adminInfo = mysqli_fetch_array($admin);
                           
                        ?>   
                        <p class="mail_text"><?php echo $adminInfo["admin_email"]; ?></p>
                        
                     </div>
                     <div class="address_text_content d-flex">
                        <p class="mail_icon"><span><i class="fas fa-map-marker-alt text-white pe-2"></i></span></p>
                        <p class="address_text">Irbid ,Jordan</p>
                     </div>
                  </div>
                  <div class="header_top_socials pt-2">
                     <ul class="list-unstyled d-flex">
                        <li><a href="https://www.facebook.com/marah.a.saleh.7?mibextid=ZbWKwL" target="blank"><i class="fab fa-facebook-f text-white pe-3"></i></a></li>
                        <li><a href="https://twitter.com/MarahAbuSaleh1?t=RbKD6ZN0qe4hlLZWP8Ed_Q&s=09" target="blank"><i class="fab fa-twitter text-white pe-3"></i></a></li>
                        <li><a href="https://instagram.com/marah.abusaleh.25?igshid=ZGUzMzM3NWJiOQ==" target="blank"><i class="fab fa-instagram text-white pe-3"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/marah-abusaleh-a4202a244" target="blank"><i class="fab fa-linkedin-in text-white"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!-- top header end -->

         <!-- bottom header start -->
         <div class="header_bottom_main header_border">
            <div class="container">
               <!-- web menubar start-->
               <div class="webMenu d-none d-lg-block position-relative">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <a class="navbar-brand position-relative" href="index.html"><img src="assets/images/logo/logo.png"
                           alt="image_not_found"></a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                  </nav>
                  <!-- webmenu bottom shape -->
               </div>
               <!-- mobile menubar start -->
               <div class="mobileMenu d-block d-lg-none">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <a class="navbar-brand" href="index.html"><img src="assets/images/logo/logo.png"
                           alt="image_not_found"></a>
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <!--/////////////////////////////////////////// END Of Nav ///////////////////////////////////////////-->
      <!-- main body start -->
      
      <main>
         <!-- sidebar section start -->
         <section class="sidebar_section">
            <div class="sidebar_content_wrap">
               <div class="container">
                  <div class="row">
                     <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header align-items-center">
                           <h5 class="mb-0">Organic Products</h5>
                           <button type="button" class="btn-close text-reset text-end" data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
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
            <div class="breadcrumb_wrap sec_space_mid_small"
               style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
               <div class="breadcrumb_cont text-center">
                  <div class="breadcrumb_title">
                     <h2 class="text-white text-uppercase">Dashboard</h2>
                  </div>
                  <ul
                     class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
                     <li><a href="./index-4.php"><i class="fas fa-home active"></i>Home</a></li>
                  </ul>
               </div>
            </div>
         </section>
         <!-- Breadcrumb section end -->

         <!-- vendor_dashboard_section - start
                  ================================================== -->
         <section class="vendor_dashboard_section bg_gray" data-aos="fade-up"
         data-aos-duration="2000">
            <div class="container">
               <div class="row">
                  <div class="col col-lg-3">
                     <div class="vd_tab_area">
                        <div class="vd_space">
                           <div class="vd_info_wrap text-center">
                              <div class="vd_image">
                                 <div class="image_wrap">
                                    
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($adminInfo['admin_img']); ?>" alt="Product Image">
                                    
                                 </div>
                              </div>
                              <h2 class="vd_mane"><?php echo $adminInfo["admin_firstname"].' '. $adminInfo["admin_lastname"]; ?></h2>
                              <span class="vd_mail"><a href="#!"><?php echo $adminInfo["admin_email"];?></a></span>
                           </div>
                        </div>

                        <ul class="vd_tab_nav nav ul_li_block" role="tablist">
                           <li>
                              <button class="active" data-bs-toggle="tab" data-bs-target="#tab_dashboard" type="button"
                                 role="tab" aria-selected="true">
                                 Dashboard
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_Categories" type="button" role="tab"
                                 aria-selected="false">
                                 Categories
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_products" type="button" role="tab"
                                 aria-selected="false">
                                 Products
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_orders" type="button" role="tab"
                                 aria-selected="false">
                                 Orders
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_admins" type="button" role="tab"
                                 aria-selected="false">
                                 Admins
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_users" type="button" role="tab"
                                 aria-selected="false">
                                 Users
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_comments" type="button" role="tab"
                                 aria-selected="false">
                                 Comments
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_discount" type="button" role="tab"
                                 aria-selected="false">
                                 Discount Coupon
                              </button>
                           </li>
                           <li>
                              <button data-bs-toggle="tab" data-bs-target="#tab_profile" type="button" role="tab"
                                 aria-selected="false">
                                 Profile
                              </button>
                           </li>
                           <li>
                              <!-- go to login page when it's created  -->
                              <a href="./logout.php">Logout</a> 
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col col-lg-9">
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab_dashboard" role="tabpanel">
                           <div class="row">
                              <div class="col col-lg-4">
                                 <div class="funfact_item"
                                    style="background-image: url('assets/images/funfact/funfact_bg_1.png');" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="item_content">
                                       <?php
                                       $sqlCount = "SELECT COUNT(*) AS productCount FROM products";
                                       $result = mysqli_query($conn, $sqlCount);

                                       if ($result) {
                                          $row = mysqli_fetch_assoc($result);
                                          $productCount = $row['productCount'];
                                       } else {
                                          $productCount = 0; // Default value in case of an error
                                       }
                                       ?>
                                       <h3>Total Products</h3>
                                       <span><?php echo $productCount; ?></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col col-lg-4">
                                 <div class="funfact_item"
                                    style="background-image: url('assets/images/funfact/funfact_bg_2.png');" data-aos="fade-up" data-aos-duration="1500">
                                    <div class="item_content">
                                       <?php
                                       $sqlCount = "SELECT COUNT(*) AS usersCount FROM users";
                                       $result = mysqli_query($conn, $sqlCount);

                                       if ($result) {
                                          $row = mysqli_fetch_assoc($result);
                                          $usersCount = $row['usersCount'];
                                       } else {
                                          $usersCount = 0; // Default value in case of an error
                                       }
                                       ?>
                                       <h3>Total Users</h3>
                                       <span><?php echo $usersCount; ?></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col col-lg-4">
                                 <div class="funfact_item"
                                    style="background-image: url('assets/images/funfact/funfact_bg_3.png');" data-aos="fade-up" data-aos-duration="2000">
                                    <div class="item_content">
                                       <?php
                                       $sqlCount = "SELECT COUNT(*) AS orderCount FROM orders";
                                       $result = mysqli_query($conn, $sqlCount);

                                       if ($result) {
                                          $row = mysqli_fetch_assoc($result);
                                          $orderCount = $row['orderCount'];
                                       } else {
                                          $orderCount = 0; // Default value in case of an error
                                       }
                                       ?>
                                       <h3>Total Orders</h3>
                                       <span><?php echo $orderCount; ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="total_revenue" data-aos="fade-up" data-aos-duration="2000">
                              <div class="vd_title_wrap">
                                 <h3>Total Revenue</h3>
                              </div>
                              <div class="vd_shadow">
                                 <canvas id="revenue_chart"></canvas>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_Categories" role="tabpanel">
                           <div class="trending_products">
                              <div class="vd_title_wrap">
                                 <h3>Categories List</h3>
                                 <a href="./categoryprocess/insertCategory.php">
                                    <button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                                    Category</button>
                                 </a>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Category Image</th>
                                             <th>Category ID</th>
                                             <th>Category Name</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php

                                          $categories = mysqli_query($conn, "SELECT * FROM categories");
                                          while($record = mysqli_fetch_array($categories)){
                                          ?>
                                             
                                                <tr>
                                                      <td><img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['category_img']); ?>" alt="Category Image"></td>
                                                      <th><?php echo $record["category_id"]; ?></th>                                
                                                      <td><?php echo $record["category_name"]; ?></td>
                                                      <td>
                                                         <ul class="btns_group ul_li">
                                                            <li>
                                                               <a href='./categoryprocess/updateCategory.php?category_id=<?php echo $record["category_id"];?>' style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href='./categoryprocess/deleteCategory.php?category_id=<?php echo $record["category_id"];?>' style="background-color: inherit; border: 0px" onclick="return confirm('Are you sure you want to delete this category?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>   
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_products" role="tabpanel">
                           <div class="trending_products">
                              <div class="vd_title_wrap">
                                 <h3>Products</h3>
                                 <a href="./productprocess/insertProduct.php?">
                                    <button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                                    Product</button>
                                 </a>
                              </div>
                              <div class="vd_shadow p-0" style="overflow-x: hidden;">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Product Image</th>
                                             <th style="padding: 0px">Product ID</th>
                                             <th>Product Name</th>
                                             <th>Product Description</th>
                                             <th>Product Price</th>
                                             <th>Category Name</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $query = "SELECT products.*, categories.category_name 
                                                      FROM products 
                                                      INNER JOIN categories ON products.category_id = categories.category_id";
                                          $products = mysqli_query($conn,$query);
                                          while($record = mysqli_fetch_array($products)){
                                          ?>
                                             
                                                <tr>
                                                      <td><img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['product_image']); ?>" alt="Product Image"></td>
                                                      <th style="padding: 1px"><?php echo $record["product_id"]; ?></th>                                
                                                      <td><?php echo $record["product_name"]; ?></td>
                                                      <td><?php echo $record["product_description"]; ?></td>                                
                                                      <td><?php echo $record["product_price"]. ' JOD'; ?></td>
                                                      <td><?php echo $record["category_name"]; ?></td>
                                                      <td>
                                                         <ul class="btns_group ul_li">
                                                            <li>
                                                               <a href="./productprocess/updateProduct.php?product_id=<?php echo $record["product_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="./productprocess/deleteProduct.php?product_id=<?php echo $record["product_id"];?>" style="background-color: inherit; border: 0px" onclick="return confirm('Are you sure you want to delete this order?')" >
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_orders" role="tabpanel">
                           <div class="recent_orders">
                              <div class="vd_title_wrap">
                                 <h3>Orders</h3>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Order ID</th>
                                             <th>User Name</th>
                                             <th>Order Date</th>
                                             <th>Order Status</th>
                                             <th>Order Total Amount</th>
                                             <th>Order Address</th>
                                             <th>Order Details</th>                                             
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $query = "SELECT orders.*, users.* 
                                                      FROM orders 
                                                      INNER JOIN users ON orders.user_id = users.user_id";
                                          $orders = mysqli_query($conn,$query);
                                          while($record = mysqli_fetch_array($orders)){
                                          ?>
                                             
                                                <tr>
                                                      <th><?php echo $record["order_id"]; ?></th>  
                                                      <?php $odID =  $record["order_id"]; ?>                           
                                                      <td><?php echo $record["first_name"] . ' ' . $record["last_name"]; ?></td> 
                                                      <td><?php echo $record["order_date"]; ?></td>                                
                                                      <td><?php echo $record["order_stutes"]; ?></td>
                                                      <td><?php echo $record["order_totalamount"]. ' JOD'; ?></td>                                
                                                      <td><?php echo $record["order_address"]; ?></td>
                                                      <td>
                                                         <ul class="btns_group ul_li" style="justify-content: center; -webkit-box-pack: center;">
                                                            <li>
                                                               <a href="./orderprocess/viewOrderDetails.php?order_id=<?php echo $record["order_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_blue showPopupButton">
                                                                     <i class="fas fa-columns"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                      <td>
                                                         <ul class="btns_group ul_li" style="justify-content: center; -webkit-box-pack: center;">
                                                            <li>
                                                               <a href="./orderprocess/updateOrderStatus.php?order_id=<?php echo $record["order_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>   
                                                            </li>
                                                            <li>
                                                               <a href="./orderprocess/deleteOrder.php?order_id=<?php echo $record["order_id"];?>" style="background-color: inherit; border: 0px" onclick="return confirm('Are you sure you want to delete this order?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <div class="tab-pane fade" id="tab_admins" role="tabpanel">
                           <div class="recent_orders">
                              <div class="vd_title_wrap">
                                 <h3>Admins</h3>
                                 <a href="./adminsprocess/insertAdmin.php?">
                                    <button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                                    Admin</button>
                                 </a>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Admin Image</th>
                                             <th style="padding: 0px">Admin ID</th>
                                             <th>Name</th>
                                             <th>Admin Name</th>
                                             <th>Admin Email</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php

                                          $admins = mysqli_query($conn, "SELECT * FROM admins");
                                          while($record = mysqli_fetch_array($admins)){
                                          ?>
                                             
                                                <tr>
                                                      <td><img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['admin_img']); ?>" alt="Product Image"></td>
                                                      <th style="padding: 1px"><?php echo $record["admin_id"]; ?></th>                                
                                                      <td><?php echo $record["admin_firstname"] . ' ' . $record["admin_lastname"]; ?></td>                                
                                                      <td><?php echo $record["admin_username"]; ?></td>
                                                      <td><?php echo $record["admin_email"]; ?></td>
                                                      <td>
                                                         <ul class="btns_group ul_li">
                                                            <li>
                                                               <a href="./adminsprocess/updateAdmin.php?admin_id=<?php echo $record["admin_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="./adminsprocess/deleteAdmin.php?admin_id=<?php echo $record["admin_id"];?>" style="background-color: inherit; border: 0px"  onclick="return confirm('Are you sure you want to delete this user?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_users" role="tabpanel">
                           <div class="recent_orders">
                              <div class="vd_title_wrap">
                                 <h3>Users</h3>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>User Image</th>
                                             <th style="padding: 0px">User ID</th>
                                             <th>Name</th>
                                             <th>User Name</th>
                                             <th>User Email</th>
                                             <th>User Phone</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php

                                          $users = mysqli_query($conn, "SELECT * FROM users");
                                          while($record = mysqli_fetch_array($users)){
                                          ?>
                                             
                                                <tr>
                                                      <td><img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['user_img']); ?>" alt="Product Image"></td>
                                                      <th style="padding: 1px"><?php echo $record["user_id"]; ?></th>                                
                                                      <td><?php echo $record["first_name"] . ' ' . $record["last_name"]; ?></td>                                
                                                      <td><?php echo $record["user_name"]; ?></td>
                                                      <td><?php echo $record["user_email"]; ?></td>                              
                                                      <td><?php echo $record["user_phone"]; ?></td>
                                                      <td>
                                                         <ul class="btns_group ul_li">
                                                            <li>
                                                               <a href="./usersprocess/updateUser.php?user_id=<?php echo $record["user_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="./usersprocess/deleteUser.php?user_id=<?php echo $record["user_id"];?>" style="background-color: inherit; border: 0px"  onclick="return confirm('Are you sure you want to delete this user?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_comments" role="tabpanel">
                           <div class="recent_orders">
                              <div class="vd_title_wrap">
                                 <h3>Comments</h3>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>User Image</th>
                                             <th>User ID</th>
                                             <th>User Name</th>
                                             <th>Comment ID</th>
                                             <th>Comment Content</th>
                                             <th>Product Name</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $query1 = "SELECT comment.*, users.*
                                                      FROM comment 
                                                      INNER JOIN users ON comment.user_id = users.user_id";
                                          $comment = mysqli_query($conn, $query1);

                                          $query2 = "SELECT comment.*, products.*
                                                      FROM comment 
                                                      INNER JOIN products ON comment.product_id  = products.product_id ";
                                          $commentProduct = mysqli_query($conn, $query2);
                                          $row = mysqli_fetch_array($commentProduct);

                                          while($record = mysqli_fetch_array($comment)){
                                          ?>
                                                <tr>
                                                      <td><img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['user_img']); ?>" alt="Product Image"></td>
                                                      <th><?php echo $record["user_id"]; ?></th>                                
                                                      <td><?php echo $record["first_name"] . ' ' . $record["last_name"]; ?></td>                                
                                                      <td><?php echo $record["comment_id"]; ?></td>
                                                      <td><?php echo $record["comment_text"]; ?></td>  
                                                      <td><?php echo $row["product_name"]; ?></td>  
                                                      <td>
                                                         <ul class="btns_group ul_li" style="justify-content: center; -webkit-box-pack: center;">
                                                            <li>
                                                               <a href="./commentprocess/deleteComment.php?comment_id=<?php echo $record["comment_id"];?>"" style="background-color: inherit; border: 0px" onclick="return confirm('Are you sure you want to delete this comment?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_discount" role="tabpanel">
                           <div class="recent_orders">
                              <div class="vd_title_wrap">
                                 <h3>Discount Coupon</h3>
                                 <a href="./discountprocess/insertsDiscount.php?">
                                    <button type="button" class="btn custom_btn"><i class="far fa-plus"></i> Add
                                    Discount Coupon</button>
                                 </a>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Discount Coupon</th>
                                             <th>Discount Percentage</th>
                                             <th>Edit/Delete</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          $query = "SELECT * FROM discount";
                                          $discount = mysqli_query($conn, $query);

                                          while($record = mysqli_fetch_array($discount)){
                                          ?>
                                                <tr>
                                                      <td><?php echo $record['discount_text']; ?></td>
                                                      <td><?php echo $record["discount_percentage"] * 100 . '%'; ?></td>                                
                                                      
                                                      <td>
                                                         <ul class="btns_group ul_li" style="justify-content: center; -webkit-box-pack: center;">
                                                         <li>
                                                               <a href="./discountprocess/updateDiscount.php?discount_id=<?php echo $record["discount_id"];?>" style="background-color: inherit; border: 0px">
                                                                  <button type="button" class="bg_green">
                                                                     <i class="fas fa-edit"></i>
                                                                  </button>
                                                               </a>
                                                         </li>   
                                                         <li>
                                                               <a href="./discountprocess/deleteDiscount.php?discount_id=<?php echo $record["discount_id"];?>"" style="background-color: inherit; border: 0px" onclick="return confirm('Are you sure you want to delete this comment?')">
                                                                  <button type="button" class="bg_orange">
                                                                     <i class="fas fa-trash-alt"></i>
                                                                  </button>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </td>
                                                </tr>
                                                
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane fade" id="tab_profile" role="tabpanel">
                           <div class="profile_table">
                              <div class="vd_title_wrap">
                                 <h3>Profile</h3>
                                 <ul class="btns_group ul_li">
                                    <li>
                                       <?php
                                          $admin = mysqli_query($conn, "SELECT * FROM admins");
                                          $adminInfo = mysqli_fetch_array($admin);
                                          
                                       ?>
                                       <a href="./adminprofileprocess/updateAdminInfo.php?admin_id=<?php echo $adminInfo["admin_id"];?>" style="background-color: inherit; border: 0px">
                                          <button type="button" class="bg_green">
                                             <i class="fas fa-edit"></i>
                                          </button>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="vd_shadow p-0">
                                 <div class="vd_table table-responsive">
                                    <table class="table table-striped">
                                       <tbody>
                                          <tr>
                                             <td><span><strong>Admin First Name</strong></span></td>
                                             <td><span><?php echo $adminInfo["admin_firstname"] ;?></span></td>
                                          </tr>
                                          <tr>
                                             <td><span><strong>Admin Last Name</strong></span></td>
                                             <td><span><?php echo $adminInfo["admin_lastname"];?></span></td>
                                          </tr>
                                          <tr>
                                             <td><span><strong>Admin Username</strong></span></td>
                                             <td><span><?php echo $adminInfo["admin_username"]?></span></td>
                                          </tr>
                                          <tr>
                                             <td><span><strong>Email Address</strong></span></td>
                                             <td><span><?php echo $adminInfo["admin_email"]?></span></td>
                                          </tr>
                                          <tr>
                                             <td><span><strong>Reset Password</strong></span></td>                                             
                                             <td colspan="2"><a href="./resetAdminPass.php?admin_id=<?php echo $adminInfo["admin_id"]; ?>"><button type="submit" class="custom_btn" style="padding:5px; font-size:15px">Reset Password</button></a></td>                                          
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- vendor_dashboard_section - end -->

      </main>
      <!-- main body end -->

   </div>
   <!-- body wrap end -->

   <!-- Include jquery js -->
   <script src="assets/js/jquery.min.js"></script>

   <!-- Include bootstrap-bundle js -->
   <script src="assets/js/bootstrap.bundle.min.js"></script>

   <!-- Include aos js -->
   <script src="assets/js/aos.js"></script>

   <!-- Include chart js -->
   <script src="assets/js/chart.js"></script>

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

<script>
   function showDetails(orderId) {
         Swal.fire({
            <?php
               // $query = "SELECT orderitems.*, orders.* 
               //          FROM orderitems 
               //          INNER JOIN orders ON orderitems.order_id = orders.order_id ";
               //          $orderitems = mysqli_query($conn,$query);
               //          $record = mysqli_fetch_array($orderitems);

               // $query2 = "SELECT orderitems.*, products.* 
               //          FROM orderitems 
               //          INNER JOIN products ON orderitems.product_id  = products.product_id ";
               //          $orderitems = mysqli_query($conn,$query2);
               //          $record = mysqli_fetch_array($orderitems);
               
               $query = "SELECT orderitems.*, orders.*, products.* 
                        FROM orderitems 
                        INNER JOIN orders ON orderitems.order_id = orders.order_id 
                        INNER JOIN products ON orderitems.product_id = products.product_id";

               $orderitems = mysqli_query($conn, $query);
               
               $record = mysqli_fetch_array($orderitems);
            ?>
            title: "Order Details",
            confirmButtonText: "OK",
            html:
               '<div class="vd_shadow p-0">' +
               '<div class="vd_table table-responsive">' +
               '<form>' +
               '<label for="fname">Order ID:</label>' +
               '<span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px">' + orderId + '</span><br><br>' +
               '<label for="fname">Product Name:</label>' +
               '<span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["product_name"]; ?></span><br><br>' +
               '<label for="fname">Product Quantity:</label>' +
               '<span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["orderItem_quntity"]; ?></span><br><br>' +
               '<label for="fname">Order Item SubTotal:</label>' +
               '<span style="color:#7cc000; padding:10px; font-weight:bold; font-size:20px"><?php echo $record["orderItem_subtotal"]; ?></span><br><br>' +
               
               '</form>' +
               '</div>'+
               '</div>'
               
         });
   }
</script>
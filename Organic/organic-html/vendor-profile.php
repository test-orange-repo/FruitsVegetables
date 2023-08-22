<?php

// session_start();

include('./process_pages/database.php');

// include('./process_pages/check_if_loggedIn.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Organic</title>
  <!-- favicon icon -->
  <link rel="shortcut icon" href="assets/images/icons/favicon.ico" type="image/x-icon" />

  <!-- Include fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Include google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <!-- Include bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <!-- Include aos CSS -->
  <link rel="stylesheet" href="assets/css/aos.css" />

  <!-- Include magnific-popup CSS -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css" />

  <!-- Include nice-select CSS -->
  <link rel="stylesheet" href="assets/css/nice-select.css" />

  <!-- Include slick-theme CSS -->
  <link rel="stylesheet" href="assets/css/slick-theme.css" />

  <!-- Include slick CSS -->
  <link rel="stylesheet" href="assets/css/slick.css" />

  <!-- Include stylesheet CSS -->
  <link rel="stylesheet" href="assets/css/style.css" />

  <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.min.css
" rel="stylesheet">

  <style>
    .vd_table .btns_group button {
      width: 40px;
      height: 40px;
      color: #ffffff;
      font-size: 14px;
      text-align: center;
      border-radius: 100%;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      display: -webkit-inline-box;
      display: -ms-inline-flexbox;
      display: inline-flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
    }

    .vd_table .bg_blue {
      background-color: #017fff;
    }

    .circle-container {
      width: 1rem;
      height: 1rem;
      color: #ffffff;
      line-height: 2.3rem;
      text-align: center;
      border-radius: 100%;
      background-color: #7cc000;
    }

    .circle-container:hover {
      display: block;
      text-decoration: none;
      color: #7cc000;
    }
  </style>

</head>



<body>

  <?php include('./navbar.php'); ?>

  <?php
  if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $stmt = $conn->prepare("SELECT first_name, last_name, user_name, user_email, user_password, user_phone FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt = $conn->prepare("SELECT user_img FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_img = $result->fetch_assoc();
  }
  ?>

  <!-- body wrap start -->
  <div class="body-wrap overflow-hidden">
    <!-- back-to-top start -->
    <div class="backtotop">
      <a href="#!" class="scroll">
        <i class="fas fa-arrow-up fw-bold"></i>
      </a>
    </div>
    <!-- back-to-top end -->

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
                    <img src="assets/images/category/cat6.png" alt="image_not_found" />
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
                    <img src="assets/images/category/cat7.png" alt="image_not_found" />
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
                    <img src="assets/images/category/cat8.png" alt="image_not_found" />
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
      <div class="breadcrumb_wrap sec_space_mid_small" style="
              background-image: url(assets/images/breadcrumb/breadcrumb1.png);
            ">
        <div class="breadcrumb_cont text-center">
          <div class="breadcrumb_title">
            <h2 class="text-white text-uppercase">Vendor Profile V.1</h2>
          </div>
          <ul class="list-unstyled breadcrumb_item d-flex justify-content-center align-items-center text-white">
            <li>
              <a href="index.html"><i class="fas fa-home active"></i>Home</a>
            </li>
            <li><i class="fas fa-chevron-right"></i>Profile V.1</li>
          </ul>
        </div>
      </div>
    </section>
    <!-- Breadcrumb section end -->

    <!-- vendor profile start -->
    <section class="vendor_profile_section sec_space_small" data-aos="fade-up" data-aos-duration="2000">
      <div class="container">
        <div class="vendor_profile">
          <div class="row vendor_content_wrap">
            <div class="col-lg-4">
              <div class="image_wrap" data-aos="fade-right" data-aos-duration="2000">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($user_img['user_img']); ?>" alt="image_not_found">
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form">
                <form action="./process_pages/edit_user_info.php" method="POST" class="profile-form" enctype="multipart/form-data">
                  <div class="inpt">
                    <label for="">First name</label>
                    <input type="text" name="fname" value="<?php echo $user["first_name"]; ?>" disabled>
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>

                  <div class="inpt">
                    <label for="">Last name</label>
                    <input type="text" name="lname" disabled value="<?php echo $user["last_name"]; ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>

                  <div class="inpt">
                    <label for="">Username</label>
                    <input type="text" name="username" disabled value="<?php echo $user["user_name"]; ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>

                  <div class="inpt">
                    <label for="">Email</label>
                    <input type="text" name="email" disabled value="<?php echo $user["user_email"]; ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>

                  <div class="inpt">
                    <label for="">Phone</label>
                    <input type="text" name="phone" disabled value="0<?php echo $user["user_phone"]; ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>
                  <div class="inpt">
                    <label for="">Photo</label>
                    <input type="file" name="image" disabled>
                    <i class="fa-solid fa-pen-to-square"></i>
                  </div>
                  <div class="btns">
                    <button type="submit">Save</button>
                    <button type="button" class="cancle">Cancle</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        <?php
$user_id = $_SESSION["user_id"];

$sql = "SELECT * from orders WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="billing_form container" data-aos="fade-up" data-aos-duration="2000" style="padding-top: 35px;">
                <h3 class="form_title mb_30">Your Orders</h3>
                <div class="form_wrap">
                    <div class="checkout_table table-responsive">
                        <table class="table text-center mb_50">
                            <thead class="text-uppercase text-uppercase">
                                <tr>
                                    <th>Order Number</th>
                                    <th>Order Address</th>
                                    <th>Order Status</th>
                                    <th>Order Total Price</th>
                                    <th>View More Details</th>
                                </tr>
                            </thead>
                            <tbody>';

        $query1 = "SELECT orders.*, orderitems.*
                    FROM orders 
                    INNER JOIN orderitems ON orderitems.order_id = orders.order_id
                    WHERE orders.user_id = $user_id";
        $orders = mysqli_query($conn, $query1);

        while ($record = mysqli_fetch_array($orders)) {
            echo '<tr>
                    <td>' . $record['order_id'] . '</td>
                    <td><span class="price_text">' . $record["order_address"] . '</span></td>
                    <td><span class="quantity_text">' . $record["order_stutes"] . '</span></td>
                    <td><span class="quantity_text">' . $record["order_totalamount"] . '</span></td>
                    <td>
                        <ul class="btns_group ul_li" style="justify-content: center; -webkit-box-pack: center;">
                            <li style="width: 25%; height: 5%;">
                                <a class="circle-container" href="./viewOrdersToUser.php?order_id=' . $record["order_id"] . '" style="border: 0px;">
                                    <i class="fas fa-columns position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                  </tr>';
        }

        echo '</tbody>
            </table>
        </div>
    </div>
</div>';
    }
    else {
      echo '<div style="display:flex; justify-content:center; margin-top: 15px"><a style="color:red" href="./index-4.php"><button class ="custom_btn">Shop Now</button></a></div>';
    }
}
?>

      </div>


    </section>

    <!-- vendor profile end -->




  </div>
  <!-- main body end -->

  <!-- footer section start -->
  <footer class="footer_section position-relative">
    <div class="footer_section_wrap sec_top_space_50" style="background-image: url(assets/images/footer/footer.png)">
      <div class="container">
        <div class="footer_top_content d-flex flex-column flex-lg-row justify-content-between align-items-center">
          <div class="footer_top_logo">
            <a href="index.html"><img src="assets/images/logo/logo2.png" alt="image_not_found" /></a>
          </div>
          <div class="footer_top_subs position-relative">
            <input class="rounded-pill" type="search" name="search" placeholder="Your Phone Number" />
            <a href="#!"><button type="button" class="btn custom_btn rounded-pill text-white position-absolute">
                Subscribe Now
                <i class="fas fa-long-arrow-alt-right"></i></button></a>
          </div>
          <div class="footer_top_social">
            <ul class="list-unstyled d-flex justify-content-end">
              <li class="me-3">
                <a href="#!"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="me-3">
                <a href="#!"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li class="me-3">
                <a href="#!"><i class="fab fa-youtube"></i></a>
              </li>
              <li>
                <a href="#!"><i class="fab fa-google-plus-g"></i></a>
              </li>
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
                    <p>
                      Ut enim ad minim veniam, quis nostrud exercitation
                      ullamco laboris nisi ut aliquip ex ea commodo. Build
                      your online store with WooCommerce the most popular
                    </p>
                  </div>
                  <div class="footer_inner_choose">
                    <a href="#!"><button type="button" class="btn custom_btn rounded-pill px-4 text-white">
                        View More
                        <i class="fas fa-long-arrow-alt-right"></i></button></a>
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
                        <a href="#!"><img src="assets/images/payment/payment.png" alt="image_not_found" /></a>
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
                    <p>
                      Copyright © 2022 <font>ORGANI</font>
                      Inc. All rights reserved.
                    </p>
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

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.all.min.js"></script>

</body>

</html>


<script>
  // 
  const usersData = <?php echo json_encode($user); ?>;

  let userDataKeys = Object.keys(usersData);

  // Handle editing inputs
  let editIcons = document.querySelectorAll(".vendor_profile_section .inpt i");
  let profileInputs = document.querySelectorAll(".vendor_profile_section .inpt input");
  let formBtn = document.querySelector(".vendor_profile form .btns");
  let cancleEdition = document.querySelector(".vendor_profile form .btns .cancle");

  editIcons.forEach((icon, indx) => {
    icon.addEventListener("click", () => {
      profileInputs[indx].removeAttribute("disabled");
      formBtn.style.display = "block";
    });
  });

  cancleEdition.onclick = () => {
    let keyIndx = 0;
    formBtn.style.display = "none";
    profileInputs.forEach(proInp => {
      proInp.setAttribute("disabled", "disabled");
      if (userDataKeys[keyIndx] != "user_password") {
        proInp.value = usersData[userDataKeys[keyIndx]];
      }
      keyIndx++;
    });
  };
</script>

<?php
$errorMsg = isset($_SESSION["editError"]) ? $_SESSION["editError"] : false;
?>

<script>
  let errorMsg = <?php echo json_encode($errorMsg); ?>; // Ensure the value is properly encoded for JavaScript

  console.log(errorMsg);

  if (errorMsg) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: errorMsg,
    });
  }

  <?php unset($_SESSION["editError"]); ?>
</script>
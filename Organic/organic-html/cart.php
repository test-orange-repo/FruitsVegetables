<?php

include('./process_pages/database.php');

$discount = false;

if (isset($_POST['code'])) {
    $discountQuery = "SELECT * FROM discount WHERE discount_text = '" . $_POST['code'] . "'";
    $result = mysqli_query($conn, $discountQuery);

    if ($result->num_rows > 0) {
        $record = mysqli_fetch_assoc($result);

        $code = $_POST['code'];

        if ($code == $record["discount_text"]) {
            $discount = true;
            $discountPercentage = $record["discount_percentage"];
           
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
    <title>Cart</title>
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

        <?php include('./navbar.php');


if(isset($_POST['submit1'])&&$_SERVER['REQUEST_METHOD']=='POST') { 
        $ID = $_GET["id"] ?? 0;
        $quantity = 1;

    

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }



        $existingProductId = array_column($_SESSION["cart"], "productID");

        if (in_array($ID, $existingProductId)) {

        } else {
            $_SESSION['cart'][] = array(
                "productID" => $ID,
                "quantity" => $quantity
            );
        }
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
                            <li><a href="./index-4.php"><i class="fas fa-home active"></i>Home</a></li>
                            <li><i class="fas fa-chevron-right"></i>Cart</li>
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
                             
if(isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $product){
        $id = $product["productID"];
        $sql = "SELECT * FROM products WHERE product_id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
       while( $row = mysqli_fetch_assoc($result)){
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_description = $row['product_description'];
            $product_price = $row['product_price'];
            $product_quantity = $product['quantity'];
            $product_image = $row['product_image'];
            $category_id = $row['category_id'];
           

            $subTotalSignleproduct = $product_quantity * $product_price;

            $totalPrice += $subTotalSignleproduct;
        

            $sql = "SELECT cart_id FROM cart WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $sql);
            $row2 = mysqli_fetch_assoc($result);
            $cartId=$row2['cart_id'];
            $sqll = "UPDATE cart SET cart_totalprice = '$totalPrice' WHERE user_id = '$user_id'" ;
            $result1 = mysqli_query($conn, $sqll);

            $existingProductQuery = "SELECT * FROM cartproduct WHERE cart_id = '$cartId' AND product_id = '$id'";
            $existingProductResult = mysqli_query($conn, $existingProductQuery);
    
            if (mysqli_num_rows($existingProductResult) == 0) {
                
            $insert="INSERT INTO cartproduct (product_id, product_quantity ,cart_id) VALUES ('$id', '$product_quantity' ,'$cartId')";
            $result2 = mysqli_query($conn, $insert);
             } else {
                $row = mysqli_fetch_assoc($existingProductResult);
    $existingQuantity = $row['product_quantity'];
    $newQuantity = $existingQuantity + $product_quantity;
    
    $update = "UPDATE cartproduct SET product_quantity = '$newQuantity' WHERE cart_id = '$cartId' AND product_id = '$id'";
    $result2 = mysqli_query($conn, $update);
            }
           if($result2){
            echo'<tr>
                <td class="thumbnail"><a href="product-details.php">
                        <img style="width:150px" src="data:image/webp;base64,' .
                            base64_encode($product_image) . '" alt="product image" />
                    </a></td>
                <td class="name"> <a style="color: black;" href="product-details.php">
                        '.$product_name.'
                    </a></td>
                <td class="price"><span>
                '.$product_price.'
                    </span></td>

                <td class="quantity">

                    <div class="quantity_input">
                        <a href="load.php?minusid='. $id .' "><button type="submit" name="decrement">–</button></a>
                        <input class="input_number" value=" '.$product_quantity.'" name="quantity">
                        <a href="load.php?plusid='. $id .' "><button type="submit" name="increment">+</button></a>
                    </div>
                </td>
                <td class="subtotal"><span>
                '.$subTotalSignleproduct.'
                    </span></td>
                <td class="remove"><a href="delete_cart.php?delid='. $id .'" class="btn">×</a></td>
         </tr>';
      
        }}
      
   
    }}}

    else { 
        
            $sql1 = "SELECT cart_id FROM cart WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $sql1);
            $row2 = mysqli_fetch_assoc($result);
            $cartId=$row2['cart_id'];

            $sql2 = "SELECT product_id FROM cartproduct WHERE cart_id = '$cartId'";
            $result1 = mysqli_query($conn, $sql2);
            $row3 = mysqli_fetch_assoc($result1);
            $pro_id=$row3['product_id'];

            $sql3 = "SELECT * FROM products WHERE product_id = ' $pro_id'";
            $result3 = mysqli_query($conn, $sql3);
            while ($result3 && mysqli_num_rows($result3) > 0) {
               $row = mysqli_fetch_assoc($result3);
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $product_description = $row['product_description'];
                $product_price = $row['product_price'];
                $product_quantity = $product['quantity'];
                $product_image = $row['product_image'];
                $category_id = $row['category_id'];
                echo'<tr>
                <td class="thumbnail"><a href="product-details.php">
                        <img style="width:150px" src="data:image/webp;base64,' .
                            base64_encode($product_image) . '" alt="product image" />
                    </a></td>
                <td class="name"> <a style="color: black;" href="product-details.php">
                        '.$product_name.'
                    </a></td>
                <td class="price"><span>
                '.$product_price.'
                    </span></td>

                <td class="quantity">

                    <div class="quantity_input">
                        <a href="load.php?minusid='. $id .' "><button type="submit" name="decrement">–</button></a>
                        <input class="input_number" value=" '.$product_quantity.'" name="quantity">
                        <a href="load.php?plusid='. $id .' "><button type="submit" name="increment">+</button></a>
                    </div>
                </td>
                <td class="subtotal"><span>
                '.$subTotalSignleproduct.'
                    </span></td>
                <td class="remove"><a href="delete_cart.php?delid='. $id .'" class="btn">×</a></td>
         </tr>';

        }
    }}

                            if (!isset($_SESSION['user_id'])){
                                 foreach ($_SESSION['cart'] as $product) {

                                    $id = $product["productID"];
                                    $sql = "SELECT * FROM products WHERE product_id = '$id'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                      while(  $row = mysqli_fetch_assoc($result)){
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
                                    
                             
                                 
                                        echo'<tr>
                                            <td class="thumbnail"><a href="product-details.php">
                                                    <img style="width:150px" src="data:image/webp;base64,' .
                                                        base64_encode($product_image) . '" alt="product image" />
                                                </a></td>
                                            <td class="name"> <a style="color: black;" href="product-details.php">
                                                    '.$product_name.'
                                                </a></td>
                                            <td class="price"><span>
                                            '.$product_price.'
                                                </span></td>

                                            <td class="quantity">

                                                <div class="quantity_input">
                                                    <a href="load.php?minusid='. $id .' "><button type="submit" name="decrement">–</button></a>
                                                    <input class="input_number" value=" '.$product_quantity.'" name="quantity">
                                                    <a href="load.php?plusid='. $id .' "><button type="submit" name="increment">+</button></a>
                                                </div>
                                            </td>
                                            <td class="subtotal"><span>
                                            '.$subTotalSignleproduct.'
                                                </span></td>
                                            <td class="remove"><a href="delete_cart.php?delid='. $id .'" class="btn">×</a></td>
                                     </tr>';
                                  
                                    }}}}
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
                                                                    $user_id=$_SESSION['user_id'];
                                                                    $sqll = "UPDATE cart SET cart_totalprice = '$totalPrice' WHERE user_id = '$user_id'" ;
                                                                  $result1 = mysqli_query($conn, $sqll);
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
 
        <!-- footer section end -->



    </div>
    <!-- body wrap end -->
    <?php include("./footer.php") ?>
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
<?php
include('./process_pages/database.php');

$category_id = $_GET['category_id'];

if (isset($_GET['selectedPrice'])) {
    $selectedPrice = $_GET['selectedPrice'];

    if ($selectedPrice == 1) {
        $priceFilter = "product_price < 1";
    } elseif ($selectedPrice == 2) {
        $priceFilter = "product_price >= 1";
    } else {
        $priceFilter = "1"; // No price filter
    }
} else {
    $priceFilter = "1"; // No price filter
}

$itemsPerPage = 8; // Number of products per page

// Calculate the total number of products based on the filter
$query = "SELECT COUNT(*) as total FROM products WHERE category_id = '$category_id' AND $priceFilter";
$totalProductsQuery = mysqli_query($conn, $query);
$totalProductsRow = mysqli_fetch_assoc($totalProductsQuery);
$totalProducts = $totalProductsRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalProducts / $itemsPerPage);




// Get the current page number from the query string
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;


$offset = ($currentpage - 1) * $itemsPerPage;


// Fetch products for the current page and filter
$productsQuery = mysqli_query($conn, "SELECT * FROM products WHERE category_id = '$category_id' AND $priceFilter LIMIT $offset, $itemsPerPage");

?>


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

    <!-- include 'navbar.php'; -->

    <?php include('./navbar.php'); ?>


    <!-- Breadcrumb section start -->
    <section class="breadcrumb_sec_1 position-relative">
        <div class="breadcrumb_wrap sec_space_mid_small" style="background-image: url(assets/images/breadcrumb/breadcrumb1.png);">
            <div class="breadcrumb_cont text-center">
                <div class="breadcrumb_title">
                    <h2 class="text-white">Shop List</h2>
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




    <!-- shop list section start -->

    <section class="shop_list_sec sec_space_small" data-aos="fade-up" data-aos-duration="2000">
        <div class="shop_list_wrap">
            <div class="container">
                <div class="filter_area d-flex justify-content-between align-items-center sec_space_xxs_40">
                    <ul class="nav layout_tab_nav ul_li" role="tablist">
                        <li>
                            <button class="active" data-bs-toggle="tab" data-bs-target="#grid_layout" type="button" role="tab" aria-selected="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 12 12">
                                    <path id="grid" class="cls-1" d="M1784,905h2v2h-2v-2Zm5,0h2v2h-2v-2Zm5,0h2v2h-2v-2Zm-10,5h2v2h-2v-2Zm5,0h2v2h-2v-2Zm5,0h2v2h-2v-2Zm-10,5h2v2h-2v-2Zm5,0h2v2h-2v-2Zm5,0h2v2h-2v-2Z" transform="translate(-1784 -905)" />
                                </svg>
                            </button>
                        </li>
                        <span class="show_result">Showing <?php echo $offset + 1; ?>–<?php echo min($offset + $itemsPerPage, $totalProducts); ?> of <?php echo $totalProducts; ?> results</span>
                    </ul>
                    <form id="priceFilterForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                        <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                        <div class="sorting_from d-flex align-items-center">
                            <span class="sorting_from_title">Price:</span>
                            <div class="clearfix">
                                <select name="selectedPrice" onchange="submitForm()">
                                    <option value="0" selected>None</option>
                                    <option value="1">Less than 1 JD</option>
                                    <option value="2">More than 1 JD</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById("priceFilterForm").submit();
                        }
                    </script>
                </div>
                <?php
                if (mysqli_num_rows($productsQuery) > 0) {
                    echo '<div class="row g-4">';

                    while ($row = mysqli_fetch_array($productsQuery)) {
                        //$productImage =  $row['product_image'];
                        $productName = $row['product_name'];
                        $productPrice = $row['product_price'];


                        echo '<div class="col-sm-6 col-lg-3">
    <div class="product_layout_1 overflow-hidden position-relative">
        <div class="product_layout_content bg-white position-relative">
            <div class="product_image_wrap">
                <a class="product_image d-flex justify-content-center align-items-center" href="product-detail.html">
                <img class="pic-1" src="data:image/png;base64, ' . base64_encode($row['product_image']) . '" alt="image_not_found">
                <img class="pic-2" src="data:image/png;base64, ' . base64_encode($row['product_image']) . '" alt="image_not_found">
                </a>
                <ul class="product_badge_group ul_li_block">
                    <li><span class="product_badge badge_meats position-absolute rounded-pill text-uppercase">' . $productName . '</span></li>
                   
                </ul>
                <ul class="product_action_btns ul_li_block d-flex">
                    <li>
                        <a class="tooltips" data-placement="top" title="Search Product" href="product-detail.php?id=' . $row["product_id"] . '">
                        <i class="fa-solid fa-eye fa-lg" style="color: #080808;"></i>
                        </a>
                    </li>
                    <li><a class="tooltips" data-placement="top" title="Add To Cart" href="./cart.php?id=' . $row["product_id"] . '"><i class="fas fa-shopping-bag"></i></a></li>
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
                    <a href="product-detail.html">' . $productName . '</a>
                </h3>
                <span class="product_price">
                    <span class="sale_price pe-1">' . $productPrice . 'JD' . '</span>
                    
                </span>

            </div>
        </div>
    </div>
</div>';
                    }
                }

                ?>


<ul class="pagination_nav mt-5 list-unstyled d-flex justify-content-center text-uppercase clearfix">
    <?php
    for ($page = 1; $page <= $totalPages; $page++) {
        echo '<li class="' . ($page == $currentpage ? 'active' : '') . '">
        <a href="?page=' . $page . 
        '&category_id=' . $category_id . 
        (isset($selectedPrice) ? '&selectedPrice=' . $selectedPrice : '') . '">' . $page . '</a>
        </li>';
    } ?>
</ul>
    </section>


    <!-- shop list section end -->

    </main>
    <!-- main body end -->

    <!-- include 'footer.php'; -->





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
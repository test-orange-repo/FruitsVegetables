<?php
include ('./navbar.php');
$id = $_GET['order_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="overflow-x:hidden">
    
        <section class="cart_section sec_space_large" 
            data-aos-duration="2000">
            <div class="container">
                <div class="cart_table table-responsive">
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
                            include('./database.php');
                            $id = $_GET['order_id'];
                            $query = "SELECT * 
                                        FROM orderitems                  
                                        INNER JOIN products ON products.product_id = orderitems.product_id 
                                        WHERE orderitems.order_id = '$id'";

                            $result = mysqli_query($conn, $query);

                            $query1 = "SELECT * 
                                        FROM orderitems                  
                                        INNER JOIN orders ON orderitems.order_id = orders.order_id";

                            $result2 = mysqli_query($conn, $query1);
                            while($record = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td>
                                    <span>
                                        <img class="item_image" src="data:image/jpeg;base64,<?php echo base64_encode($record['product_image']); ?>" alt="Product Image">
                                    </span>
                                </td>
                                <td>
                                    <div class="item_content">
                                        <?php echo $record["product_name"]; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="price_text">
                                        <?php echo $record["product_price"]; ?>
                                    </span>
                                </td>
                                <td>
                                    <div>
                                        <?php echo $record["orderItem_quntity"]; ?>
                                    </div>
                                </td>
                                <td>
                                    <span class="total_price">
                                        <?php echo $record["product_price"] * $record["orderItem_quntity"] ?> 
                                    </span>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
</body>
</html>




<?php
include('./footer.php');
?>
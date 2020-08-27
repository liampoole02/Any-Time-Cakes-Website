<?php
$active='Home';
include("includes/db.php");
include("Functions.php");
include("Header.php");
?>

<html>

<head>
    <title>AnyTime Cakes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div id="cart" class="col-md-9">
        <div class="box">
            <form action="Cart.php" method="POST" enctype="multipart/form-data">
                <h1>My Cart</h1>
                <?php
                $ip_add = getRealIPUser();
                $select_cart = "select * from cart where IP_add='$ip_add'";
                $run_cart = mysqli_query($con, $select_cart);
                $count = mysqli_num_rows($run_cart);
                ?>

                <p class="text-muted">You currently have <?php echo $count . " "; ?>Items in your cart:</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2">Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th colspan="1">Delete</th>
                                <th colspan="2">Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $total = 0;
                            while ($row_cart = mysqli_fetch_array($run_cart)) {
                                $pro_id = $row_cart['CakeID'];
                                $pro_qty = $row_cart['CakeQuantity'];

                                $get_products = "select * from cake where CakeID='$pro_id'";
                                $run_products = mysqli_query($con, $get_products);

                                while ($row_products = mysqli_fetch_array($run_products)) {
                                    $product_title = $row_products['CakeName'];
                                    $product_img1 = $row_products['CakeImage1'];
                                    $product_price = $row_products['CakePrice'];

                                    $subtotal = $row_products['CakePrice'] * $pro_qty;

                                    $total += $subtotal;

                            ?>
                                    <tr>
                                        <td>
                                            <img class="img-responsive" src="Admin/images/<?php echo $product_img1; ?>">
                                        </td>
                                        <td>
                                            <a href="ProductPage.php/cake_id=<?php $cake_id; ?>"> <?php echo $product_title; ?></a>
                                        </td>
                                        <td>
                                            <?php echo $pro_qty; ?>
                                        </td>
                                        <td>
                                            <?php echo "R" . $product_price; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                        </td>
                                        <td>
                                            <?php echo "R" . $subtotal; ?>
                                        </td>
                                    </tr>

                            <?php }
                            } ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th colspan="5">Total</th>
                                <th colspan="2"><?php echo "R" . $total; ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer">
                    <div class="pull-left">
                        <a href="HomePage.php" class="btn btn-default">
                            <i class="fa fa-chevron-left"></i> Continue Shopping
                        </a>
                    </div>

                    <div class="pull-right">
                        <button type="submit" class="btn btn-default" name="update" value="Update Cart">
                            <i class="fa fa-refresh"></i> Update Cart
                        </button>
                        <a href="CheckoutPage.php" class="btn btn-primary">
                            Proceed to Checkout <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <?php
    function update_cart()
    {
        global $con;

        if (isset($_POST['update'])) {
            foreach ($_POST['remove'] as $remove_id) {
                $delete_product = "delete from cart where CakeID='$remove_id'";
                $run_delete = mysqli_query($con, $delete_product);
                if ($run_delete) {
                    echo "<script>window.open('Cart.php'.'_self')</script>";
                }
            }
        }
    }
    echo @$up_cart = update_cart();
    ?>
    </div>
</body>

</html>

<?php 
    
    include_once("footer.php");
    
    ?>
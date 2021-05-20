<?php
// $db = mysqli_connect("localhost", "root", "", "mydb");
$db = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

function getRealIPUser()
{

    switch (true) {
        case (!empty($_SERVER['HTTP_X_REAL_IP'])):
            return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])):
            return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default:
            return $_SERVER['REMOTE_ADDR'];
    }
}

function add_cart()
{
    global $db;
    if (isset($_GET['add_cart'])) {
        $ip_add = getRealIPUser();
        $p_id = $_GET['add_cart'];

        $product_quantity = $_POST['product_quantity'];

        $check_product = "select * from cart where IP_add='$ip_add' AND CakeID='$p_id'";

        $run_check = mysqli_query($db, $check_product);

        if (mysqli_num_rows($run_check) > 0) {
            echo "<script>alert('This product has already been add to the cart')</script>";
            echo "<script>window.open('ProductPage.php?cake_id=$p_id','_self')</script>";
        } else {

            $query = "insert into cart(CakeID, IP_add, CakeQuantity)values('$p_id','$ip_add','$product_quantity')";
            $run_query = mysqli_query($db, $query);

            echo "<script>alert('The item has has been added to your cart')</script>";
            echo "<script>window.open('ProductPage.php?cake_id=$p_id','_self')</script>";
        }
    }
}

function getPro()
{

    global $db;

    $get_cakes = "select * from cake order by 1 DESC LIMIT 0,8";

    $run_cakes = mysqli_query($db, $get_cakes);

    while ($row_products = mysqli_fetch_array($run_cakes)) {
        $cake_id = $row_products['CakeID'];
        $cake_title = $row_products['CakeName'];
        $cake_price = $row_products['CakePrice'];
        $cake_img1 = $row_products['CakeImage1'];

        echo "
        <div class='col-md-4 col-sm-6 single'>
            <div class='product'>
                <a href='ProductPage.php?cake_id=$cake_id'>
                    <img class='img-fluid' src='Admin/images/$cake_img1'>
                </a>
                        <div class='text'>
                        <h3>
                            <a href='ProductPage.php?cake_id=$cake_id'>
                            $cake_title
                            </a>
                        </h3>

                        <p class='price'>
                            R $cake_price
                        </p>

                        <p class='button'>
                            <a class='btn btn-default' href='ProductPage.php?cake_id=$cake_id'>
                            View Details
                            </a>
                            <a class='btn btn-primary' href='ProductPage.php?cake_id=$cake_id'>
                                <i class='fa fa-shopping-cart'></i>Add to Cart
                            </a>
                        </p>
                    </div>
                    </div>
                    </div>
        
        ";
    }
}

function getCats()
{
    global $db;

    $get_p_cats = "select * from cakecategory";

    $run_p_cats = mysqli_query($db, $get_p_cats);

    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
        $p_cat_id = $row_p_cats['CategoryID'];
        $p_cat_title = $row_p_cats['CategoryTitle'];
        echo "
             <li>
                 <a href='Shop.php?p_cat=$p_cat_id'>$p_cat_title</a>
             </li>
        
        ";
    }
}

function getPCatPro()
{
    global $db;

    if (isset($_GET['p_cat'])) {

        $p_cat_id = $_GET['p_cat'];

        $get_p_cat = "select * from cakecategory where CategoryID='$p_cat_id'";

        $run_p_cat = mysqli_query($db, $get_p_cat);

        $row_p_cats = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cats['CategoryTitle'];

        $p_cat_desc = $row_p_cats['CategoryDesc'];

        $get_products = "select * from cake where CategoryID='$p_cat_id'";

        $run_products = mysqli_query($db, $get_products);

        $count = mysqli_num_rows($run_products);

        if ($count == 0) {
            echo "
            <div class='box'>
                <h1> No Products Found</h1>
            </div>
            ";
        } else {
            echo "
            
            <div id='content' class='container'>

                <h1> $p_cat_title</h1>
                    <p> $p_cat_desc </p>
            </div>

            <br>
            ";
        }

        while ($row_products = mysqli_fetch_array($run_products)) {
            $cake_id = $row_products['CakeID'];
            $cake_title = $row_products['CakeName'];
            $cake_price = $row_products['CakePrice'];
            $cake_desc = $row_products['CakeDesc'];
            $cake_img1 = $row_products['CakeImage1'];

            echo "

            <div class='col-md-4 col-sm-6 single'>
                <div class='product'>
                    <a href='ProductPage.php?cake_id=$cake_id'>
                        <img class='img-fluid' src='Admin/images/$cake_img1'>
                     </a>
                    <div class='text'>
                        <h3>
                            <a href='ProductPage.php?cake_id=$cake_id'>
                                 $cake_title
                             </a>
                        </h3>

                        <p class='price'>
                            R $cake_price
                        </p>

                        <p class='button'>
                            <a class='btn btn-default' href='ProductPage.php?cake_id=$cake_id'>
                            View Details
                            </a>
                            <a class='btn btn-primary' href='ProductPage.php?cake_id=$cake_id'>
                                <i class='fa fa-shopping-cart'></i>Add to Cart
                            </a>
                        </p>
                    </div>

                </div>
            </div>
            ";
        }
    }
}
function items()
{
    global $db;
    $ip_add = getRealIPUser();
    $get_items = "select * from cart where IP_add='$ip_add'";
    $run_items = mysqli_query($db, $get_items);

    $count_items = mysqli_num_rows($run_items);

    echo $count_items;
}

function total_price()
{
    global $db;
    $ip_add = getRealIPUser();
    $total = 0;
    $select_cart = "select * from cart where IP_add='$ip_add'";
    $run_cart = mysqli_query($db, $select_cart);

    while ($record = mysqli_fetch_array($run_cart)) {
        $pro_id = $record['CakeID'];
        $pro_qty = $record['CakeQuantity'];
        $get_price = "select * from cake where CakeID='$pro_id'";
        $run_price = mysqli_query($db, $get_price);
        while ($row_price = mysqli_fetch_array($run_price)) {
            $sub_total = $row_price['CakePrice'] * $pro_qty;
            $total += $sub_total;
        }
    }
    echo "R" . $total;
}

<?php
session_start();
include_once("includes/db.php");
include_once("Functions.php");

?>

<html>

<head>

</head>

<body>

    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">Welcome</a>
            </div>
            <div class="col-md-6 offer">
                <ul class="menu">
                    <li><a href="SignUpPage.php">Register</li>
                    <li><a href="MyAccountPage.php">My Account</li>
                    <li><a href="Cart.php">My Cart</li>
                    <li><a href="LoginPage.php">Login</li>
                </ul>
            </div>

        </div>
    </div>

    <div class="top-nav">
        <div class="search-bar">
            <a href="HomePage.php"><img src="9fb327dda9276bcb478beb2453c5f758.jpg" class="logo"></a>

            <i class="fa fa-bars" id="menu-btn" onclick="openMenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closeMenu()"></i>

            <input type="text" class="form-control-a">
            <span class="input-group-text"><i class="fa fa-search"></i>
            </span>
        </div>

        <div class="menu-bar">
            <ul>
                <li><a href="Cart.php">Cart</a><i class="fa fa-shopping-basket"></i></li>
                <li><a href="SignUpPage.php">Sign Up</a></li>
                <li><a href="LoginPage.php">Log In</a></li>
                <li><a href="MyAccountPage.php">My Account</a></li>
                <li><a href="Shop.php">Shop Now</a></li>
            </ul>
        </div>
    </div>

    <?php
    if (!isset($_SESSION['ClientEmail'])) {
        echo "Welcome: Guest | ";
    } else {
        echo "Welcome: " . $_SESSION['ClientEmail'] . "";
    }

    ?>

    <?php
    items();
    ?>Item(s) in Your cart | Total Price:

    <?php
    total_price();

    ?>


</body>

</html>

<?php

if (isset($_GET['cake_id'])) {
    $cake_id = $_GET['cake_id'];

    $get_cakes = "select * from cake where cakeID='$cake_id'";
    $run_cakes = mysqli_query($db, $get_cakes);
    $row_cake = mysqli_fetch_array($run_cakes);
    $categoryID = $row_cake['CategoryID'];
    $cake_id = $row_cake['CakeID'];
    $cake_title = $row_cake['CakeName'];
    $cake_price = $row_cake['CakePrice'];
    $cake_desc = $row_cake['CakeDesc'];
    $cake_img1 = $row_cake['CakeImage1'];
    $cake_img2 = $row_cake['CakeImage2'];
    $cake_img3 = $row_cake['CakeImage3'];

    $get_cake_cat = "select * from cakecategory where CategoryID='$categoryID'";

    $run_cake_cat = mysqli_query($con, $get_cake_cat);

    $row_cake_cat = mysqli_fetch_array($run_cake_cat);

    $cake_cat_title = $row_cake_cat['CategoryTitle'];
}
?>
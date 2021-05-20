<?php

session_start();
include_once("includes/db.php");
include_once("Functions.php");

?>

<?php

if (isset($_GET['cake_id'])) {
    $cake_id = $_GET['cake_id'];

    $get_cakes = "select * from cake where CakeID='$cake_id'";
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

<html>

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="2020-08-14_01h56_38 (2).png" type="image/png" sizes="484x297"/>
    </head>

    <div id="top">
        <div class="container">
            <div class="col-md-8 offer">
                <a href="Index.php"><img src="2020-08-14_01h56_38 (2).png" class="logo"></a>
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if (!isset($_SESSION['ClientEmail'])) {
                        echo "Welcome: Guest  ";
                    } else {
                        echo "Welcome: " . $_SESSION['ClientEmail'] . "";
                    }
                    ?>
                </a>
                <a href="CheckoutPage.php"> <?php items(); ?> Item(s) in Your cart | Total Price:<?php total_price(); ?></a>
            </div>

            <div class="col-md-6 offer">
                <ul class="menu">
                    <li class="<?php if ($active == 'Home') echo "active"; ?>'">
                        <a href="SignUpPage.php">Register</a></li>
                    <li class="<?php if ($active == 'Account') echo "active"; ?>'">
                        <a href="MyAccountPage.php">My Account</a></li>
                    <li class="<?php if ($active == 'Cart') echo "active"; ?>'">
                        <a href="Cart.php"><i class="fa fa-shopping-basket"></i>My Cart</a></li>
                    <li class="<?php if ($active == 'Login') echo "active"; ?>'">
                        <a href="LoginPage.php">
                            <?php
                            if (!isset($_SESSION['ClientEmail'])) {
                                echo "<a href='LoginPage.php'>Login</a>";
                            } else {
                                echo "<a href='Logout.php'>Logout</a>";
                            }
                            ?>
                        </a></li>
                    <li class="<?php if ($active == 'Shop') echo "active"; ?>'">
                        <a href="Shop.php">Shop</a></li>

                </ul>
            </div>

        </div>
    </div>

    <div class="top-nav">
        <div class="search-bar">
            <i class="fa fa-bars" id="menu-btn" onclick="openMenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closeMenu()"></i>

            <input type="text" class="form-control-a">
            <span class="input-group-text"><i class="fa fa-search"></i>
            </span>
        </div>
    </div>

    
    <script>
        function openMenu() {
            document.getElementById("side-menu").style.display = "block";
            document.getElementById("menu-btn").style.display = "none";
            document.getElementById("close-btn").style.display = "block";
        }

        function closeMenu() {
            document.getElementById("side-menu").style.display = "none";
            document.getElementById("menu-btn").style.display = "block";
            document.getElementById("close-btn").style.display = "none";

        }
    </script>

</body>

</html>
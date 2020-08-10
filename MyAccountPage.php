<?php

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
    <!-- <div class="top-nav">
        <div class="search-bar">
            <a href="HomePage.php"><img src="9fb327dda9276bcb478beb2453c5f758.jpg" class="logo"></a>

            <i class="fa fa-bars" id="menu-btn" onclick="openMenu()"></i>
            <i class="fa fa-times" id="close-btn" onclick="closeMenu()"></i>

            <input type="text" class="form-control">
            <span class="input-group-text"><i class="fa fa-search"></i>
            </span>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="Cart.php">Cart</a><i class="fa fa-shopping-basket"></i></li>
                <li><a href="SignUpPage.php">Sign Up</a></li>
                <li><a href="LoginPage.php">Log In</a></li>
                <li><a href="MyAccountPage.php">My Account</a></li>
            </ul>
        </div>
    </div> -->

    <div id="content">
        <div class="container">
            <div class="col-md-12">

            </div>
            <div class="col-md-3">
                <?php
                include("SideBar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <?php
                    if (isset($_GET['OrdersPage'])) {
                        include("OrdersPage.php");
                    } else if (isset($_GET['EditAccountPage'])) {
                        include("EditAccountPage.php");
                    } else if (isset($_GET['ChangePasswordPage'])) {
                        include("ChangePasswordPage.php");
                    } else if (isset($_GET['DeleteAccountPage'])) {
                        include("DeleteAccountPage.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
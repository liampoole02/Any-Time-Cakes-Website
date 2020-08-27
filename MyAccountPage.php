<?php

include_once("includes/db.php");
include_once("Functions.php");
include_once("Header.php");

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

<section class="header">
    <div class="side-menu" id="side-menu">
        <?php
        include("SideBar.php");
        ?>
    </div>
</section>


<body>
    <section>
        <div id="content">
            <div class="container">
                <div class="col-md-9">
                    <div class="box">
                        <?php
                        if (isset($_GET['OrdersPage'])) {
                            include("OrdersPage.php");
                        } else if (isset($_GET['PayOfflinePage'])) {
                            include("PayOfflinePage.php");
                        } else if (isset($_GET['DeleteAccountPage'])) {
                            include("DeleteAccountPage.php");
                        } else if (isset($_GET['Logout'])) {
                            include("Logout.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <section>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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

<?php
include_once("footer.php");
?>
<?php
$active = 'Shop';
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
    <section class="header">
        <div class="side-menu" id="side-menu">
            <h3 class="panel-title"> Cake Categories</h3>
            <ul>
                <?php
                getCats();
                ?>
            </ul>
        </div>
    </section>

    <section>

        <div id="content" class="homePage">
            <div class="row">
                <?php
                if (!isset($_GET['p_cat'])) {
                    if (!isset($_GET['cat'])) {
                        $per_page = 6;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        } else {
                            $page = 1;
                        }
                        $start_from = ($page - 1) * $per_page;
                        $get_products = "select * from cake order by 1 DESC LIMIT $start_from, $per_page";
                        $run_products = mysqli_query($con, $get_products);


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
                                    <img class='img-fluid' src='Admin/images/$cake_img1'></img>
                                 </a>
                                 <div class='text'>
                                    <h3>
                                        <a href='ProductPage.php?cake_id=$cake_id'> $cake_title</a>
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
                ?>

            </div>

            <center>
                <ul class="pagination">
            <?php
                        $query = "select * from cake";
                        $result = mysqli_query($con, $query);
                        $total_records = mysqli_num_rows($result);
                        $total_pages = ceil($total_records / $per_page);

                        echo " 
                    <li>
                        <a href='Shop.php?page=1'> " . 'First Page' . " </a>
                    </li>
                    ";

                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "
                        <li>
                            <a href='Shop.php?page=" . $i . "'> " . $i . " </a>
                        </li>
                        ";
                        };

                        echo "
                        <li>
                            <a href='Shop.php?page=$total_pages'> " . 'Last Page' . " </a>
                        </li>
                        ";
                    }
                }


            ?>
                </ul>
            </center>
    </section>

    <div class="row">
        <?php
        getPCatPro();
        ?>
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


</div>

<?php

include_once("footer.php");

?>
<?php
include_once("includes/db.php");
include_once("Functions.php");
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
    <?php
    add_cart();
    ?>

    <section class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/<?php echo $cake_img1; ?>" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="images/<?php echo $cake_img2; ?>" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="images/<?php echo $cake_img3; ?>" class="d-block w-100">
                            </div>
                            <a class="carousel-control-prev" href="#product-slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#product-slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="new-arrival text-center">
                    </p>
                    <h2>
                        <?php echo $cake_title; ?>
                    </h2>

                    <?php
                    echo "
                    <p>Product Code:  $cake_id</p>
                    ";
                    ?>

                    <?php
                    echo "
                    <p class='price'> R $cake_price</p>
                    ";
                    ?>

                    <form action="ProductPage.php?add_cart=<?php echo $cake_id; ?>" class="form-horizontal" method="POST">

                        <div class='col-md-5'>
                            <div class="form-group">
                                <label>Quantity: </label>
                                <select name="product_quantity" id="product_quantity" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('A Quantity is required')">
                                    <option disabled selected>Select a quantity</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <button class="btn btn-primary">Add to cart</button>

                            <section class="product-description">
                                <div class="container">
                                    <h6>
                                        Product Description:
                                    </h6>
                                    <p>
                                        <?php echo $cake_desc; ?>
                                    </p>
                                </div>
                    </form>
                </div>
    </section>
    <!-- </div>
    </div>
    </div>
    </section> -->

</body>

</html>
<?php
$active='Home';

include("includes/db.php");
include_once("Functions.php");
include_once("Header.php");

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnyTime Cakes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- <section class="header"> -->
        <div class="side-menu" id="side-menu">
            <h3 class="panel-title"> Cake Categories</h3>
            <ul>
                <?php
                getCats();
                ?>
            </ul>
        </div>
    <!-- </section> -->

    <div class="slider">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="2020-08-11_19h18_51 (2).png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="2020-08-14_01h56_38 (2).png" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <section>
        <div class="featured-categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="chocolateCake.jpg">
                    </div>
                    <div class="col-md-4">
                        <img src="carrotCake.jpg">
                    </div>
                    <div class="col-md-4">
                        <img src="cupCake.jpg">
                    </div>
                </div>
            </div>
    </section>

    <div id="content" class="container">
        <h3>Popular picks</h3>
        <div class="row">
            <?php
            getPro();
            ?>
        </div>
    </div>

</body>
<?php 
    
    include_once("footer.php");
    
    ?>
</html>
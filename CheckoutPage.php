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

    <div class="col-md-9">
        <?php
        if (!isset($_SESSION['ClientEmail'])) {
            include("LoginPage.php");
        } else {
            include("Payment.php");
        }

        ?>

    </div>

</body>

</html>

<?php 
    
    include_once("footer.php");
    
    ?>
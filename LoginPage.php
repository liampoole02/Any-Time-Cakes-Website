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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="col-md-9">
        <div class="box">

            <div class="box-header">
                <center>
                    <h1>Login</h1>
                </center>
            </div>

            <form method="post">
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" name="c_email" class="form-control" required>

                    <label for="password">Password</label>
                    <input type="password" name="c_password" class="form-control" required>

                    <button type="submit" name="login" class="form-control">Login<i class="fa fa-sign-in"></i></button>
                </div>
            </form>
            <center>
                <a href="SignUpPage.php">
                    <h4>Don't have an account...? Sign-up here</h4>
                </a>
            </center>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['login'])) {
    $email = $_POST['c_email'];
    $password = $_POST['c_password'];
    $select_customer = "select * from client where ClientEmail='$email' AND ClientPassword='$password'";
    $run_customer = mysqli_query($con, $select_customer);
    $get_ip = getRealIPUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where IP_add ='$get_ip'";
    $run_cart = mysqli_query($con, $select_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_customer == 0) {
        echo "<script>alert('Incorrect email or password')</script>";
        exit();
    }
    if ($check_customer == 1 and $check_cart == 0) {
        $_SESSION['CustomerEmail'] = $email;
        echo "<script>alert('You are now logged in')</script>";
        echo "<script>window.open('MyAccountPage.php?my_orders','_self')</script>";
    } else {
        $_SESSION['CustomerEmail'] = $email;
        echo "<script>alert('You are now logged in')</script>";
        echo "<script>window.open('CheckoutPage.php','_self')</script>";
    }
}



?>
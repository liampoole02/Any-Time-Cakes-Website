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
                <h1>Sign Up</h1>
                    <p class="lead">Already have an account...?</p>
                </center>
            </div>

            <form action="SignUpPage.php" method="POST" enctype="multipart/data">
                <div class="form-group">
                    <h1>Sign Up</h1><br>
                </div>

                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>

                    <label for="surname">Surname</label>
                    <input type="text" name="surname" class="form-control" required>

                    <label for="Mobile No">Mobile No</label>
                    <input type="text" name="mobile" class="form-control" required>

                    <label for="Email address">Email address</label>
                    <input type="text" name="email" class="form-control" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>

                    <button type="submit" name="register" class="form-control">Sign up</button>
                </div>

            </form>
        </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['register'])) {
    $c_name = $_POST['name'];
    $c_surname = $_POST['surname'];
    $c_mobile = $_POST['mobile'];
    $c_email = $_POST['email'];
    $c_password = $_POST['password'];

    $c_ip = getRealIPUser();

    $insert_client = "insert into client (ClientEmail	,ClientPassword,	ClientName	,ClientMobileNo	,Client_ip) values('$c_email','$c_password','$c_name','$c_mobile','$c_ip') ";

    $run_client = mysqli_query($con, $insert_client);
    $sel_cart = "select * from cart where IP_add='$c_ip'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart > 0) {
        $_SESSION['ClientEmail'] = $c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo "<script>window.open('CheckoutPage.php','_self')</script>";
    } else {
        $_SESSION['ClientEmail'] = $c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo "<script>window.open('HomePage.php','_self')</script>";
    }
}


?>

<?php 
    
    include_once("footer.php");
    
    ?>
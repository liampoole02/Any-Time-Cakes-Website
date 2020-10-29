<?php
$active = 'Home';

include_once("includes/db.php");
include_once("Functions.php");
include_once("Header.php");

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

            <form method="POST" action="CheckoutPage.php" enctype="multipart/data" onsubmit="return validate()">
                <div class="col-lg-8 m-auto d-block">

                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" name="c_email" id="c_email" class="form-control" placeholder="apple@fruit.gum">
                        <span id="semail" class="error"></span>
                    </div>

                    <div class="form-group">

                        <label for="password">Password</label>
                        <input type="password" name="c_password" id="c_password" class="form-control" placeholder="apple432">
                        <span id="spassword" class="error"></span>

                    </div>
                    <center>
                        <input type="submit" value="Login" name="login" class="btn btn-primary"><i class="fa fa-sign-in"></i></input>
                    </center>


                </div>
            </form>

            <center>
                <a href="SignUpPage.php">
                    <h6>Don't have an account...?<br> Sign-up here</h6>
                </a>
            </center>
        </div>
    </div>

</body>

</html>


<?php
if (isset($_POST['login'])) {
    $c_email = $_POST['c_email'];
    $password = $_POST['c_password'];
    $select_customer = "select * from client where ClientEmail='$c_email' AND ClientPassword='$password'";
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
        $_SESSION['ClientEmail'] = $c_email;
        echo "<script>alert('You are now logged in')</script>";
        echo "<script>window.open('MyAccountPage.php?OrdersPage','_self')</script>";
    } else {
        $_SESSION['ClientEmail'] = $c_email;
        echo "<script>alert('You are now logged in')</script>";
        echo "<script>window.open('CheckoutPage.php','_self')</script>";
    }
}



?>
<?php

include_once("footer.php");

?>

<script type="text/javascript">
    function validate() {

        var email = document.getElementById('c_email');
        var password = document.getElementById('c_password');

        console.log(name);


        removeMessage();


        var valid = true;

        if (email.value == "") {
            document.getElementById('semail').innerHTML = " ** Please enter an email";
            valid = false;

        }
        if (password.value == "") {
            document.getElementById('spassword').innerHTML = " ** Please enter a password";
            valid = false;
        }
        return valid;

    }


    function removeMessage() {

        var errorPara = document.querySelectorAll(".error");
        [].forEach.call(errorPara, function(el) {
            el.innerHTML = "";
        });
    }
</script>
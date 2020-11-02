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

                <form method="POST" action="SignUpPage.php" enctype="multipart/data" onsubmit="return validate()">

                    <div class="col-lg-8 m-auto d-block">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Apple">
                            <span id="sname" class="error"></span>

                        </div>


                        <div class="form-group">

                            <label for="surname">Surname</label>
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="Smith">
                            <span id="ssurname" class="error"></span>

                        </div>

                        <div class="form-group">

                            <label for="Mobile No">Mobile No</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="0873756839">
                            <span id="smobile" class="error"></span>

                        </div>

                        <div class="form-group">
                            <label for="Email address">Email address</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="apple@fruit.gum">
                            <span id="semail" class="error"></span>

                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="apple432">
                            <span id="spassword" class="error"></span>

                        </div>

                        <center>
                            <input type="submit" value="Sign-up" name="register" class="btn btn-primary"></input>
                        </center>
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

<script type="text/javascript">
    function validate() {

        var name = document.getElementById('name');
        var surname = document.getElementById('surname');
        var mobile = document.getElementById('mobile');
        var email = document.getElementById('email');
        var password = document.getElementById('password');

        removeMessage();

        console.log(name);

        var valid = true;

        if (name.value == "") {
            document.getElementById('sname').innerHTML = " ** Please enter a name";
            valid = false;
        }
        if (surname.value == "") {
            document.getElementById('ssurname').innerHTML = " ** Please enter a surname";
            valid = false;
        }
        if (mobile.value == "") {
            document.getElementById('smobile').innerHTML = " ** Please enter a mobile number";
            valid = false;
        }
        if (mobile.value.length != 10) {
            document.getElementById('smobile').innerHTML = " ** Mobile number has to be 10 characters";
            valid = false;
        }
        if (isNaN(mobile.value)) {
            document.getElementById('smobile').innerHTML = " ** Mobile number cannot contain characters";
            valid = false;
        }
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
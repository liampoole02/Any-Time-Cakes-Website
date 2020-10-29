<?php
$active = 'Home';

include("includes/db.php");
include_once("Functions.php");
include_once("Header.php");

?>

<!DOCTYPE html>
<html lang="en">


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
        <div class="box">
            <div class="box-header">
                <center>

                    <h2> Feel free to Contact Us</h2>
                    <p class="text-muted">
                        If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                    </p>

                </center>

                <form action="contact.php" method="post" onsubmit="return validate()">
                    <div class="col-lg-8 m-auto d-block">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <span id="sname" class="error"></span>

                        </div>

                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" class="form-control" name="email" id="email">
                            <span id="semail" class="error"></span>


                        </div>

                        <div class="form-group">

                            <label>Subject</label>

                            <input type="text" class="form-control" name="subject" id="subject">
                            <span id="ssubject" class="error"></span>


                        </div>

                        <div class="form-group">

                            <label>Message</label>

                            <textarea name="message" class="form-control" id="message"></textarea>
                            <span id="smessage" class="error"></span>


                        </div>

                        <center>

                            <button type="submit" name="submit" class="btn btn-primary">

                                <i class="fa fa-user-md"></i>Send Message

                            </button>
                        </center>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $headers =  'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: Your name <liampoole02@gmail.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];
        $receiver_email = "liampoole02@gmail.com";

        mail($receiver_email, $sender_subject, $sender_message, $headers);

        $email = $_POST['email'];
        $subject = "Welcome to my website";
        $msg = "Thanks for sending us message. ASAP we will reply your message";
        $from = "liampoole02@gmail.com";

        mail($email, $subject, $msg, $headers);
        echo "<h2 align='center'> Your message has sent sucessfully </h2>";
    }

    ?>

    <?php

    include("footer.php");

    ?>

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>

    <script>
        function validate() {
            var name = document.getElementById('name');
            var email = document.getElementById('email');
            var subject = document.getElementById('subject');
            var message = document.getElementById('message');

            removeMessage();

            var valid = true;


            if (name.value == "") {
                document.getElementById('sname').innerHTML = "Please enter a name";
                valid = false;
            }
            if (email.value == "") {
                document.getElementById('semail').innerHTML = "Please enter an email address";
                valid = false;
            }
            if (subject.value == "") {
                document.getElementById('ssubject').innerHTML = "Please enter a subject";
                valid = false;
            }
            if (message.value == "") {
                document.getElementById('smessage').innerHTML = "Please enter a message";
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


</body>

</html>
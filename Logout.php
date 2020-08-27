<?php
session_start();

session_destroy();

echo "<script>window.open('HomePage.php','_self')</script>";

?>

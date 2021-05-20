<Center>
    <h1>Are you sure you want to delete your account?</h1>
    <form action="" method="POST">
        <input type="submit" name="Yes" value="Yes, Delete my account" class="btn btn-danger">
        <input type="submit" name="No" value="No" class="btn btn-primary">

    </form>
</Center>


<?php
$c_email = $_SESSION['ClientEmail'];
if (isset($_POST['Yes'])) {
    $delete_customer = "delete from client where ClientEmail='$c_email'";
    $run_delete_customer = mysqli_query($con, $delete_customer);
    if ($run_delete_customer) {
        session_destroy();
        echo "<script>alert('Your account has been deleted.')</script>";
        echo "<script>window.open('Index.php')</script>";
    }
}
if (isset($_POST['No'])) {
    echo "<script>window.open('MyAccountPage.php','_self')</script>";
}
?>

<?php
?>
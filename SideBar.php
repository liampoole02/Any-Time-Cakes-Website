<?php
include_once("includes/db.php");
include_once("Functions.php");

?>

<?php
$customer_session = $_SESSION['ClientEmail'];
$get_customer = "select * from client where ClientEmail='$customer_session'";
$run_customer = mysqli_query($con, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_name = $row_customer['ClientName'];

if (!isset($_SESSION['ClientEmail'])) {
} else {
    echo "
        <h3 class='panel-title' align='center'>
        Name : $customer_name<br>
        Email: $customer_session
        <h3/>
    ";
}
?>

<!-- <section class="header"> -->
<div class="side-menu" id="side-menu">
    <ul>
        <li class="<?php if (isset($_GET['OrdersPage'])) {
                        echo "active";
                    } ?>">
            <a href="MyAccountPage.php?OrdersPage"><i class="fa fa-list"></i>My Orders
            </a>

        </li>

        <li class="<?php if (isset($_GET['DeleteAccountPage'])) {
                        echo "active";
                    } ?>">
            <a href="MyAccountPage.php?DeleteAccountPage">
                <i class="fa fa-trash-o"></i>Delete Account</a>
        </li>

        <li class="<?php if (isset($_GET['Logout'])) {
                        echo "active";
                    } ?>">
            <a href="MyAccountPage.php?Logout">
                <i class="fa fa-sign-out"></i>Log Out</a>
        </li>
    </ul>
</div>
<!-- </section> -->
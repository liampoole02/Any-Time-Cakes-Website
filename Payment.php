<div class="box">

    <?php
    $session_email = $_SESSION['ClientEmail'];
    $select_customer = "select * from client where ClientEmail='$session_email'";
    $run_customer = mysqli_query($con, $select_customer);
    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['ClientID'];

    ?>

    <h1 class="text-center">Payment Options</h1>

    <p class="lead text-center">
        <a href="OrdersPage.php?c_id=<?php echo $customer_id ?>">Bank deposit</a>

    </p>

</div>

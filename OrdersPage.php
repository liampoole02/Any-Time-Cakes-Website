<?php

// session_start();

include_once("includes/db.php");
include_once("Functions.php");
include_once("Header.php");


?>

<?php
if (isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}

$ip_add = getRealIPUser();
$status = "Pending";
$invoice_no = mt_rand();
$select_cart = "select * from cart where IP_add='$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

while ($row_cart = mysqli_fetch_array($run_cart)) {

    $pro_id = $row_cart['CakeID'];

    $pro_qty = $row_cart['CakeQuantity'];

    $get_products = "select * from cake where CakeID='$pro_id'";

    $run_products = mysqli_query($con, $get_products);

    while ($row_products = mysqli_fetch_array($run_products)) {

        $sub_total = $row_products['CakePrice'] * $pro_qty;
        $insert_customer_order = "insert into clientorder (ClientID, DueAmount,InvoiceNo,Quantity,OrderDate,OrderStatus)values('$customer_id','$sub_total','$invoice_no','$pro_qty',NOW(),'$status')";

        $run_customer_order = mysqli_query($con, $insert_customer_order);

        $insert_pending_order = "insert into orderspending (ClientID, InvoiceNo, CakeID, Quantity, OrderStatus)values('$customer_id','$invoice_no','$pro_id','$pro_qty','$status')";

        $run_pending_order = mysqli_query($con, $insert_pending_order);

        $delete_cart = "delete from cart where IP_add ='$ip_add'";

        $run_delete = mysqli_query($con, $delete_cart);

        echo "<script>alert('Your order has been placed, Thank you')</script>";
        echo "<script>window.open('MyAccountPage.php?OrdersPage,_self')</script>";
    }
}


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
    <div id="content">
        <div class="container">
            <center>
                <h1>My Orders
                </h1>

                <p class="lead"> Your orders on one place</p>

                <!-- <p class="text-muted">
                    if you have any questions
                </p> -->
            </center>

            <hr>
            <div class=table-resposive>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No:</th>
                            <th>Amount Due</th>
                            <th>Invoice No:</th>
                            <th>Quantity:</th>
                            <th>Order Date:</th>
                            <th>Status:</th>
                            <th>Confirm:</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $customer_session = $_SESSION['ClientEmail'];
                        $get_customer = "select * from client where ClientEmail='$customer_session'";
                        $run_customer = mysqli_query($con, $get_customer);
                        $row_customer = mysqli_fetch_array($run_customer);
                        $customer_id = $row_customer['ClientID'];
                        $get_orders = "select * from clientorder where ClientID='$customer_id'";
                        $run_orders = mysqli_query($con, $get_orders);
                        $i = 0;

                        while ($row_orders = mysqli_fetch_array($run_orders)) {
                            $order_id = $row_orders['OrderID'];
                            $due_amount = $row_orders['DueAmount'];
                            $invoice_no = $row_orders['InvoiceNo'];
                            $qty = $row_orders['Quantity'];
                            $order_date = $row_orders['OrderDate'];
                            $order_status = $row_orders['OrderStatus'];
                            $i++;

                            if ($order_status == 'Pending') {
                                $order_status = 'Unpaid';
                            } else {
                                $order_status = 'Paid';
                            }

                        ?>
                            <tr>
                                <th> <?php echo $i; ?></th>

                                <td>R<?php echo $due_amount; ?></td>
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $order_status; ?></td>

                                <td><a href="ConfirmPayment.php?order_id=<?php echo $order_id; ?>" target="_blank" class="btn btn-primary btn sm">Confirm Payment</a></td>

                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
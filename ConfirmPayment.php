<?php
$active = 'Account';

session_start();

if (!isset($_SESSION['ClientEmail'])) {
    echo "<script>window.open('CheckoutPage.php','_self')</script>";
} else {
    include("includes/db.php");
    include("Functions.php");
    include("Header.php");

    if (isset($_GET['order_id'])) {
        $order_id=$_GET['order_id'];
}}

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
    <div class="col-md-9">
        <div class="box">
            <h1 align="center" >Please confirm your payment method</h1>
            <form action="ConfirmPayment.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/function">

                <div class="form-group">
                    <label>Invoice No:</label>
                    <input type="text" class="form-control" name="invoice_no" required>
                </div>
                <div class="form-group">
                    <label> Amount:</label>
                    <input type="text" class="form-control" name="amount_sent" required>
                </div>
                <div class="form-group">
                    <label> Select Payment method:</label>
                    <select name="payment_mode" class="form-control">
                        <option>Select payment Mode</option>
                        <option>Bank</option>
                    </select>
                </div>
                <div class="form-group">
                    <label> Transaction/Reference ID:</label>
                    <input type="text" class="form-control" name="referenceID" required>
                </div>
                <div class="form-group">
                    <label> Code:</label>
                    <input type="text" class="form-control" name="code" required>
                </div>
                <div class="form-group">
                    <label> Payment date:</label>
                    <input type="text" class="form-control" name="payment_date" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg" name="confirm_payment">
                        <i class="fa fa-user-md"></i>Confirm Payment
                    </button>
                </div>
        </div>

    </div>
    </form>

    <?php
            if(isset($_POST['confirm_payment'])){
                $update_id=$_GET['update_id'];

                $invoice_no=$_POST['invoice_no'];
                $amount_sent=$_POST['amount_sent'];
                $payment_mode=$_POST['payment_mode'];
                $referenceID=$_POST['referenceID'];
                $code=$_POST['code'];
                $payment_date=$_POST['payment_date'];
                $complete="Complete";

                $insert_payment="insert into payment(InvoiceNo, Amount, PaymentMode, RefNo, Code, PaymentDate)
                values('$invoice_no','$amount_sent','$payment_mode','$referenceID','$code','$payment_date')";
                
                $run_payment=mysqli_query($con, $insert_payment);
                $update_customer_order="update clientorder set OrderStatus='$complete' where OrderID='$update_id'";
                $run_customer_order=mysqli_query($con, $update_customer_order);
                $update_pending_order="update orderspending set OrderStatus='$complete' where OrderID='$update_id'";
                $run_pending_order=mysqli_query($con, $update_pending_order);
                if($run_pending_order){
                    echo "<script>alert('Thank you for completing your purchase, your order will be arranged for you')</script>";
                    echo "<script>window.open('MyAccountPage.php?OrdersPage','_self')</script>";

                }
            }

            ?>
</body>

</html>

<?php 
    include_once("footer.php");
?>
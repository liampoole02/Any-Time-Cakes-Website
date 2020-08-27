<?php

if (!isset($_SESSION['admin_email'])) {

    echo "<script>window.open('login.php','_self')</script>";
} else {

?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Dashboard </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>

        </div>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_products; ?> </div>
                            <div> Products </div>
                        </div>
                    </div>
                </div>

                <a href="index.php?view_products">
                    <div class="panel-footer">
                        <span class="pull-left">
                            View Details
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_customers; ?> </div>
                            <div> Clients </div>
                        </div>
                    </div>
                </div>
                <a href="index.php?view_customers">
                    <div class="panel-footer">

                        <span class="pull-left">
                            View Details
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>

                    </div>
                </a>

            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-orange">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_p_categories; ?> </div>
                            <div> Product Categories </div>
                        </div>
                    </div>
                </div>

                <a href="index.php?view_p_cats">
                    <div class="panel-footer">
                        <span class="pull-left">
                            View Details
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                            <div> Orders </div>
                        </div>
                    </div>
                </div>
                <a href="index.php?view_orders">
                    <div class="panel-footer">

                        <span class="pull-left">
                            View Details
                        </span>
                        <span class="pull-right">
                            <i class="fa fa-arrow-circle-right"></i>
                        </span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> New Orders
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th> Order no: </th>
                                    <th> Customer Email: </th>
                                    <th> Invoice No: </th>
                                    <th> Cake ID: </th>
                                    <th> Cake Qty: </th>
                                    <th> Status: </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $i = 0;

                                $get_order = "select * from orderspending order by 1 DESC LIMIT 0,5";

                                $run_order = mysqli_query($con, $get_order);

                                while ($row_order = mysqli_fetch_array($run_order)) {

                                    $order_id = $row_order['OrderID'];
                                    $c_id = $row_order['ClientID'];
                                    $invoice_no = $row_order['InvoiceNo'];
                                    $product_id = $row_order['CakeID'];
                                    $qty = $row_order['Quantity'];
                                    $order_status = $row_order['OrderStatus'];

                                    $i++;

                                ?>

                                    <tr>

                                        <td> <?php echo $order_id; ?> </td>
                                        <td>

                                            <?php

                                            $get_customer = "select * from client where ClientID='$c_id'";
                                            $run_customer = mysqli_query($con, $get_customer);
                                            $row_customer = mysqli_fetch_array($run_customer);
                                            $customer_email = $row_customer['ClientEmail'];

                                            echo $customer_email;

                                            ?>

                                        </td>
                                        <td> <?php echo $invoice_no; ?> </td>
                                        <td> <?php echo $product_id; ?> </td>
                                        <td> <?php echo $qty; ?> </td>
                                        <td>

                                            <?php
                                            if ($order_status == 'pending') {
                                                echo $order_status = 'pending';
                                            } else {
                                                echo $order_status = 'Complete';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="text-right">
                        <a href="index.php?view_orders">
                            View All Orders <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel">
                <div class="panel-body">
                    <div class="mb-md thumb-info">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>


<?php } ?>
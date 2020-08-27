<?php 

    session_start();
    include("db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
                                                
        $get_products = "select * from cake";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from client";
        
        $run_customers = mysqli_query($con,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from cakecategory";
        
        $run_p_categories = mysqli_query($con,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_pending_orders = "select * from orderspending";
        
        $run_pending_orders = mysqli_query($con,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AnyTime Cakes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div id="wrapper">
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">
            <div class="container-fluid">
                
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("edit_product.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("edit_p_cat.php");
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("delete_cat.php");
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("insert_slide.php");
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("view_slides.php");
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("delete_slide.php");
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("edit_slide.php");
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("delete_customer.php");
                        
                }   if(isset($_GET['view_orders'])){
                        
                        include("view_orders.php");
                        
                }   if(isset($_GET['delete_order'])){
                        
                        include("delete_order.php");
                        
                }   if(isset($_GET['view_payments'])){
                        
                        include("view_payments.php");
                        
                }   if(isset($_GET['delete_payment'])){
                        
                        include("delete_payment.php");
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user_profile.php");
                        
                }
        
                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>
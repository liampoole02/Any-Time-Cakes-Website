<?php 
    
    if(!isset($_SESSION['admin_email'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{

?>

<?php 

    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
        $delete_order = "delete from orderspending where OrderID='$delete_id'";
        $run_delete = mysqli_query($con,$delete_order);
        
        if($run_delete){
            
            echo "<script>alert('Order has been Deleted')</script>";
            echo "<script>window.open('index.php?view_orders','_self')</script>";
            
        }
    }

?>

<?php } ?>
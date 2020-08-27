<?php 
    session_start();
    include("db.php");

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
   
   <div class="container">
       <form action="" class="form-login" method="post">
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="admin_login">
               
               Login
               
           </button>
           
       </form>
   </div>
    
</body>
</html>


<?php 

    if(isset($_POST['admin_login'])){
        
        $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
        
        $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
        
        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $count = mysqli_num_rows($run_admin);
        
        if($count==1){
            
            $_SESSION['admin_email']=$admin_email;
            
            echo "<script>alert('Logged in. Welcome Back')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";
            
        }else{
            
            echo "<script>alert('Email or Password is Wrong !')</script>";
            
        }
        
    }

?>
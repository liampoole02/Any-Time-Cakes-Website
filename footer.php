<?php

include_once("includes/db.php");
include_once("Functions.php");

?>
<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Pages</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="Cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li><a href="CheckoutPage.php">My Account</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="LoginPage.php">Login</a></li>
                    <li><a href="SignUpPage.php">Register</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Top Products Categories</h4>
                
                <ul><!-- ul Begin -->
               <?php getCats() ?>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Find Us</h4>
                
                <p><!-- p Start -->
                    
                    <strong>AnyTime Cake Online.</strong>
                    <br/>Eunice
                    <br/>Poole
                    <br/>pooleeunice@gmail.com
                    <br/>+27 0834879332

                </p><!-- p Finish -->
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
                                
                <!-- <p class="text-muted">
                    Dont miss our latest update products.
                </p>
                 -->
                <form action="" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->
                        
                        <!-- <input type="text" class="form-control" name="email"> -->
                        
                        <span class="input-group-btn"><!-- input-group-btn begin -->
                            
                            <!-- <input type="submit" value="subscribe" class="btn btn-default"> -->
                            
                        </span><!-- input-group-btn Finish -->
                        
                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->
                
                <hr>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->
            
            <p class="pull-left">&copy; 2020 AnyTime cakes All Rights Reserve</p>
            
        </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->
</div><!-- #copyright Finish -->
<?php

include_once("includes/db.php");
include_once("Functions.php");

?>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               
               <h4>Pages</h4>
                
                <ul>
                    <li><a href="Cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li><a href="CheckoutPage.php">My Account</a></li>
                </ul>
                
                <hr>
                
                <h4>User Section</h4>
                
                <ul>
                    <li><a href="LoginPage.php">Login</a></li>
                    <li><a href="SignUpPage.php">Register</a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>
            
            <div class="com-sm-6 col-md-3">
                
                <h4>Top Products Categories</h4>
                
                <ul>
               <?php getCats() ?>
                </ul>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4>Find Us</h4>
                
                <p>
                    
                    <strong>AnyTime Cake Online.</strong>
                    <br/>Eunice
                    <br/>Poole
                    <br/>pooleeunice@gmail.com
                    <br/>+27 834879332

                </p>
                
                <a href="contact.php">Check Our Contact Page</a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                                
                <form action="" method="post">
                    <div class="input-group">
                        
                        
                        <span class="input-group-btn">
                            
                            
                        </span>
                        
                    </div>
                </form>
                
                <hr>
                
            </div>
        </div>
    </div>
</div>


<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            
            <p class="pull-left">&copy; 2020 AnyTime cakes All Rights Reserve</p>
            
        </div>

    </div>
</div>
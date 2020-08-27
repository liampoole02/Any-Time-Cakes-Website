<h1 align="center">Edit your account</h1>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form">
    <div class="form-group">
        <label>Customer Name: </label>
        <input type="text" name="name" required>
    </div>
    <div class="form-group">
        <label>Customer Surname: </label>
        <input type="text" name="surname" required>
    </div>
    <div class="form-group">
        <label>Customer Username: </label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label>Mobile No: </label>
        <input type="text" name="mobile" required>
    </div>
    <div class="form-group">
        <label>Customer Email: </label>
        <input type="text" name="email" required>
    </div>
    <div class="form-group">
        <label>Customer Password: </label>
        <input type="password" name="password" required>
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i>Update
        </button>
    </div>
</div>
</form>

<?php 
    
    include_once("footer.php");
    
    ?>
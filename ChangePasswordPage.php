<h1 align="center">Change password</h1>

<form action="" method="POST">
    <div class="form">
        <div class="form-group">
            <label>Old Password: </label>
            <input type="text" name="oldPassword" required>
        </div>

        <div class="form-group">

            <label>New Password: </label>
            <input type="text" name="newPassword" required>
        </div>


        <div class="form-group">

            <label>New Password repeat: </label>
            <input type="text" name="newPasswordRep" required>
        </div>


        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">
                <i class="fa fa-user-md"></i>Update
            </button>
        </div>
</form>
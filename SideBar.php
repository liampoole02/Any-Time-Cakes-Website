<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        </br>
        <h3 align="center" class="panel-title">
            Name: Dumisane
        </h3>

    </div>

    <div class="panel-body">
        <ul class="nav-pills nav-stacked nav">
            <li class="<?php if (isset($_GET['OrdersPage'])) {
                            echo "active";
                        } ?>">
                <a href="MyAccountPage.php?OrdersPage">
                    <i class="fa fa-list"></i>My Orders</a>

            </li>

            <li class="<?php if (isset($_GET['EditAccountPage'])) {
                            echo "active";
                        } ?>">
                <a href="MyAccountPage.php?EditAccountPage">
                    <i class="fa fa-pencil"></i>Edit Account</a>
            </li>

            <li class="<?php if (isset($_GET['ChangePasswordPage'])) {
                            echo "active";
                        } ?>">
                <a href="MyAccountPage.php?ChangePasswordPage">
                    <i class="fa fa-user"></i>Change Password</a>
            </li>

            <li class="<?php if (isset($_GET['DeleteAccountPage'])) {
                            echo "active";
                        } ?>">
                <a href="MyAccountPage.php?DeleteAccountPage">
                    <i class="fa fa-trash-o"></i>Delete Account</a>
            </li>

            <li class="<?php if (isset($_GET['log_out'])) {
                            echo "active";
                        } ?>">
                <a href="MyAccountPage.php?log_out">
                    <i class="fa fa-sign-out"></i>Log Out</a>
            </li>
        </ul>
    </div>
</div>
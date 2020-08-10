<?php
include("includes/db.php");
?>
<html>

<head>

    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class-="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i>Insert Products
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw">Insert Product</i>
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake name</label>
                            <div class="col-md-6">
                                <input name="cake_name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Select Category</label>
                            <div class="col-md-6">
                                <select name="cake_cat" class="form-control">
                                    <option>Select a Category</option>

                                    <?php
                                    $get_p_cats = "select * from cakecategory";
                                    $run_p_cats = mysqli_query($con, $get_p_cats);

                                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                        $p_cat_id = $row_p_cats['CategoryID'];
                                        $p_cat_title = $row_p_cats['CategoryTitle'];

                                        echo "
                                    <option value='$p_cat_id'> $p_cat_title</option>
                                    ";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake image 1</label>
                            <div class="col-md-6">
                                <input name="cake_img1" type="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake image 2</label>
                            <div class="col-md-6">
                                <input name="cake_img2" type="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake image 3</label>
                            <div class="col-md-6">
                                <input name="cake_img3" type="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake Price</label>
                            <div class="col-md-6">
                                <input name="cake_price" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cake description</label>
                            <div class="col-md-6">
                                <textarea name="cake_desc" cols="19" rows="6" type="text" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input name="submit" type="submit" value="Insert Product" class="form-control" class="btn btn-primary form-control" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $cake_name = $_POST['cake_name'];
    $cake_cat = $_POST['cake_cat'];
    $cake_price = $_POST['cake_price'];
    $cake_desc = $_POST['cake_desc'];

    $cake_img1 = $_FILES['cake_img1']['name'];
    $cake_img2 = $_FILES['cake_img2']['name'];
    $cake_img3 = $_FILES['cake_img3']['name'];

    $temp_name1=$_FILES['cake_img1']['tmp_name'];
    $temp_name2=$_FILES['cake_img2']['tmp_name'];
    $temp_name3=$_FILES['cake_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"images/$cake_img1");
    move_uploaded_file($temp_name2,"images/$cake_img2");
    move_uploaded_file($temp_name3,"images/$cake_img3");

    $insert_cake="insert into cake(CakeName,CakePrice,CakeDesc,CategoryID,CakeImage1,CakeImage2,CakeImage3)values('$cake_name','$cake_price','$cake_desc','$cake_cat','$cake_img1','$cake_img2','$cake_img3')";

    $run_product=mysqli_query($con,$insert_cake);

    if($run_product){
        echo "<script>alert('Inserted')</script>";
        echo "<script>window.open('AddProduct.php',_self')</script>";
    }
}

?>

<?php

include '../teamplate1/head.php';
?>
<?php

include '../teamplate1/header.php';
?>
<div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					
    <h2 class="text-center">Cập Nhật Tin Tức</h2>
    <?php
require('../../../lib/mysqli_connect.php');
?>

    <?php
if (isset($_POST['updateLogistics'])) {
  $id_update = $_POST['id_update'];
    $name = $_POST['name'];
    $price = $_POST['price'];




    $sql_update_account = mysqli_query($conn, "UPDATE logistics SET name='$name',price='$price' WHERE id='$id_update'");
    header('Location: manageLogistics.php');
}
?>

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
                <div class="row x_title">

                <?php
                    if (isset($_GET['quanly']) == 'capnhat')
                        $id_capnhat = $_GET['id'];
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM logistics WHERE id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>

                    <div class="col-md-12">
                        <h4>Cập Nhật Đơn Vị Giao Hàng</h4>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Tên Đơn Vị</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $row_capnhat['name'] ?>" required="">
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Giá Vận Chuyển</label>
                                <input type="id" class="form-control" name="price" placeholder="Nhập Giá Vận Chuyển" value="<?php echo $row_capnhat['price'] ?>" required="">
                            </div>
                            <input type="submit" name="updateLogistics" value="CẬP NHẬT" class="btn btn-default">
                            <input type="submit" name="huycapnhat" value="HỦY" class="btn btn-default">
                            
                        </form>
                    </div>



                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php

include '../teamplate1/script.php';
?>
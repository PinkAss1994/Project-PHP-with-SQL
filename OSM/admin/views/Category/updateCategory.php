
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

					
    <h2 class="text-center">Cập Nhật Danh Mục</h2>
    <?php
require('../../../lib/mysqli_connect.php');
?>

    <?php
if (isset($_POST['updateCategory'])) {
  $id_update = $_POST['id_update'];
    $parent_id = $_POST['parent_id'];
    $name = $_POST['name'];
    $sort_order = $_POST['sort_order'];



    $sql_update_account = mysqli_query($conn, "UPDATE category SET parent_id='$parent_id',name='$name',sort_order='$sort_order' WHERE id='$id_update'");
    header('Location: manageCategory.php');
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
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM category WHERE id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>

                    <div class="col-md-12">
                        <h4>Cập Nhật Danh Mục</h4>

                        <form action="" method="POST">
                            <label>Danh Mục</label>
             
                            <div class="form-group">
                                <label>Mục</label>
                                <input type="text" class="form-control" name="parent_id" value="<?php echo $row_capnhat['parent_id'] ?>" required="">
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Tên Điện Thoại</label>
                                <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $row_capnhat['name'] ?>" required="">
                            </div>
                            <div class="form-group">
                                <label>Thứ Tự</label>
                                <input type="text" class="form-control" name="sort_order" placeholder="sort_order" value="<?php echo $row_capnhat['sort_order'] ?>" required="">
                            </div>
                        

                           
                            <input type="submit" name="updateCategory" value="CẬP NHẬT" class="btn btn-default">
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
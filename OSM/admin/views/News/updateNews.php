
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
if (isset($_POST['updateNews'])) {
    $id_update = $_POST['id_update'];
    $title = $_POST['title'];
    $intro = $_POST['intro'];
    $content = $_POST['content'];
    $hinhanh = $_FILES['image_link']['name'];
    $hinhanh_tmp = $_FILES['image_link']['tmp_name'];
    $path = '../../image/';
    $status = $_POST['status'];
    if ($hinhanh == '') {
        $sql_update_image = mysqli_query($conn, "UPDATE news SET title='$title',intro='$intro',content='$content',status='$status' WHERE id='$id_update'");
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_update_image = mysqli_query($conn, "UPDATE news SET title='$title',intro='$intro',content='$content',status='$status',image_link='$hinhanh' WHERE id='$id_update'");
    }
    mysqli_query($conn, $sql_update_image);
    header('Location: manageNews.php');
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
                    $sql_capnhat = mysqli_query($conn, "SELECT * FROM news WHERE id='$id_capnhat'");
                    $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>

                    <div class="col-md-12">
                        <h4>Cập Nhật Tin Tức</h4>

                        <form class="form" action="##" method="POST" enctype="multipart/form-data">
                            <label>Tin Tức Mới</label>
             
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $row_capnhat['title'] ?>" required="">
                                <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Giới Thiệu</label>
                                <input type="text" class="form-control" name="intro" placeholder="Nhập Giới Thiệu" value="<?php echo $row_capnhat['intro'] ?>" required="">
                            </div>
                            <div class="form-group">
                                    <label class="control-label mb-1">Ảnh Minh Họa: </label>
                                    <input class="form-control" type="file" name="image_link">
                                </div>
                            <div class="form-group">
                                <label>Trang Thai</label>
                                <input type="id" class="form-control" name="status" placeholder="Nhập Trạng Thái" value="<?php echo $row_capnhat['status'] ?>"  placeholder="Hiển thị = 1, Ẩn = 0" required="">
                            </div>
                            <!-- <div class="form-group">
                                <label>Nội Dung</label>
                                <input type="text" class="form-control" name="content" placeholder="Nhập Nội Dung" value="<?php echo $row_capnhat['content'] ?>" required="">
                            </div> -->
                            <div class="form-group">
                            <label class="control-label mb-1">Nội Dung: </label>
                            <textarea name="content" id="noidung" value="<?php echo $row_capnhat['content'] ?>"></textarea>
                            <script type="text/javascript">
                            config = {};
                            config.entities_latin = false;
                            config.language = 'vi';
                            CKEDITOR.replace('noidung', config);
                            </script>
                        </div>
                            
                            <input type="submit" name="updateNews" value="CẬP NHẬT" class="btn btn-default">
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
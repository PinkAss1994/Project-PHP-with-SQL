
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
<?php
 require('../../../lib/mysqli_connect.php');       
?>

<?php
if (isset($_POST['addNews'])) {
    $title = $_POST['title'];
    $intro = $_POST['intro'];
    $status = $_POST['status'];
    $hinhanh = $_FILES['image_link']['name'];
    $path = '../../image/';
    $hinhanh_tmp = $_FILES['image_link']['tmp_name'];
    $content = $_POST['content'];


    $sql_insert_product = mysqli_query($conn, "INSERT INTO news(title,intro,status,image_link,content) 
    values ('$title','$intro','$status','$hinhanh','$content');");
    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
    header('Location: manageNews.php');
}
?>

<?php
if (isset($_POST['huy'])) {
    header('Location: manageNews.php');
}
?>



    <div class="container-fluid" id="container-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Thêm Tin Tức</h3>
                    </div>
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Tiêu Đề: </label>
                                    <input class="form-control" type="text" name="title" required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Giới Thiệu: </label>
                                    <input class="form-control" type="text" name="intro" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Trạng thái: </label>
                                    <input class="form-control" type="text" name="status"
                                        placeholder="Hiển thị = 1, Ẩn = 0" required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label mb-1">Hình ảnh: </label>
                                    <input type="file" class="form-control" name="image_link">
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                <label class="control-label mb-1">Nội Dung: </label>
                                    <input class="form-control" type="text" name="content" required="">

                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label mb-1">Nội Dung: </label>
                            <textarea name="content" id="noidungsp"></textarea>
                            <script type="text/javascript">
                            config = {};
                            config.entities_latin = false;
                            config.language = 'vi';
                            CKEDITOR.replace('noidungsp', config);
                            </script>
                        </div>

                            

                        <br>
                     
                        <input type="submit" name="addNews" value="Thêm Tin Tức" class="btn btn-default">
                            <input type="submit" name="huy" value="HỦY" class="btn btn-default">
       
                    </form>
                </div>
            </div>
        </div>
    </div>

      
    <?php

include '../teamplate1/script.php';
?>
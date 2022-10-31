
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
                                if (isset($_POST['huy'])) {
                                    header('Location: manageCategory.php');
                                }
                                ?>
                                <?php
                                if (isset($_POST['addCategory'])) {
                                    $parent_id = $_POST['parent_id'];
                                    $name  = $_POST['name'];
                                    $sort_order = $_POST['sort_order'];
                                    $status  = $_POST['status'];



                                    $sql_insert_account = mysqli_query($conn, "INSERT INTO category(parent_id,name,sort_order,status) values ('$parent_id','$name','$sort_order','$status')");
                                    header('Location: manageCategory.php');
                                }

                                ?>


                                <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                                    <div class="wrapper wrapper--w680">
                                        <div class="card card-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <form class="form" action="##" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Phân Loại </label>
                                                                    <input class="form-control" type="text" name="parent_id" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Tên Điện Thoại</label>
                                                                    <input class="form-control" type="text" name="name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Thứ Tự Xếp Hạng</label>
                                                                    <input class="form-control" type="text" name="sort_order" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Trạng Thái </label>
                                                                    <input class="form-control" type="text" name="status" required=""placeholder="Hiển thị = 1, Ẩn = 0" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        


                                                            <br>
                                                            <input type="submit" name="addCategory" value="Thêm Danh Mục" class="btn btn-default">
                                                            <input type="submit" name="huy" value="HỦY" class="btn btn-default">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









                                </div>

                                <?php

include '../teamplate1/script.php';
?>
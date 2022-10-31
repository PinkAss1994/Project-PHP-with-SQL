
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
                                    header('Location: manageLogistics.php');
                                }
                                ?>

                                <?php
                                if (isset($_POST['addLogistics'])) {
                                    $name = $_POST['name'];
                                    $price  = $_POST['price'];



                                    $sql_insert_account = mysqli_query($conn, "INSERT INTO logistics(name,price) values ('$name','$price')");
                                    header('Location: manageLogistics.php');
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
                                                                    <label class="control-label mb-1">Tên Đơn Vị: </label>
                                                                    <input class="form-control" type="text" name="name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Giá Vận Chuyển: </label>
                                                                    <input class="form-control" type="id" name="price" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                            <input type="submit" name="addLogistics" value="Thêm Đơn Vị Giao Hàng" class="btn btn-default">
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







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
                                                                    <label class="control-label mb-1">Ph??n Lo???i </label>
                                                                    <input class="form-control" type="text" name="parent_id" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">T??n ??i???n Tho???i</label>
                                                                    <input class="form-control" type="text" name="name" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Th??? T??? X???p H???ng</label>
                                                                    <input class="form-control" type="text" name="sort_order" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="control-label mb-1">Tr???ng Th??i </label>
                                                                    <input class="form-control" type="text" name="status" required=""placeholder="Hi???n th??? = 1, ???n = 0" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        


                                                            <br>
                                                            <input type="submit" name="addCategory" value="Th??m Danh M???c" class="btn btn-default">
                                                            <input type="submit" name="huy" value="H???Y" class="btn btn-default">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









                                </div>

                                <?php

include '../teamplate1/script.php';
?>
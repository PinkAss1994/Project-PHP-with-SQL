<?php
include '../teamplate1/head.php';
?>
<?php
include '../teamplate1/header.php';

require('../../../lib/mysqli_connect.php');
// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product = mysqli_query($conn,"SELECT * FROM product");

?>


        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="right_col" role="main">
                            <h4>Thêm ảnh phụ</h4>
                            
                            <form action="../../controllers/add_img.php" method="POST" onsubmit="return checked();" enctype="multipart/form-data">
                            <div class="card card-4">
                                            <div class="card-body">
                                            <div class="form-group">
                                    <label>Chọn sản phẩm</label>
                                    <select name="product_id" id="input" class=" form-control" required="required">
                                        <option value="product_id">Chọn sản phẩm</option>
                                        <?php foreach ($product as $key => $value) { ?>
                                            
                                        <option value="<?php echo $value['id']?>"> <?php
                                     
                                     echo $value['name'] ?></option>
                                        <?php  
                                     }
                                     ?>
                                    </select>
                                    

                                </div>
                        </div>

                                <label>Ảnh Đại Điện</label>
                                <!-- <input type="file" class="form-control" name="image_name"><br> -->
                                <input type="file" class="form-control" name="image_name" multiple="multiple"><br>
                                <button class="btn btn-primary" >Thêm ảnh phụ</button>
                                </div>
                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  
    <?php

include '../teamplate1/script.php';

?>
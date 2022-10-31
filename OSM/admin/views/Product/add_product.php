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

$category = mysqli_query($conn,"SELECT * FROM category");

?>



<div class="page-container">
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="right_col" role="main">
                    <h4>Thêm sản phẩm</h4>

                    <form action="../../controllers/add_product.php" method="POST" onsubmit="return checked();"
                        enctype="multipart/form-data">
                        <div class="card card-4">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Chọn danh mục</label>
                                    <select name="category_id" id="input" class=" form-control" required="required">
                                        <option value="category_id">Chọn danh mục</option>
                                        <?php foreach ($category as $key => $value) { ?>
                                            
                                        <option value="<?php echo $value['id']?>"> <?php
                                     
                                     echo $value['name'] ?></option>
                                        <?php  
                                     }
                                     ?>
                                    </select>  
                                </div>

                                <div class="form-group">
                                    <label>Giá Sản Phẩm</label>
                                    <input type="text" class="form-control" name="price" placeholder="Nhập giá Sản Phẩm"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label>Gía Khuyến Mãi</label>
                                    <input type="text" class="form-control" name="sale" placeholder="Gía Khuyến Mãi"
                                        required="">
                                </div>


                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Nhập số lượng"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label>Kích thước</label>
                                    <input type="text" class="form-control" name="display" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Camera trước</label>
                                    <input type="text" class="form-control" name="camera_front" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Camera sau</label>
                                    <input type="text" class="form-control" name="rear_camera" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Ram</label>
                                    <input type="text" class="form-control" name="ram" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Rom</label>
                                    <input type="text" class="form-control" name="rom" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>CPU</label>
                                    <input type="text" class="form-control" name="cpu" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Hệ điều hành</label>
                                    <input type="text" class="form-control" name="operating_system" placeholder="Nhập số lượng"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label>Chip đồ họa</label>
                                    <input type="text" class="form-control" name="graphics_chip" placeholder="Nhập số lượng"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <input type="text" class="form-control" name="hot" placeholder="Yes = 1, No = 0"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nội Dung: </label>
                                    <textarea ro name="content" id="content"></textarea>
                                    <script type="text/javascript">
                                        config = {};
                                        config.entities_latin = false;
                                        config.language = 'vi';
                                        CKEDITOR.replace('content', config);
                                    </script>
                                </div>

                                <label>Ảnh Đại Điện</label>
                                <input type="file" class="form-control" name="avatar"><br>
                                
                                <button  class="btn btn-primary">Thêm sản phẩm</button>
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
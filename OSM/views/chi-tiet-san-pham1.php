<?php
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

		//lấy ra sản phẩm có id là vd id =1
        public function viewProduct($id)
        {
           $id =  validate_id($id);

           $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);
           // lấy ra danh mục cha
           foreach ($data as $key => $value) {
            # code...

                $data[$key]['category'] = parent::fetchwhere('category', 'id = '.$value['category_id']);
                
            }

            return $data;
        }

        public function getImg($id)
        {
            $id =  validate_id($id);
           
            $where = 'product_id ='.$id;
            $img = parent::fetchwhere('images', $where);
            
            foreach ($img as $key => $values) {
                # code...
    
                    $where = ' product_id = '.$values['product_id'];
                    return $images = parent::fetchwhere('images',$where);
    
                    
                }

        }

        public function viewProducts($id)
        {
            $id =  validate_id($id);
            $where = "id = ".$id;

            $data = parent::fetchwhere('product',$where);

            foreach ($data as $key => $value) {
            # code...

                $where = ' category_id = '.$value['category_id'];
                return $product_lq = parent::fetchwhere('product',$where);

                
            }
        }
    }

    $view_product = new ViewProduct();
    
    if(validate_id($_GET['id']))
    {
        $id = validate_id($_GET['id']);
        $data_new = $view_product->viewProduct($id);
        $images = $view_product->getImg($id);
        $product_lq = $view_product->viewProducts($id);
    }
      
?>
<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<style>
table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
}

.btn.btn-lg.btn-primary.text-uppercase {
    color: white;
}
</style>

<body class="js">
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>
    <!-- END header -->
    <!-- Breadcrumbs -->
    <?php if(!empty($data_new)): ?>
    <?php foreach($data_new as $value): ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrap"><a href="index.php">Trang Chủ</a><span class="label"> » </span><a href="">
                            <?php foreach($value['category'] as $cate): ?>
                            <?php echo $cate['name']; ?>
                            <?php endforeach; ?>
                        </a><span class="label"> » </span><?php echo $value['name'] ?></div>


                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- END Breadcrumbs -->
    <div class="container">
        <div class="card">
            <div class="row">
                <?php foreach($data_new as $value): ?>
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap" id="zoom-image">
                            <div> <a href="../../upload/product/<?php echo $value['avatar'] ?> " title=""><img
                                        data-original-image="<?php echo url().'upload/product/'.$value['avatar']; ?>"
                                        src=" <?php echo url().'upload/product/'.$value['avatar']; ?> "></a>
                            </div>
                        </div> <!-- slider-product.// -->
                        <div class="img-small-wrap">
                        <?php if(!empty($images)): ?>
                            <?php foreach($images as $values): ?>
                            <div class="item-gallery"> <img
                                    src="<?php echo url().'upload/product/'.$values['image_name']; ?> ">
                            </div>
                            <?php  endforeach ; ?>
                            <?php endif; ?>
                            <!-- <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div> -->

                        </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h5 class="title mb-3"><?php echo $value['name'] ?> </h5>

                        <p class="price-detail-wrap">
                            <span class="price h5 text-warning">
                                <?php if($value['sale'] == 0): ?>

                                <span class="price"><span><?php echo number_format($value['price'])  ?>vnđ</span></span>
                                <?php else : ?>
                                <span class="price"><span>
                                        <?php 
                                                    $price = ($value['price'] *(100 - $value['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                        vnđ</span></span>
                                <span class="price-old" style="color:black;font-size:15px;"><strike>
                                        <?php echo number_format($value['price']) ?>
                                        vnđ</strike></span>
                        </p>
                        <?php endif; ?>
                        </span>

                        <!-- price-detail-wrap .// -->
                        <br>
                        <dl class="item-property">
                            <dt style="padding-left: 15px;">Mô Tả</dt>
                            <dd>
                                <p><?php echo $value['content'] ?></p>
                            </dd>
                        </dl>
                        <!-- item-property-hor .// -->
                        <!-- <dl class="param param-feature">
                            <dt>Color</dt>
                            <dd>Black and white</dd> -->
                        </dl> <!-- item-property-hor .// -->
                        <!-- item-property-hor .// -->

                        <hr>
                        <!-- <div class="row"> -->
                        <div class="col-sm-5">
                            <dl class="param param-inline">

                                <dt>Ship Cod Toàn Quốc</dt>

                                <br>

                                <dt>Số Lượng: <?php echo $value['quantity'] ?> </dt>
                                <br>


                                <?php if($value['quantity'] == 0): ?>
                                <dt class="param param-feature">Tình trạng: <span style="color:red">Hết hàng</span>
                                </dt>
                                <?php else: ?>
                                <dt class="param param-feature">Tình trạng: <span style="color:green">Còn hàng</span>
                                </dt>
                                <?php endif; ?>
                            </dl> <!-- item-property .// -->

                        </div> <!-- col.// -->
                        <hr>
                        <div class="col-sm">
                            <dl class="param param-feature">
                                <dt>Thông Số Kỹ Thuật</dt>
                                <br>
                                <button
                                    style="font-size: 18px; color:green;border: none; padding-bottom:20px; background: none;"
                                    onclick="myFunction()">Xem Thêm»»</button>

                                <dd id="myDIV">

                                    <table>
                                        <tr>
                                            <th> Màn hình </th>
                                            <?php if($value['display'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td><?php echo $value['display'] ?> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th> CPU </th>
                                            <?php if($value['cpu'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td><?php echo $value['cpu'] ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th> Ram </th>
                                            <?php if($value['ram'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td> <?php echo $value['ram'] ?> </td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th> Chip</th>
                                            <?php if($value['graphics_chip'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td><?php echo $value['graphics_chip'] ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th> Camera Trước</th>
                                            <?php if($value['camera_front'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td> <?php echo $value['camera_front'] ?></td>
                                            <?php endif; ?>
                                        </tr>
                                        <tr>
                                            <th> Camera Sau</th>
                                            <?php if($value['rear_camera'] == null): ?>
                                            <td> Đang Cập Nhật</td>
                                            <?php else: ?>
                                            <td> <?php echo $value['rear_camera'] ?></td>
                                            <?php endif; ?>
                                        </tr>
                                    </table>
                                </dd>
                            </dl>
                        </div>




                        <!-- </div> row.// -->
                        <hr>
                        <!-- <a href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?> "
                            class="btn btn-lg btn-primary text-uppercase"> Mua Ngay </a> -->
                        <a href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?> "
                            class="btn btn-lg btn-primary text-uppercase"> Thêm Vào Giỏ Hàng </a>
                    </article> <!-- card-body.// -->


                </aside> <!-- col.// -->
                <?php  endforeach ; ?>
            </div> <!-- row.// -->
        </div> <!-- card.// -->

        <br>

    </div>
    <div class="container">
        <div class="row">
            <h4 class="title-yy">SẢN PHẨM <span>LIÊN QUAN</span></h4>
            <?php foreach($product_lq as $value):?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="chi-tiet-san-pham1.php?id=<?php echo $value['id'] ?>">
                            <img class="default-img" src=" <?php echo url().'upload/product/'.$value['avatar']; ?>"
                                alt="#">
                            <img class="hover-img" src=" <?php echo url().'upload/product/'.$value['avatar']; ?>"
                                alt="#">
                            <?php echo ($value['sale'] > 0)?'<span class="price-dec">- '.$value['sale'].'%</span>':''; ?>
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>"><i
                                        class=" ti-eye"></i><span>Chi Tiết</span></a>
                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
												<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> -->
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart"
                                    href=" ../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $value['id'] ?>">Mua
                                    Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href=" chi-tiet-san-pham1.php?id=<?php echo $value['id'] ?>" rel="bookmark"
                                title=""><?php echo $value['name'] ?></a> </h3>
                        <div class="product-price">
                            <?php if($value['sale'] == 0): ?>
                            <span class="price"> <?php echo number_format($value['price'])  ?> </span>
                            <?php else : ?>
                            <span>
                                <?php 
                                                                $price = ($value['price'] *(100 - $value['sale']))/100;
                                                                echo number_format($price);
                                                            ?>vnđ
                            </span>
                            <span><strike>
                                    <?php echo number_format($value['price']) ?>
                                </strike></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <!--container.//-->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <script>
    $(function() {
        $('#zoom-image').each(function() {
            var originalImagePath = $(this).find('img').data('original-image');
            $(this).zoom({
                url: originalImagePath,
                magnify: 1
            });
        });
    });
    </script>
    <script>
    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    </script>
</body>

</html>
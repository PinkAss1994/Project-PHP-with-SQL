<?php 
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

        public function search($data)
        {
            $key = $data['search'];
            $key = trim($key);
            $where = '';

            if(!empty($data['price']) && empty($data['search'])) {

                $price = $data['price'];
                $start = substr($price,0,7);
                $num = substr($price,8,14);
                $where = $where . 'price BETWEEN '.$start.' AND '.$num;

            } else if(empty($data['price']) && !empty($data['search'])) {

                $where = $where . "name LIKE '%$key%'";

            } else if(!empty($data['price']) && !empty($data['search'])) {

                $where = $where . "name LIKE '%$key%'";
                $price = $data['price'];
                $start = substr($price,0,7);
                $num = substr($price,8,14);
                $where = $where . ' AND price BETWEEN '.$start.' AND '.$num;
            }
            return $data = parent::fetchwhere('product',$where);
        }

    }

    $view_product = new ViewProduct();

    $seach_product = $view_product ->search($_REQUEST);

?>

<!DOCTYPE html>
<html lang="vn">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<body class="js">
    <!-- header -->
    <?php  require_once __DIR__."/teamplate/header-sub.php"; ?>
    <!-- END header -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="san-pham.php?action=san-pham">Tìm Kiếm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>KẾT QUẢ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if(!empty($seach_product)): ?>
            <?php foreach ($seach_product as $key => $val): ?>

            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="chi-tiet-san-pham1.php?id=<?php echo $val['id'] ?>" title="<?php echo $val['name'] ?>">

                            <img class="default-img" src="<?php echo url().'upload/product/'.$val['avatar'] ?>" alt="#">
                            <img class="hover-img" src="<?php echo url().'upload/product/'.$val['avatar'] ?>" alt="#">
                            <?php echo ($val['sale'] > 0)?'<span class="price-dec">- '.$val['sale'].'%</span>':''; ?>
                            <!-- <span class="price-dec">30% Off</span> -->
                        </a>
                        <div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="chi-tiet-san-pham.php?id=<?php echo $val['id'] ?>"><i
                                        class=" ti-eye"></i><span>Chi Tiết
                                    </span></a>
                                <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                            Wishlist</span></a>
                                                    <a title="Compare" href="#"><i
                                                            class="ti-bar-chart-alt"></i><span>Add to
                                                            Compare</span></a> -->
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart"
                                    href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $val['id'] ?>">Thêm
                                    Vào Giỏ Hàng</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href="chi-tiet-san-pham1.php?id=<?php echo $val['id'] ?>"
                                title="<?php echo $val['name']  ?>"><?php echo $val['name']  ?></a>
                        </h3>
                        <div class="product-price">
                            <?php if($val['sale'] == 0): ?>
                            <p class="price"><span><?php echo number_format($val['price'])  ?>
                                    đ</span></p>
                            <?php else : ?>
                            <p class="price"><span>
                                    <?php 
                                                    $price = ($val['price'] *(100 - $val['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                    đ</span></p>
                            <p class="price-old"><strike>
                                    <?php echo number_format($val['price']) ?> đ
                                </strike></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="row">
            <div class="col-12">
                <?php else:?>
                <h5 class="text-center" style="color: red; margin: 10px;">Không có sản phẩm nào </h5>
            </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    <!-- footer -->
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
    <!-- End footer -->
</body>

</html>
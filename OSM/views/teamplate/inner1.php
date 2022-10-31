<?php 
 require_once("../autoload/autoload.php");
    class ShowProduct extends My_Model{


        public function __construct(){
            parent::__construct();

        }

        // Show sản phẩm mới 
        public function showProductNew()
        {
             return $data = parent::fetchwhere('product','  status = 1 ORDER BY buyed  DESC LIMIT 0,8  ');
        }

        public function showProductHot()
        {
            return $data = parent::fetchwhere('product', 'status = 1 ORDER BY buyed ASC LIMIT 0,8' );
        }
       

        public function showProductSale()
        {
            $where = '1 ORDER BY sale DESC LIMIT 0,8 ';
            return $data = parent::fetchwhere('product',$where);
        }

        // public function showProductEnd()
        // {
        //     return $data = parent::fetchwhere('product');
        // }
    }

    $show_product = new ShowProduct();
    // lấy ra sản phẩm mới
    $product_new = $show_product ->showProductNew();
    // lấy ra sản phẩm bán chạy
    $product_hot = $show_product ->showProductHot();
    // lấy ra sản phẩm giảm giá nhiều nhất 
    $product_sale = $show_product ->showProductSale(); 
?>
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-5">
                    <h2>SẢN PHẨM KHUYẾN MÃI</h2>
                </div>
            </div>
        </div>

        <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            <?php foreach($product_sale as $values): ?>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href=" chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?> "
                                        title="<?php echo $values['name'] ?>">
                                        <img class="default-img"
                                            src="<?php echo url().'upload/product/'.$values['avatar'] ?>" alt="#">
                                        <img class="hover-img"
                                            src="<?php echo url().'upload/product/'.$values['avatar'] ?>" alt="#">
                                        <?php echo ($values['sale'] > 0)?'<span class="price-dec">- '.$values['sale'].'%</span>':''; ?>
                                        <!-- <span class="price-dec">30% Off</span> -->
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?> "><i
                                                    class=" ti-eye"></i><span>Chi Tiết</span></a>
                                            <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a> -->
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart"
                                                href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $values['id'] ?>">Thêm
                                                Vào Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>"
                                            title="<?php echo $values['name']  ?>"><?php echo $values['name']  ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <?php if($values['sale'] == 0): ?>
                                        <p class="price"><span><?php echo number_format($values['price'])  ?>
                                                <sup>vnđ</sup></span></p>
                                        <?php else : ?>
                                        <p class="price"><span>
                                                <?php 
                                                    $price = ($values['price'] *(100 - $values['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                                <sup>vnđ</sup></span></p>
                                        <p class="price-old"><strike>
                                                <?php echo number_format($values['price']) ?> <sup>vnđ</sup>
                                            </strike></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- End Single Product -->
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
        <!-- Start Most Popular -->
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>SẢN PHẨM BÁN CHẠY</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            <?php foreach($product_new as $itemp): ?>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href=" chi-tiet-san-pham1.php?id=<?php echo $itemp['id'] ?> "
                                        title="<?php echo $itemp['name'] ?>">
                                        <img class="default-img"
                                            src="<?php echo url().'upload/product/'.$itemp['avatar'] ?>" alt="#">
                                        <img class="hover-img"
                                            src="<?php echo url().'upload/product/'.$itemp['avatar'] ?>" alt="#">
                                        <?php echo ($itemp['sale'] > 0)?'<span class="price-dec">- '.$itemp['sale'].'%</span>':''; ?>
                                        <!-- <span class="price-dec">30% Off</span> -->
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                href="chi-tiet-san-pham1.php?id=<?php echo $itemp['id'] ?> "><i
                                                    class=" ti-eye"></i><span>Chi Tiết</span></a>
                                            <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a> -->
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart"
                                                href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $itemp['id'] ?>">Thêm
                                                Vào Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="chi-tiet-san-pham1.php?id=<?php echo $itemp['id'] ?>"
                                            title="<?php echo $itemp['name']  ?>"><?php echo $itemp['name']  ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <?php if($values['sale'] == 0): ?>
                                        <p class="price"><span><?php echo number_format($itemp['price'])  ?>
                                                <sup>vnđ</sup></span></p>
                                        <?php else : ?>
                                        <p class="price"><span>
                                                <?php 
                                                    $price = ($itemp['price'] *(100 - $itemp['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                                <sup>vnđ</sup></span></p>
                                        <p class="price-old"><strike>
                                                <?php echo number_format($itemp['price']) ?> <sup>vnđ</sup>
                                            </strike></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- End Single Product -->
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Popular Area -->

        <!-- Start product series -->
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>SẢN PHẨM NỔI BẬT</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            <?php foreach($product_hot as $itemps): ?>
                            <div class="single-product">
                                <div class="product-img">
                                    <a href=" chi-tiet-san-pham1.php?id=<?php echo $itemps['id'] ?> "
                                        title="<?php echo $itemps['name'] ?>">
                                        <img class="default-img"
                                            src="<?php echo url().'upload/product/'.$itemps['avatar'] ?>" alt="#">
                                        <img class="hover-img"
                                            src="<?php echo url().'upload/product/'.$itemps['avatar'] ?>" alt="#">
                                        <?php echo ($itemps['sale'] > 0)?'<span class="price-dec">- '.$itemps['sale'].'%</span>':''; ?>
                                        <!-- <span class="price-dec">30% Off</span> -->
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                href="chi-tiet-san-pham1.php?id=<?php echo $itemps['id'] ?> "><i
                                                    class=" ti-eye"></i><span>Chi Tiết</span></a>
                                            <!-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to
                                                    Wishlist</span></a>
                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to
                                                    Compare</span></a> -->
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart"
                                                href="../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $itemps['id'] ?>">Thêm
                                                Vào Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="chi-tiet-san-pham1.php?id=<?php echo $itemps['id'] ?>"
                                            title="<?php echo $itemps['name']  ?>"><?php echo $itemps['name']  ?></a>
                                    </h3>
                                    <div class="product-price">
                                        <?php if($values['sale'] == 0): ?>
                                        <p class="price"><span><?php echo number_format($itemps['price'])  ?>
                                                <sup>vnđ</sup></span></p>
                                        <?php else : ?>
                                        <p class="price"><span>
                                                <?php 
                                                    $price = ($itemps['price'] *(100 - $itemps['sale']))/100;
                                                    echo number_format($price);
                                                ?>
                                                <sup>vnđ</sup></span></p>
                                        <p class="price-old"><strike>
                                                <?php echo number_format($itemps['price']) ?> <sup>vnđ</sup>
                                            </strike></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- End Single Product -->
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End product series-->
    </div>

</div>
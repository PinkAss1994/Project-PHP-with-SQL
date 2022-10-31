<?php
session_start();
    require_once("../autoload/autoload.php");
    class ViewProduct extends My_Model{

        public function __construct()
        {
            parent::__construct();

        }

        public function showProducCate($id)
        {
            $id = validate_id($id);
            // show danh mục cha co parent_id =0
            $data_category = parent::fetchwhere('category','id = '.$id);

            // show danh mục con
            foreach ($data_category as $keys => $category)
            {
                $where = 'parent_id = '.$category["id"];
                $category_sub = parent::fetchwhere('category', $where);

                if (empty($category_sub)) {

                    $data_category[$keys]['sub'] = $data_category;

                    foreach ($data_category[$keys]['sub'] as $key  => $value)
                    {
                        $where = 'category_id = '.$value['id'].' AND status = 1 LIMIT 0 ,16';
                        // show sản phẩm thuộc danh mục 
                        $product = parent::fetchwhere('product',$where);

                        $data_category[$keys]['sub'][$key]['subpro'] = $product;
                    }

                } else {
                    $data_category[$keys]['sub'] = $category_sub;

                    foreach ($data_category[$keys]['sub'] as $key  => $value)
                    {
                        $where = 'category_id = '.$value['id'].' AND status = 1 LIMIT 0 ,16';
                        // show sản phẩm thuộc danh mục 
                        $product = parent::fetchwhere('product',$where);

                        $data_category[$keys]['sub'][$key]['subpro'] = $product;
                    }
                }
            }

            return $data_category ;

        }

        public function showProducSub($id)
        {
             $id = validate_id($id);

             $data_sub = parent::fetchwhere('category','id = '.$id);

             foreach ($data_sub as $key => $value) {
                 # code...
                $where = "id = ".$value['parent_id'];
                $data_category = parent::fetchwhere('category',$where);
                $data_category[$key]['sub'] = $data_sub;

                foreach ($data_sub as $keys => $value) {
                 # code...
                    $where = 'category_id = '.$value['id'].' AND status = 1';
                    $product = parent::fetchwhere('product',$where);

                    $data_category[$key]['sub'][$keys]['subpro'] = $product;
                 }
             }

             return $data_category;
        }

        public function showProduct($start,$num)
        {
            return $list = parent::fetchAllpagina('product' , $start,$num);
        }


        public function countid()
        {
           $data1 = parent::countTable('product');
           return $data1;
        }


    }

    $view_product = new ViewProduct();
    $action = $_GET['action'];
    
    switch ($action) {
        case 'category':
            # code...
            $id = validate_id($_GET['id']);
             $data1 = $view_product->showProducCate($id);
            break;
        case 'sub_cate':
            # code...
            $id = validate_id($_GET['id']);
            $datas = $view_product->showProducSub($id);
            
            break;
        case 'san-pham':
            # code...
            $display = 16;
            $start = (isset($_GET['s']) && filter_var($_GET['s'],FILTER_VALIDATE_INT,array('min_range'=>1)))?$_GET['s']:0;
            $num = $view_product ->countid();

            $datax = $view_product -> showProduct($start,$display);
            break;
        
        
    }
    
   
    
    
?>
<!DOCTYPE html>
<html lang="vi" xml:lang="vi">
<?php  require_once __DIR__."/teamplate/head1.php"; ?>

<body class="js">
    <?php  require_once __DIR__."/teamplate/header1.php"; ?>



    <?php if(!empty($data1)): ?>
    <?php foreach ($data1 as $key =>$category): ?>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="san-pham.php?action=san-pham">Sản Phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <h1 class="archive-heading text-center"><a href="san-pham.php?action=category&id=<?php echo $category['id'] ?>"
            title="" rel="nofollow"><?php echo $category['name'] ?></a></h1>


    <div class="container">
        <div class="row">
            <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
            <?php foreach ($values['subpro'] as $key => $values): ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>">
                            <img class="default-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <img class="hover-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <?php echo ($values['sale'] > 0)?'<span class="price-dec">- '.$values['sale'].'%</span>':''; ?>
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
                                    href=" ../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $values['id'] ?>">Mua
                                    Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href=" chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>" rel="bookmark"
                                title=""><?php echo $values['name'] ?></a> </h3>
                        <div class="product-price">
                            <?php if($values['sale'] == 0): ?>
                            <span class="price"> <?php echo number_format($values['price'])  ?> </span>
                            <?php else : ?>
                            <span>
                                <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>vnđ
                            </span>
                            <span><strike>
                                    <?php echo number_format($values['price']) ?>
                                </strike></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
            <?php endforeach; ?>
        </div>
    </div>



    <?php endforeach; ?>



    <?php elseif(!empty($datas)): ?>
    <?php foreach ($datas as $key =>$category): ?>
    <?php foreach ($category['sub'] as $keyz_sub => $values): ?>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="san-pham.php?action=san-pham">Sản Phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Breadcrumbs -->
    <h1 class="archive-heading text-center"><a href="san-pham.php?action=sub_cate&id=<?php echo $values['id'] ?>"
            title="<?php echo $values['name'] ?>" rel="nofollow"><?php echo $values['name'] ?></a></h1>


    <div class="container">
        <div class="row">
            <?php foreach ($values['subpro'] as $key => $values): ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>">
                            <img class="default-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <img class="hover-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <?php echo ($values['sale'] > 0)?'<span class="price-dec">- '.$values['sale'].'%</span>':''; ?>
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
                                    href=" ../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $values['id'] ?>">Mua
                                    Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href=" chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>" rel="bookmark"
                                title=""><?php echo $values['name'] ?></a> </h3>
                        <div class="product-price">
                            <?php if($values['sale'] == 0): ?>
                            <span class="price"> <?php echo number_format($values['price'])  ?> </span>
                            <?php else : ?>
                            <span>
                                <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>vnđ
                            </span>
                            <span><strike>
                                    <?php echo number_format($values['price']) ?>
                                </strike></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <?php endforeach; ?>

    <?php endforeach; ?>

    <?php elseif(!empty($datax)): ?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Trang Chủ<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="san-pham.php?action=san-pham">Sản Phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="archive-heading text-center"><a href="san-pham.php?action=san-pham" title="Sản Phẩm" rel="nofollow">Sản
            Phẩm</a></h1>


    <div class="container">
        <div class="row">
            <?php foreach ($datax as $key => $values): ?>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-product">
                    <div class="product-img">
                        <a href="chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>">
                            <img class="default-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <img class="hover-img" src=" <?php echo url().'upload/product/'.$values['avatar']; ?>"
                                alt="#">
                            <?php echo ($values['sale'] > 0)?'<span class="price-dec">- '.$values['sale'].'%</span>':''; ?>
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
                                    href=" ../Controller/them-gio-hang.php?action=addtocart&id=<?php echo $values['id'] ?>">Mua
                                    Ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3><a href=" chi-tiet-san-pham1.php?id=<?php echo $values['id'] ?>" rel="bookmark"
                                title=""><?php echo $values['name'] ?></a> </h3>
                        <div class="product-price">
                            <?php if($values['sale'] == 0): ?>
                            <span class="price"> <?php echo number_format($values['price'])  ?> </span>
                            <?php else : ?>
                            <span>
                                <?php 
                                                                $price = ($values['price'] *(100 - $values['sale']))/100;
                                                                echo number_format($price);
                                                            ?>vnđ
                            </span>
                            <span><strike>
                                    <?php echo number_format($values['price']) ?>
                                </strike></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php endforeach;?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navigation">
                    <?php 
                                                $table ='product';
                                                $link = 'san-pham.php?action=san-pham&';
                                                echo navigation($display,$table,$link,$num); 
                                            ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php  require_once __DIR__."/teamplate/footer1.php"; ?>
</body>

</html>
<!-- Dynamic page generated in 0.616 seconds, 3.8. -->
<!-- Cached page generated by WP-Super-Cache on 2017-04-29 13:47:28 -->
<!-- super cache -->
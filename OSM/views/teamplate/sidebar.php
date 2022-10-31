<?php
    require_once("../autoload/autoload.php");

    class Sidebar extends My_Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function showProductHot()
        {
            return $data = parent::fetchhot('product','buyed');
        }
        // lấy ra sản phẩm nổi bật ở đây  như câu sql a đã viết trong file word
        public function showProductHighlights()
        {
            $where = 'hot = 1 AND  status = 1 ORDER BY created_at DESC';
            return $data = parent::fetchwhere('product',$where);
        }

        // public function showNews()
        // {
        //     $where = " status = 1 ORDER BY id DESC LIMIT 0,5 ";
        //    return  $data = parent::fetchwhere('news',$where);
        // }
    }

    $product = new Sidebar();
    // lấy ra sản phẩm nổi bật ở đây  như câu sql a đã viết trong file word
    $product_hot = $product -> showProductHot();

    $product_hig = $product -> showProductHighlights();

    // $news = $product->showNews();
    

?>

<div id="sidebar" class="sidebar widget-area">

    <div id="caia-product-jquery-2" class="widget caia-product-jquery-widget">
        <div class="widget-wrap">
            <h4 class="widget-title widgettitle">Sản phẩm bán chạy</h4>
            <div class="main-posts">
                <div class="slideShowproduct">
                    <ul>
                        <?php foreach($product_hot as $value): ?>
                        <li class="post-164177 products type-products status-publish has-post-thumbnail hentry category-xe-dap-xe-tap-di-xe-day entry">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>" class="alignleft"><img width="150" height="150" src="../upload/product/<?php echo $value['avatar'] ?> " class="attachment-thumbnail" alt="<?php echo $value['name'] ?>" title="<?php echo $value['name'] ?>" /></a>
                            <h3 class="widget-item-title"><a href="chi-tiet-san-pham.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a></h3>
                            <div class="show-gia1"><span class="price"><span> <?php echo ($value['sale'] >0 )? (number_format(($value['price'] *(100 - $value['sale']))/100)): $value['price']  ?> đ</span></span></div>
                            <div class="clear"></div>
                        </li>
                        <?php endforeach; ?>
                        <!--end post_class()-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div id="caia-post-list-3" class="widget caia-post-list-widget">
        <div class="widget-wrap">
            <h4 class="widget-title widgettitle">Sản phẩm nổi bật</h4>
            <div class="main-posts">
                <?php foreach ($product_hig  as $key => $value): ?>
                <div class="post-170928 products type-products status-publish has-post-thumbnail hentry category-san-pham-noi-bat category-tham-khan-tam-khan-mat category-san-pham-khuyen-mai entry ">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>" class="alignleft"><img width="150" height="150" src="../upload/product/<?php echo $value['avatar'] ?> " class="attachment-thumbnail" alt="<?php echo $value['name'] ?>" title="<?php echo $value['name'] ?>" /></a>
                    <h3 class="widget-item-title"><a href="chi-tiet-san-pham.php?id=<?php echo $value['id'] ?>" title="<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a></h3>
                    <div class="show-gia1">
                        <?php if($value['sale'] == 0): ?>
                            <p class="price"><span><?php echo number_format($value['price'])  ?>đ</span></p>
                        <?php else : ?>
                            <p class="price"><span>
                                <?php 
                                    $price = ($value['price'] *(100 - $value['sale']))/100;
                                    echo number_format($price);
                                ?>
                            đ</span></p>
                            <p class="price-old"><strike>
                                <?php echo number_format($value['price']) ?>
                            đ</strike></p>
                        <?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php endforeach;?>



                <!--end post_class()-->
            </div>
            
        </div>
    </div>
    <div id="ads_widget-7" class="widget caia_ads_widget">
        <div class="widget-wrap">
            <div class="ads_content_widget">
                <div class="fb-page" data-href="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite=""><a href="">Online Shop Mobile </a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    require_once("../autoload/autoload.php");
    // khai báo class ShowCategory
    class ShowCategory extends My_Model{

        public function __construct()
        {
            parent::__construct();
        }
        function showCate()
        {

          $data = parent::fetchwhere('category','parent_id = 0  AND  status = 1 ORDER BY sort_order ASC');

          foreach ( $data as $key => $value)
          {

            $where = 'parent_id  = '. $value['id'].' AND  status = 1 ORDER BY sort_order ASC ' ;
            $data[$key]['danhmuc'] = parent::fetchwhere('category',$where);
          }
          return $data;
        }
    }
    // khởi tạo class 
    $show_category = new ShowCategory();
    // lấy ra các danh mục 
    $data = $show_category ->showCate();

?>
<style>
    @media screen and (min-width: 1000px) {
        .list-main{
        display: flex;
    }
}   
input[type="search"]{
    outline: none;
}
</style>
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> support@osm.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <!-- <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> -->
                            <?php if(!isset($_SESSION['id'])): ?>
                            <li><i class="ti-user"></i> <a href="dang-nhap1.php">Đăng Nhập</a></li>
                            <li><i class="ti-power-off"></i><a href="dang-ky1.php">Đăng Ký</a></li>
                            <?php else: ?>
                            <li><i class="ti-user"></i><a href="dang-ky1.php"><a href="info-user1.php">
                                        Xin chào <?php echo $_SESSION['name'] ?></a></li>

                           
                            <li class="">
                                <a href="dang-xuat.php">Thoát</a>
                            </li>

                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php"><img src="../upload/logo1.png" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><i class="ti-search"></i></div>
							<!-- Search Form -->
							<div class="search-top" >
								<form class="search-form" method="get" action="tim-kiem.php">
									<input type="text" placeholder="Tìm kiếm..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<!-- <select>
									<option selected="selected">All Category</option>
									<option>watch</option>
									<option>mobile</option>
									<option>kid’s item</option>
								</select> -->
								<form method="get" action="tim-kiem.php">
									<input name="search" placeholder="tìm kiếm..." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <!-- <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div> -->
                        <div class="sinlge-bar">
                            <a href="info-user1.php" class="single-icon"><i class="fa fa-user-circle-o"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="../views/gio-hang1.php" class="single-icon"><i class="ti-bag"></i>
                                <span class="total-count">
                                    <?php 

if(isset($_SESSION['cart']))
{
    $qty = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        # code...
        
        $qty = $qty + $value['quantity'];
    }

    echo $qty;
}
else{
    echo 0;
}

?>

                                </span>
                            </a>
                            <!-- Shopping Item -->
                            <!-- <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="#">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70"
                                                alt="#"></a>
                                        <h4><a href="#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div> -->
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <!-- <div class="col-lg-3">

                    </div> -->
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="index.php">Trang Chủ</a></li>
                                            <li><a href="san-pham.php?action=san-pham">Sản Phẩm</a></li>
                                            <li><a href="list-tin-tuc1.php">Tin Tức</a></li>

                                            <li><a href="gioi-thieu.php">Giới Thiệu</a></li>

                                            <li><a href="lien-he.php">Liên Hệ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>